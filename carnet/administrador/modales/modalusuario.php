<?php
require_once '../modelo/val-admin.php';
if ($id_rol == 1) {
  $no_modificar = "";
} else {
  $no_modificar = "readonly";
}
?>
<!-- Modal registro de un usuario -->
<div class="modal fade" id="modalNuevoUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <div class="modal-title">
          <h4>Registrar Nuevo Usuario
          </h4>
        </div>
      </div>
      <div class="modal-body">
        <div class="form-row">
          <div class="form-group">
            <!-- <label for="id">Id</label> -->
            <input type="hidden" id="id" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="id_usuario">id_usuario</label>
            <input type="text" id="id_usuario" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="nombres_apellidos">Nombres_apellidos</label>
            <input type="text" id="nombres_apellidos" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="usuario">Usuario</label>
            <input type="text" id="usuario" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="contrasena">Contrasena</label>
            <input type="password" id="contrasena" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="id_rol">Rol</label>
            <select id="id_rol" class="form-control" required>
              <option value="1">Administrador</option>
              <option value="2">Sistemas</option>
              <option value="3">Admisiones</option>
              <option value="4">Jefe de sistema</option>
              <option value="5">Jefe de admisiones</option>
            </select>
          </div>
          <div class="modal-footer">
            <div>
              <button type="button" class="btn btn-primary" data-dismiss="modal" id="agregarNuevoUsuario">
                Agregar
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- <Modal Actualizar usuario -->
<div class="modal fade" id="modalEdicionUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
        <h4 class="modal-title" id="myModalLabel">Actualizar</h4>
      </div>
      <div class="modal-body">
        <div class="form-row">
          <div class="form-group">
            <!-- <label for="idu">Id</label> -->
            <input type="hidden" id="idu" class="form-control input-sm" <?php echo $no_modificar; ?> required>
          </div>
          <div class="form-group">
            <label for="id_usuariou">id_usuario</label>
            <input type="text" id="id_usuariou" class="form-control input-sm" <?php echo $no_modificar; ?> required>
          </div>
          <div class="form-group">
            <label for="nombres_apellidosu">nombres_apellidos</label>
            <input type="text" id="nombres_apellidosu" class="form-control input-sm" <?php echo $no_modificar; ?> required>
          </div>
          <div class="form-group">
            <label>usuario</label>
            <input type="text" id="usuariou" class="form-control input-sm" required="">
          </div>
          <div class="form-group">
            <label for="contrasenau">Contrasena</label>
            <input type="password" id="contrasenau" class="form-control" required>
          </div>
          <?php
          if ($id_rol == 1) {
          ?>
            <div class="form-group">
              <label for="id_rolu">Rol</label>
              <select id="id_rolu" class="form-control" required>
                <option value="1">Administrador</option>
                <option value="2">Sistemas</option>
                <option value="3">Admisiones</option>
                <option value="4">Jefe de sistema</option>
                <option value="5">Jefe de admisiones</option>
              </select>
            </div>
          <?php
          } else {
          ?>
            <input type="hidden" class="form-control" id="id_rolu" <?php echo $no_modificar; ?> required>
          <?php
          }
          ?>
          <div class="modal-footer">
            <div class="col-sm-6 text-left">
              <?php
              if ($id_rol == 1) {
              ?>
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="eliminarDatosUsuario">
                  Eliminar
                </button>
              <?php
              }
              ?>
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