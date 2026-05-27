<?php
require_once '../modelo/val-admin.php';
require_once '../modelo/datos-usuarios.php';
require '../modelo/datos-mecanismo.php';
require '../modelo/datos-inventario-mecanismo.php';
$mis_Usuarios = new misUsuarios;
$mis_Mecanismos = new misMecanismos;
$mis_inventario = new misInventario;

?>
<!-- MODAL PARA INSERTAR REGISTROS -->
<div class="modal" id="modalNuevoReporteMecanismo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Agregar Registro</h4>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group">
                        <input type="hidden" id="codigo" class="form-control input-sm" readonly>
                    </div>
                    <div class="form-group">
                        <?php
                        $mi_usuario = $mis_Usuarios->viewUsuarios();
                        ?>
                        <label for="usuario">Usuario</label>
                        <!-- <input type="text" id="mecanismo" class="form-control input-sm" required=""> -->
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
                        <?php
                        $mi_Mecanismo = $mis_Mecanismos->viewMecanismos();
                        ?>
                        <label for="mecanismo">Mecanismo</label>
                        <select id="mecanismo" class="form-control" required>
                            <?php
                            foreach ($mi_Mecanismo as $value) {
                            ?>
                                <option value="<?php echo $value['nombre']; ?>"><?php echo $value['nombre']; ?> - <?php echo $value['codigo']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <?php
                        $mi_inventario = $mis_inventario->viewInventarios();
                        ?>
                        <label for="id_mecanismo">Id mecanismo</label>
                        <select id="id_mecanismo" class="form-control" required>
                            <?php
                            foreach ($mi_inventario as $value) {
                            ?>
                                <option value="<?php echo $value['id_inve']; ?>"><?php echo $value['id_inve']; ?> </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <!-- <label for="estado">Estado</label> -->
                        <input type="hidden" id="estado" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <label for="cod_reporte">Código Reporte</label>
                        <input type="number" id="cod_reporte" class="form-control input-sm" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal" id="agregarNuevoReporteMecanismo">
                            Agregar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- MODAL PARA EDICION DE DATOS-->
<div class="modal" id="modalEdicionReporteMecanismo" tabindex="-1" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Actualizar Registro</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group">
                        <input type="hidden" id="codigou" class="form-control input-sm" readonly="">
                        <input type="hidden" id="cod_reporteu" class="form-control input-sm" readonly="">
                        <input type="hidden" id="identificacion_clienteu" class="form-control input-sm" readonly="">
                        <input type="hidden" id="observacionu" class="form-control input-sm" readonly="">
                    </div>
                    <div class="form-group">
                        <label for="idu">Id</label>
                        <input type="text" id="idu" class="form-control input-sm" require readonly>
                    </div>
                    <div class="form-group">
                        <label for="nombre_mecanismou">Tipo de mecanismo</label>
                        <input type="text" id="nombre_mecanismou" class="form-control input-sm" require readonly>
                    </div>
                    <div class="form-group">
                        <label for="ubicacionu">Ubicación</label>
                        <input type="text" id="ubicacionu" class="form-control input-sm" require readonly>
                    </div>
                    <div class="form-group">
                        <label for="estadoalertau">Estado Alerta</label>
                        <!-- <input type="text" id="estadoalertau" class="form-control input-sm" require> -->
                        <select class="form-control" name="estadoalertau" id="estadoalertau">
                            <option value="DESACTIVADO">DESACTIVADO</option>
                            <option value="ACTIVADO">ACTIVADO</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="estadobateriau">Estado Batería</label>
                        <!-- <input type="text" id="estadobateriau" class="form-control input-sm" require readonly> -->
                        <select class="form-control" name="estadobateriau" id="estadobateriau">
                            <option value="BAJA">BAJA</option>
                            <option value="ALTA">ALTA</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <div class="row">
                            <div class="col col-sm-6 text-left">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="eliminarDatosReporteMecanismo">Eliminar
                                </button>
                            </div>
                            <div class="col col-sm-6 text-right">
                                <button type="button" class="btn btn-warning" data-bs-dismiss="modal" id="actualizaDatosReporteMecanismo">Actualizar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>