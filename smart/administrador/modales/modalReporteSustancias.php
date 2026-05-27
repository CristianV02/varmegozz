<?php
require_once '../modelo/val-admin.php';
require_once '../modelo/datos-usuarios.php';
require "../modelo/datos-cantidad.php";
require_once '../modelo/datos-sustancias.php';
$mis_Usuarios = new misUsuarios;
$mis_Cantidad = new misCantidad;
$mis_Sustancias = new misSustancias;

?>
<!-- MODAL PARA INSERTAR REGISTROS -->
<div class="modal" id="modalNuevoReporteSustancias" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Agregar Reporte Sustancias</h4>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group">
                        <input type="hidden" id="codigo" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <?php
                        $mi_usuario = $mis_Usuarios->viewUsuarios();
                        ?>
                        <label for="usuarioSustancias">Usuario</label>
                        <!-- <input type="text" id="mecanismo" class="form-control input-sm" required=""> -->

                        <select id="usuarioSustancias" class="form-control" required>
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
                        <?php
                        $mi_sustancias = $mis_Sustancias->viewSustancias();
                        ?>
                        <label for="sustancias">Sustancias</label>
                        <!-- <input type="text" id="sustancia" class="form-control input-sm" required=""> -->
                        <select id="sustancias" class="form-control" required>
                            <?php
                            foreach ($mi_sustancias as $value) {
                            ?>
                                <option value="<?php echo $value['codigo']; ?>"><?php echo $value['codigo']; ?> - <?php echo $value['nombre']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <?php
                        $mi_cantidad = $mis_Cantidad->viewCantidades();
                        ?>
                        <label for="cantidad">Cantidad</label>
                        <!-- <input type="text" id="cantidad" class="form-control input-sm" required=""> -->
                        <select id="cantidad" class="form-control" required>
                            <?php
                            foreach ($mi_cantidad as $value) {
                            ?>
                                <option value="<?php echo $value['valor']; ?>"><?php echo $value['codigo']; ?> - <?php echo $value['valor']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cod_reporte">Código Reporte</label>
                        <input type="number" id="cod_reporte" class="form-control input-sm" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal" id="agregarNuevoReporteSustancias">
                            Agregar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- MODAL PARA EDICION DE DATOS-->
<div class="modal" id="modalEdicionReporteSustancias" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                 <h4 class="modal-title">Actualizar Reporte Sustancias</h4>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="modal-body">
                        <input type="hidden" id="codigou" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <?php
                        $mi_usuario = $mis_Usuarios->viewUsuarios();
                        ?>
                        <label for="usuarioSustanciasu">Usuario</label>
                        <!-- <input type="text" id="mecanismo" class="form-control input-sm" required> -->
                        <select id="usuarioSustanciasu" class="form-control" required>
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
                        <?php
                        $mi_sustancias = $mis_Sustancias->viewSustancias();
                        ?>
                        <label for="sustanciasu">Sustancias</label>
                        <!-- <input type="text" id="sustancia" class="form-control input-sm" required=""> -->
                        <select id="sustanciasu" class="form-control" required>
                            <option selected></option>
                            <?php
                            foreach ($mi_sustancias as $value) {
                            ?>
                                <option value="<?php echo $value['nombre']; ?>"><?php echo $value['codigo']; ?> - <?php echo $value['nombre']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <?php
                        $mi_cantidad = $mis_Cantidad->viewCantidades();
                        ?>
                        <label for="cantidadu">Cantidad</label>
                        <!-- <input type="text" id="cantidad" class="form-control input-sm" required=""> -->
                        <select id="cantidadu" class="form-control" required>
                            <option selected></option>
                            <?php
                            foreach ($mi_cantidad as $value) {
                            ?>
                                <option value="<?php echo $value['valor']; ?>"><?php echo $value['codigo']; ?> - <?php echo $value['valor']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cod_reporteu">Código Reporte</label>
                        <input type="number" id="cod_reporteu" class="form-control input-sm" required>
                    </div>
                    <div class="modal-footer">
                        <div class="row">
                            <div class="col col-sm-6 text-left">
                                <button type="button" class="btn btn-danger" data-dismiss="modal" id="eliminarDatosReporteSustancias">
                                    Eliminar
                                </button>
                            </div>
                            <div class="col col-sm-6 text-right">
                                <button type="button" class="btn btn-warning" data-dismiss="modal" id="actualizaDatosReporteSustancias">
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