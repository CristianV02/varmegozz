<?php
require_once '../modelo/val-admin.php';
require '../modelo/datos-tipo-documento.php';
require '../modelo/datos-rol.php';
$mis_documentos = new misDocumento;
$misroles = new misRoles;
//Se confirma que sea un usuario y se cargan los reportes de ese usuario
if ($rol == "usuario") {
  $no_modificable = "readonly";
} else {
  $no_modificable = "";
}
?>
<!-- Modal registro de un usuario -->
<div class="modal" id="modalNuevoUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Registrar Nuevo Usuario</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

      </div>
      <div class="modal-body">
        <form>
          <div class="form-row">
            <input type="hidden" id="codigo" class="form-control input-sm" required>
            <div class="form-group">
              <?php
              $mi_documento = $mis_documentos->viewDocumentos();
              ?>
              <label for="tipo_id">Tipo de Identificación</label>
              <!-- <input type="text" class="form-control" id="tipo_id" placeholder="tipo documento" required> -->
              <select id="tipo_id" class="form-control" required>
                <?php
                foreach ($mi_documento as $value) {
                ?>
                  <option value="<?php echo $value['sigla']; ?>"><?php echo $value['nombre']; ?></option>
                <?php
                }
                ?>
              </select>
            </div>
            <br>
            <div class="form-group">
              <label for="identificacion">Identificación</label>
              <input type="text" class="form-control" id="identificacion" placeholder="Identificacion" required>
            </div>
            <div class="form-group">
              <label for="nombre">Nombre</label>
              <input type="text" class="form-control" id="nombre" placeholder="Nombre" required>
            </div>
            <div class="form-group">
              <label for="apellido">Apellido</label>
              <input type="text" class="form-control" id="apellido" placeholder="Apellido" required>
            </div>
            <div class="form-group">
              <label for="usuario">Usuario</label>
              <input type="text" class="form-control" id="usuario" placeholder="usuario" required>
            </div>
            <div class="form-group">
              <label for="contrasena">Contraseña</label>
              <input type="password" class="form-control" id="contrasena" placeholder="contrasena" required>
            </div>
            <div class="form-group">
              <label for="correo">Correo</label>
              <input type="text" class="form-control" id="correo" placeholder="correo" required>
            </div>
            <div class="form-group">
              <label for="telefono">Teléfono</label>
              <input type="text" class="form-control" id="telefono" placeholder="Telefono" required>
            </div>
            <div class="form-group">
              <label for="direccion">Dirección</label>
              <input type="text" class="form-control" id="direccion" placeholder="Direccion" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <?php
              $mi_roles = $misroles->viewRoles();
              ?>
              <label for="rol">Rol</label>
              <select id="rol" class="form-control" required>
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
            <button type="button" class="btn btn-primary" id="agregarNuevoUsuario" data-bs-dismiss="modal">
              Agregar
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal ACTUALIZAR información de un usuario -->
<div class="modal" id="modalEdicionUsuario" tabindex="-1" aria-labelledby="myModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Actualizar Usuario</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-row">
            <input type="hidden" id="codigou" class="form-control input-sm" required>
            <div class="form-group">
              <label for="tipo_id">Tipo de Identificación</label>
              <?php
              $mi_documento = $mis_documentos->viewDocumentos();
              if ($rol == "usuario") {
              ?>
                <input type="text" id="tipo_idu" class="form-control input-sm" required <?php echo $no_modificable; ?>>
              <?php
              } else {
              ?>
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
              <?php
              }
              ?>
            </div>
            <label for="identificacionu">Número de Identificación</label>
            <input type="text" id="identificacionu" class="form-control input-sm" required <?php echo $no_modificable; ?>>
            <br />
            <label for="nombreu">Nombre</label>
            <input type="text" id="nombreu" class="form-control input-sm" required>
            <br />
            <label for="apellidou">Apellido</label>
            <input type="text" id="apellidou" class="form-control input-sm" required>
            <br />
            <label for="usuariou">Usuario</label>
            <input type="text" id="usuariou" class="form-control input-sm" required>
            <br />
            <label for="contrasenau">Contraseña</label>
            <input type="password" id="contrasenau" class="form-control input-sm" required>
            <br />
            <label for="correou">Correo</label>
            <input type="text" id="correou" class="form-control input-sm" required>
            <br />
            <label for="telefonou">Teléfono</label>
            <input type="text" id="telefonou" class="form-control input-sm" required>
            <br />
            <label for="direccionu">Dirección</label>
            <input type="text" id="direccionu" class="form-control input-sm" required <?php echo $no_modificable; ?>>
            <br />
            <div class="form-group">
              <label for="rolu">Rol</label>
              <?php
              $mi_roles = $misroles->viewRoles();
              if ($rol == "usuario") {
              ?>
                <input type="text" id="rolu" class="form-control input-sm" required <?php echo $no_modificable; ?>>
              <?php
              } else {
              ?>
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
              <?php
              }
              ?>

            </div>
            <div class="modal-footer">
              <div class="row">
                <div class="col col-sm-6 text-left">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="eliminarDatosUsuario">
                    Eliminar
                  </button>
                </div>
                <div class="col col-sm-6 text-right">
                  <button type="button" class="btn btn-warning" data-bs-dismiss="modal" id="actualizaDatosUsuario">
                    Actualizar
                  </button>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>