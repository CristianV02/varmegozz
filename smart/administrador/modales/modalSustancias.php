<?php
require_once '../modelo/val-admin.php';
require_once '../modelo/datos-laboratorios.php';
$misLaboratorios = new misLaboratorios();
$res = $misLaboratorios->viewLaboratorios();

?>
<!-- MODAL PARA INSERTAR REGISTROS -->
<div class="modal" id="modalNuevoSustancias" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Agregar Registro</h4>
      </div>
      <div class="modal-body">
        <label for="nombre">Nombre de la sustancia</label>
        <input type="text" id="nombre" class="form-control input-sm" required>
        <br />
        <label for="laboratorio">Laboratorio</label>
        <select id="laboratorio" class="form-control">
          <?php
          foreach ($res as $value) {
          ?>
            <option value="<?php echo $value['nombre_laboratorio']; ?>"><?php echo $value['nombre_laboratorio']; ?></option>
          <?php
          }
          ?>
        </select>
        <br />
        <label for="canti_inventario">Cantidad en inventario</label>
        <input type="text" id="canti_inventario" class="form-control input-sm" required>
        <br />
        <label for="nivel_riesgo">Nivel de Riesgo</label>
        <select id="nivel_riesgo" class="form-control" required>
          <option value="N/A">N/A</option>
          <option value="I">I</option>
          <option value="II">II</option>
          <option value="III">III</option>
          <option value="IV">IV</option>
        </select>
        <br />
        <label for="fecha_vencimiento">Fecha vencimiento</label>
        <input type="date" id="fecha_vencimiento" class="form-control input-sm" required>
        <br />
        <label for="registro_sanitario">Registro sanitario</label>
        <input type="text" id="registro_sanitario" class="form-control input-sm" required>
        <br />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="agregarNuevoSustancias">
          Agregar
        </button>
      </div>
    </div>
  </div>
</div>
<!-- MODAL PARA EDICION DE DATOS-->
<div class="modal" id="modalEdicionSustancias" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Actualizar Registro</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <label for="codigou">Item</label>
        <input type="text" id="codigou" class="form-control input-sm" readonly required>
        <br />
        <label for="nombreu">Nombre de la sustancia</label>
        <input type="text" id="nombreu" class="form-control input-sm" required="">
        <br />
        <label for="laboratoriou">Laboratorio</label>
        <select id="laboratoriou" class="form-control">
          <?php
          foreach ($res as $value) {
          ?>
            <option value="<?php echo $value['nombre_laboratorio']; ?>"><?php echo $value['nombre_laboratorio']; ?></option>
          <?php
          }
          ?>
        </select>
        <br />
        <label for="canti_inventariou">Cantidad en inventario</label>
        <input type="text" id="canti_inventariou" class="form-control input-sm" required>
        <br />
        <label for="nivel_riesgou">Nivel de Riesgo</label>
        <select id="nivel_riesgou" class="form-control" required>
          <option value="N/A">N/A</option>
          <option value="I">I</option>
          <option value="II">II</option>
          <option value="III">III</option>
          <option value="IV">IV</option>
        </select>
        <br />
        <label for="fecha_vencimientou">Fecha vencimiento</label>
        <input type="date" id="fecha_vencimientou" class="form-control input-sm" required>
        <br />
        <label for="registro_sanitariou">Registro sanitario</label>
        <input type="text" id="registro_sanitariou" class="form-control input-sm" required>
        <br />
      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col col-sm-6 text-left">
            <button type="button" class="btn btn-danger" data-dismiss="modal" id="eliminarDatosSustancias">
              Eliminar
            </button>
          </div>
          <div class="col col-sm-6 text-right">
            <button type="button" class="btn btn-warning" data-dismiss="modal" id="actualizaDatosSustancias">
              Actualizar
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>