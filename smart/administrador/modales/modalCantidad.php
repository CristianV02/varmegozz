<?php
require_once '../modelo/val-admin.php';
require_once '../modelo/datos-sustancias.php';

$mis_sustancias = new misSustancias();
?>
<!-- Modal registro de un instructor -->
<div class="modal" id="modalNuevoCantidad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <div class="modal-title">
          <h1>Agregar Registro</h1>
        </div>
      </div>
      <div class="modal-body">
        <input type="hidden" id="codigo" class="form-control input-sm" required>
      </div>
      <div class="modal-body">
        <label for="cod_sustancias">Sustancia</label>
        <select id="cod_sustancias" class="form-control" required>
          <?php
          $mi_sustancia = $mis_sustancias->viewSustancias();
          foreach ($mi_sustancia as $value) {
          ?>
            <option value="<?php echo $value['codigo']; ?>"><?php echo $value['nombre']; ?></option>
          <?php
          }
          ?>
        </select>
        <br />
        <label for="valor">Valor</label>
        <input type="text" id="valor" class="form-control input-sm" required="">
        <br />
        <label for="mediciones">mediciones</label>
        <input type="text" id="mediciones" class="form-control input-sm" required="">
        <br />
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal" id="agregarNuevoCantidad">
            Agregar
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal ACTUALIZAR información de un instructor -->
<div class="modal" id="modalEdicionCantidad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title">Actualizar Registro</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <label for="codigou">Código</label>
        <input type="text" id="codigou" class="form-control input-sm" required readonly>
        <br />
        <label for="cod_sustanciasu">Sustancia</label>
        <select id="cod_sustanciasu" class="form-control" required>
          <?php
          $mi_sustancia = $mis_sustancias->viewSustancias();
          foreach ($mi_sustancia as $value) {
          ?>
            <option value="<?php echo $value['codigo']; ?>"><?php echo $value['nombre']; ?></option>
          <?php
          }
          ?>
        </select>
        <br>
        <label for="valoru">Valor</label>
        <input type="text" id="valoru" class="form-control input-sm" required>
        <br />
        <label for="medicionesu">medicionesu</label>
        <input type="text" id="medicionesu" class="form-control input-sm" required="">
        <br />
      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col col-sm-6 text-left">
            <button type="button" class="btn btn-danger" data-dismiss="modal" id="eliminarDatosCantidad">
              Eliminar
            </button>
          </div>
          <div class="col col-sm-6 text-right">
            <button type="button" class="btn btn-warning" data-dismiss="modal" id="actualizaDatosCantidad">
              Actualizar
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>