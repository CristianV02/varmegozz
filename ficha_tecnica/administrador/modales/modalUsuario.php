<?php
require_once '../modelo/val-admin.php';
require_once '../modelo/datos-tipo-documento.php';
require_once '../modelo/datos-rol.php';
$mis_documentos = new misDocumento;
$mis_roles = new misRoles;

?>
<!-- Modal registro de un usuario --><div class="modal" id="modalNuevoUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <div class="modal-title">
          <h4>Registrar nuevo usuario
          </h4>
        </div>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-row">
            <input type="hidden" id="codigo" class="form-control input-sm" required="">


            <div class="form-group">
              <?php
              $mi_documento = $mis_documentos->viewDocumentos();
              ?>
              <label for="tipo_id">Tipo de identificación</label>
              <!-- <input type="text" class="form-control" id="tipo_id" placeholder="tipo documento" required> -->
              <select id="tipo_id" class="form-control" required>
                <option selected></option>
                <?php
                foreach ($mi_documento as $value) {
                ?>
                  <option value="<?php echo $value['sigla']; ?>"><?php echo $value['nombre']; ?></option>
                <?php
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="identificacion">identificacion</label>
              <input type="text" class="form-control" id="identificacion" placeholder="Identificacion" required>
            </div>
            <div class="form-group">
              <label for="nombres">Nombres</label>
              <input type="text" class="form-control" id="nombres" placeholder="Nombre" required>
            </div>
            <div class="form-group">
              <label for="apellidos">Apellidos</label>
              <input type="text" class="form-control" id="apellidos" placeholder="Apellido" required>
            </div>
            <div class="form-group">
              <label for="usuario">Usuario</label>
              <input type="text" class="form-control" id="usuario" placeholder="usuario" required>
            </div>
            <div class="form-group">
              <label for="contrasena">Contrasena</label>
              <input type="password" class="form-control" id="contrasena" placeholder="contrasena" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <?php
              $mi_roles = $mis_roles->viewRoles();
              ?>
              <label for="rol">Rol</label>
              <select id="rol" class="form-control" required>
                <option selected></option>
                <?php
                foreach ($mi_roles as $value) {
                ?>
                  <option value="<?php echo $value['rol']; ?>"><?php echo $value['rol']; ?></option>
                <?php
                }
                ?>
              </select>
            </div>
          </div>

        </form>
        <div class="modal-footer">
          <div>
            <button type="button" class="btn btn-primary" id="agregarNuevoUsuario">
              Agregar
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal ACTUALIZAR información de un usuario -->
<div class="modal" id="modalEdicionUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <div class="modal-title">
          <h4>Actualizar usuario
            <small></small>
          </h4>
        </div>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-row">
            <input type="hidden" id="codigou" class="form-control input-sm" required="">
            <div class="form-group">
              <?php
              $mi_documento = $mis_documentos->viewDocumentos();
              ?>
              <label for="tipo_id">Tipo de identificación</label>
              <!-- <input type="text" class="form-control" id="tipo_id" placeholder="tipo documento" required> -->
              <select id="tipo_idu" class="form-control" required>
                <option selected></option>
                <?php
                foreach ($mi_documento as $value) {
                ?>
                  <option value="<?php echo $value['sigla']; ?>"><?php echo $value['nombre']; ?></option>
                <?php
                }
                ?>
              </select>
            </div>
            <label for="identificacion">Número de Identificación</label>
            <input type="text" id="identificacionu" class="form-control input-sm" required="">
            <br />
            <label for="nombres">Nombres</label>
            <input type="text" id="nombresu" class="form-control input-sm" required="">
            <br />
            <label for="apellidos">Apellidos</label>
            <input type="text" id="apellidosu" class="form-control input-sm" required="">
            <br />
            <label for="usuario">Usuario</label>
            <input type="text" id="usuariou" class="form-control input-sm" required="">
            <br />
            <label for="contrasenau">Contrasena</label>
            <input type="password" id="contrasenau" class="form-control input-sm" required="">
            <br />
            <div class="form-group">
              <?php
              $mi_roles = $mis_roles->viewRoles();
              ?>
              <label for="rol">Rol</label>
              <select id="rolu" class="form-control" required>
                <option selected></option>
                <?php
                foreach ($mi_roles as $value) {
                ?>
                  <option value="<?php echo $value['rol']; ?>"><?php echo $value['rol']; ?></option>
                <?php
                }
                ?>
              </select>
            </div>
            <div class="modal-footer">
              <div class="col-sm-6 text-left">
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="eliminarDatosUsuario">
                  Eliminar
                </button>
              </div>
              <div class="col-sm-6 text-right">
                <button type="button" class="btn btn-warning" data-dismiss="modal" id="actualizaDatosUsuario">
                  Actualizar
                </button>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>