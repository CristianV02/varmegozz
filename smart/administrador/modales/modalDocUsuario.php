<?php
require_once '../modelo/val-admin.php';
require_once '../modelo/datos-usuarios.php';
require '../modelo/datos-tipo-documento.php';
require '../modelo/datos-rol.php';
$mis_documentos = new misDocumento;
$misusuarios = new misUsuarios;
$misroles = new misRoles;
?>

<!-- Modal registro de un usuario -->
<div class="modal" id="modalNuevoDocUsuario" tabindex="-1" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm-12">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <div class="modal-title">
          <h4>Registrar Nuevo Documento
          </h4>
        </div>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-row">
            <input type="hidden" id="codigo" class="form-control input-sm" required>
            <div class="form-group">
              <?php
              // $mi_documento = $mis_documentos->viewDocumentos();
              ?>
              <label for="nombre">Nombre del documento</label>
              <input type="text" class="form-control" id="nombre" placeholder="Nombre del documento" required>
            </div>
            <br />
            <div class="form-group">
              <label for="descripcion">Descripción del documento</label>
              <input type="text" id="descripcion" class="form-control" placeholder="Añadir la descripción del archivo" required>
            </div>
            <br>
            <?php
            $mi_usuario = $misusuarios->viewUsuariosCliente();
            ?>
            <label for="id_cliente">Visible por</label>
            <select id="id_cliente" class="form-control" required>
              <option value="0">Todos</option>
              <option value="1">Administrador</option>
              <?php
              foreach ($mi_usuario as $value) {
              ?>
                <option value="<?php echo $value['identificacion']; ?>"><?php echo $value['nombre']; ?> <?php echo $value['apellido']; ?> - <?php echo $value['identificacion']; ?></option>
              <?php
              }
              ?>
            </select>
            <br />
          </div>
        </form>
        <div class="modal-footer">
          <div>
            <button type="button" class="btn btn-primary" id="agregarNuevoDocUsuario" data-dismiss="modal">
              Agregar
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal ACTUALIZAR información de un usuario -->
<div class="modal" id="modalEdicionDocUsuario" tabindex="-1" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm-12">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Actualizar Documento</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
         
      </div>
      <div class="modal-body">
        <form>
          <div class="form-row">
            <input type="hidden" id="codigou" class="form-control input-sm" required>
            <div class="form-group">
              <?php
              // $mi_documento = $mis_documentos->viewDocumentos();
              ?>
              <label for="nombreu">Nombre del documento</label>
              <input type="text" class="form-control" id="nombreu" placeholder="Nombre del documento" required>
            </div>
            <br />
            <div class="form-group">
              <label for="descripcionu">Descripción del documento</label>
              <input type="text" id="descripcionu" class="form-control" required>
            </div>
            <br />
            <?php
            $mi_usuario = $misusuarios->viewUsuariosCliente();
            ?>
            <label for="id_clienteu">Visible por</label>
            <select id="id_clienteu" class="form-control" required>
              <option value="0">Todos</option>
              <option value="1">Administrador</option>
              <?php
              foreach ($mi_usuario as $value) {
              ?>
                <option value="<?php echo $value['identificacion']; ?>"><?php echo $value['nombre']; ?> <?php echo $value['apellido']; ?> - <?php echo $value['identificacion']; ?></option>
              <?php
              }
              ?>
            </select>
            <br />
            <div class="modal-footer">
              <div class="row">
                <div class="col col-sm-6 text-left">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="eliminarDatosDocUsuario">
                    Eliminar
                  </button>
                </div>
                <div class="col col-sm-6 text-right">
                  <button type="button" class="btn btn-warning" data-bs-dismiss="modal" id="actualizaDatosDocUsuario">
                    Actualizar
                  </button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>