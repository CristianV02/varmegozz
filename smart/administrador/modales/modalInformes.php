<?php
require_once '../modelo/val-admin.php';
require_once '../modelo/datos-empresa.php';
// Instancias
$misEmpresas = new misEmpresas;
$misEstablecimientos = $misEmpresas->viewEmpresaDocumento($identificacion);
//Variables
$mesesReporte = ['No Aplica', 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
?>
<!-- Modal registro de un usuario -->
<!-- <div class="modal" id="modalInforme" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"> -->
<div class="modal" id="modalInforme" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title">Generar Informe</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- INICIO DEL CONTENIDO -->
        <h3>Diligencie los datos a continuación para generar el informe deseado:</h3>
        <br>
        <form>
          <div class="form-group">
            <label for="nombre">Establecimiento</label>
            <select id="reporteEmpresa" class="form-control" required>
              <?php
              foreach ($misEstablecimientos as $data) {
              ?>
                <option value="<?php echo $data['nombre_empresa'] ?>"><?php echo $data['nombre_empresa'] ?></option>
              <?php
              }
              ?>
            </select>
          </div>
          <h3>Primer mes:</h3>
          <div class="form-group">
            <!-- Filtro de Mes -->
            <label for="reporteMes1">Mes:</label>
            <select id="reporteMes1" class="form-control">
              <?php
              foreach ($mesesReporte as $key => $monthName) {
                $month = $key;
                echo "<option value=\"$month\">$monthName</option>";
              }
              ?>
            </select>
            <!-- Filtro de Año -->
            <label for="reporteAnho1">Año:</label>
            <select id="reporteAnho1" class="form-control">
              <option value="0">No aplica</option>
              <!-- Generar opciones del año actual hasta 2020 -->
              <?php
              $currentYear = date('Y');
              for ($year = $currentYear; $year >= 2020; $year--) {
                echo "<option value=\"$year\">$year</option>";
              }
              ?>
            </select>
          </div>
          <h3>Segundo mes:</h3>
          <div class="form-group">
            <!-- Filtro de Mes -->
            <label for="reporteMes2">Mes:</label>
            <select id="reporteMes2" class="form-control">
              <?php
              foreach ($mesesReporte as $key => $monthName) {
                $month = $key;
                echo "<option value=\"$month\">$monthName</option>";
              }
              ?>
            </select>
            <!-- Filtro de Año -->
            <label for="reporteAnho2">Año:</label>
            <select id="reporteAnho2" class="form-control">
              <option value="0">No aplica</option>
              <!-- Generar opciones del año actual hasta 2020 -->
              <?php
              $currentYear = date('Y');
              for ($year = $currentYear; $year >= 2020; $year--) {
                echo "<option value=\"$year\">$year</option>";
              }
              ?>
            </select>
          </div>
          <h3>Tercer mes:</h3>
          <div class="form-group">
            <!-- Filtro de Mes -->
            <label for="reporteMes3">Mes:</label>
            <select id="reporteMes3" class="form-control">
              <?php
              foreach ($mesesReporte as $key => $monthName) {
                $month = $key;
                echo "<option value=\"$month\">$monthName</option>";
              }
              ?>
            </select>
            <!-- Filtro de Año -->
            <label for="reporteAnho3">Año:</label>
            <select id="reporteAnho3" class="form-control">
              <option value="0">No aplica</option>
              <!-- Generar opciones del año actual hasta 2020 -->
              <?php
              $currentYear = date('Y');
              for ($year = $currentYear; $year >= 2020; $year--) {
                echo "<option value=\"$year\">$year</option>";
              }
              ?>
            </select>
          </div>
        </form>
        <div class="modal-footer">
          <div>
            <button type="button" class="btn btn-primary" id="generarReporte" data-bs-dismiss="modal">
              Generar
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
