<?php
require_once '../modelo/val-admin.php';
require_once '../modelo/datos-usuarios.php';
$mis_usuarios = new misUsuarios;
if ($rol == "usuario") {
  $no_modificable = "readonly";
} else {
  $no_modificable = "";
}
?>
<!-- Modal registro de una empresa -->
<div class="modal" id="modalNuevoEmpresa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm-12" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Registrar Nuevo Establecimiento</h4>
      </div>
      <div class="modal-body">
        <div class="form-row">
          <div class="form-group">
            <label for="NITRUT">NIT - RUT</label>
            <select id="NITRUT" class="form-control" required>
              <option>NIT</option>
              <option>RUT</option>
            </select>
          </div>
          <div class="form-group">
            <label for="numero">Número</label>
            <input type="text" id="numero" class="form-control input-sm" required>
          </div>
          <div class="form-group">
            <label for="nombre_empresa">Nombre Establecimiento</label>
            <input type="text" id="nombre_empresa" class="form-control input-sm" required>
          </div>
          <div class="form-group">
            <label for="direccion">Dirección Establecimiento</label>
            <input type="text" id="direccion" class="form-control input-sm" required>
          </div>
          <div class="form-group">
            <label for="nombre_usuario">Nombre Usuario</label>
            <select id="nombre_usuario" class="form-control" required>

              <?php
              $mi_usuario = $mis_usuarios->viewUsuarios();
              foreach ($mi_usuario as $value) {
              ?>
                <option value="<?php echo $value['identificacion'] . " - " . $value['nombre'] . " " . $value['apellido']; ?>"><?php echo $value['identificacion'] . " - " . $value['nombre'] . " " . $value['apellido']; ?></option>
              <?php
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label for="telefono">Teléfono Establecimiento</label>
            <input type="text" id="telefono" class="form-control input-sm" required>
          </div>
          <div class="form-group">
            <label for="correo">Correo Establecimiento</label>
            <input type="text" id="correo" class="form-control input-sm" required>
          </div>
          <div class="form-group">
            <label for="cargo">Cargo</label>
            <input type="text" id="cargo" class="form-control input-sm" required>
          </div>
          <div class="modal-footer">
            <div>
              <button type="button" class="btn btn-primary" data-dismiss="modal" id="agregarNuevoEmpresa">
                Agregar
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal ACTUALIZAR información de una empresa -->
<div class="modal" id="modalEdicionEmpresa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm-12" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Actualizar Empresa</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        
      </div>

      <div class="modal-body">
        <div class="form-row">
          <div class="form-group">
            <input type="hidden" id="codigou" class="form-control input-sm" required>
          </div>
          <div class="form-group">
            <label for="NITRUTu">NIT - RUT</label>
            <?php
            if ($rol == "usuario") {
            ?>
              <input type="text" id="NITRUTu" class="form-control input-sm" required <?php echo $no_modificable; ?>>
            <?php
            } else {
            ?>
              <select id="NITRUTu" class="form-control" required>
                <option>NIT</option>
                <option>RUT</option>
              </select>
            <?php
            }
            ?>
          </div>
          <div class="form-group">
            <label for="numerou">Número</label>
            <input type="text" id="numerou" class="form-control input-sm" required <?php echo $no_modificable; ?>>
          </div>
          <div class="form-group">
            <label for="nombre_empresau">Nombre Empresa</label>
            <input type="text" id="nombre_empresau" class="form-control input-sm" required <?php echo $no_modificable; ?>>
          </div>
          <div class="form-group">
            <label for="direccionu">Dirección Empresa</label>
            <input type="text" id="direccionu" class="form-control input-sm" required <?php echo $no_modificable; ?>>
          </div>
          <div class="form-group">
            <label for="nombre_usuariou">Nombre Usuario</label>
            <?php
            if ($rol == "usuario") {
            ?>
              <input type="text" id="nombre_usuariou" class="form-control input-sm" required <?php echo $no_modificable; ?>>
            <?php
            } else {
            ?>
              <select id="nombre_usuariou" class="form-control" required>
                <?php
                $mi_usuario = $mis_usuarios->viewUsuarios();
                foreach ($mi_usuario as $value) {
                ?>
                  <option value="<?php echo $value['identificacion'] . " - " . $value['nombre'] . " " . $value['apellido']; ?>"><?php echo $value['identificacion'] . " - " . $value['nombre'] . " " . $value['apellido']; ?></option>
                <?php
                }
                ?>
              </select>
            <?php
            }
            ?>
          </div>
          <div class="form-group">
            <label for="telefonou">Teléfono Empresa</label>
            <input type="text" id="telefonou" class="form-control input-sm" required>
          </div>
          <div class="form-group">
            <label for="correou">Correo Empresa</label>
            <input type="text" id="correou" class="form-control input-sm" required>
          </div>
          <div class="form-group">
            <label for="cargou">Cargo</label>
            <input type="text" id="cargou" class="form-control input-sm" required>
          </div>
        </div>
        <div class="modal-footer">
          <div class="row">
            <?php
            if ($rol == "usuario") {
            ?>
              <div class="col-sm-6 text-left"></div>
            <?php
            } else {
            ?>
              <div class="col col-sm-6 text-left">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="eliminarDatosEmpresa">
                  Eliminar
                </button>
              </div>
            <?php
            }
            ?>
            <div class="col col-sm-6 text-right">
              <button type="button" class="btn btn-warning" data-bs-dismiss="modal" id="actualizaDatosEmpresa">
                Actualizar
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>