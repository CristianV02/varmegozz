<?php
require_once '../modelo/val-admin.php';
require_once '../modelo/datos-usuarios.php';
$mis_Usuarios = new misUsuarios;
// if ($rol_id == 1) {
//   $no_modificar = "";
// } else {
//   $no_modificar = "readonly";
// }

?>
<!-- MODAL PARA INSERTAR REGISTROS -->
<div class="modal" id="modalNuevoReporteHallazgo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Agregar Hallazgo</h4>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group">
                        <input type="hidden" id="codigo" class="form-control input-sm" readonly>
                    </div>
                    <div class="form-group">
                        <label for="usuario">Usuario</label>
                        <!-- <input type="text" id="mecanismo" class="form-control input-sm" required=""> -->
                        <?php
                        $mi_usuario = $mis_Usuarios->viewUsuarios();
                        ?>
                        <select id="usuario" class="form-control" required>
                            <?php
                            foreach ($mi_usuario as $value) {
                            ?>
                                <option value="<?php echo $value['identificacion']; ?>"><?php echo $value['identificacion']; ?> - <?php echo $value['nombre']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="hallazgo">Hallazgo</label>
                        <input type="text" id="hallazgo" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <label for="cod_reporte">Codigo Hallazgos</label>
                        <input type="number" id="cod_reporte" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <label for="observaciones">Observaciones</label>
                        <input type="text" id="observaciones" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <input type="hidden" id="foto1" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <input type="hidden" id="foto2" class="form-control input-sm" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal" id="agregarNuevoReporteHallazgo">
                            Agregar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- MODAL PARA EDICION DE DATOS-->
<div class="modal" id="modalEdicionReporteHallazgo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Actualizar Hallazgo</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> 
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group">
                        <input type="hidden" id="codigou" class="form-control input-sm" readonly>
                    </div>
                    <div class="form-group">
                        <?php
                        $mi_usuario = $mis_Usuarios->viewUsuarios();
                        ?>
                        <label for="usuariou">Usuario</label>
                        <select id="usuariou" class="form-control" required>
                            <?php
                            foreach ($mi_usuario as $value) {
                            ?>
                                <option value="<?php echo $value['identificacion']; ?>"><?php echo $value['identificacion']; ?> - <?php echo $value['nombre']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="hallazgou">Hallazgo</label>
                        <input type="text" id="hallazgou" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <label for="cod_reporteu">Código Reporte</label>
                        <input type="number" id="cod_reporteu" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <label for="observacionesu">Observaciones</label>
                        <input type="text" id="observacionesu" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <input type="hidden" id="foto1u" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <input type="hidden" id="foto2u" class="form-control input-sm" required>
                    </div>
                    <div class="modal-footer">
                        <div class="row">
                            <div class="col col-sm-6 text-left">
                                <button type="button" class="btn btn-danger" data-dismiss="modal" id="eliminarDatosReporteHallazgo">
                                    Eliminar
                                </button>
                            </div>
                            <div class="col col-sm-6 text-right">
                                <button type="button" class="btn btn-warning" data-dismiss="modal" id="actualizaDatosReporteHallazgo">
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