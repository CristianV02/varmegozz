<?php
if ($rol_id == 1) {
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
          <h4>Registrar nuevo usuario
          </h4>
        </div>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-row">
            <div class="form-group">
              <label for="tipo_documento">Tipo documento</label>
              <input type="text" class="form-control" id="tipo_documento" placeholder="tipo documento" required>
            </div>
            <div class="form-group">
              <label for="numero_documento">Número de Identificación</label>
              <input type="text" class="form-control" id="numero_documento" placeholder="Identificacion" required>
            </div>
            <div class="form-group">
              <label for="nombre">Nombre</label>
              <input type="text" class="form-control" id="nombre" placeholder="Nombre" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label for="usuario">Usuario</label>
              <input type="text" class="form-control" id="usuario" placeholder="usuario" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label for="contrasena">Contraseña</label>
              <input type="password" class="form-control" id="contrasena" placeholder="contrasena" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label for="email">Correo</label>
              <input type="text" class="form-control" id="email" placeholder="email" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label for="rol_id">Rol</label>
              <select id="rol_id" class="form-control" required>
                <option value="1">Administrador</option>
                <option value="2">Coordinador</option>
                <option value="3">Instructor</option>
                <option value="4">Gestor de Apoyos</option>
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
<div class="modal fade" id="modalEdicionUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
            <div class="form-group">
              <label for="tipo_documentou">Tipo documento</label>
              <input type="text" class="form-control" id="tipo_documentou" placeholder="tipo documento" <?php echo $no_modificar; ?> required>
            </div>
            <div class="form-group">
              <label for="numero_documentou">Número de Identificación</label>
              <input type="text" class="form-control" id="numero_documentou" placeholder="Identificacion" <?php echo $no_modificar; ?> required>
              <input type="hidden" class="form-control" id="cod_usuariou" placeholder="Identificacion" required>
            </div>
            <div class="form-group">
              <label for="nombreu">Nombre</label>
              <input type="text" class="form-control" id="nombreu" placeholder="Nombre" <?php echo $no_modificar; ?> required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label for="usuariou">Usuario</label>
              <input type="text" class="form-control" id="usuariou" placeholder="usuario" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label for="contrasenau">Contraseña</label>
              <input type="password" class="form-control" id="contrasenau" placeholder="contrasena" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label for="emailu">Correo</label>
              <input type="text" class="form-control" id="emailu" placeholder="email" required>
            </div>
          </div>
          <?php
          if ($rol_id == 1) {
          ?>
            <div class="form-row">
              <div class="form-group">
                <label for="rol_idu">Rol</label>
                <select id="rol_idu" class="form-control" required>
                  <option value="1">Administrador</option>
                  <option value="2">Coordinador</option>
                  <option value="3">Instructor</option>
                  <option value="4">Gestor de Apoyos</option>
                </select>
              </div>
            </div>
          <?php
          } else {
          ?>
            <input type="hidden" class="form-control" id="rol_idu" <?php echo $no_modificar; ?> required>
          <?php
          }
          ?>
        </form>
      </div>
      <div class="modal-footer">
        <div class="col-sm-6 text-left">
          <?php
          if ($rol_id == 1) {
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