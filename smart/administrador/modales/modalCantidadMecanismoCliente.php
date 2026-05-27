<?php
require_once '../modelo/val-admin.php';
require_once '../modelo/datos-usuarios.php';
require_once '../modelo/datos-inventario-mecanismo.php';
require_once '../modelo/datos-mecanismo.php';
require_once '../modelo/datos-Reportes.php';
$mis_mecanismo = new misMecanismos;
$mis_reportes = new misReportes;
$mis_usuarios = new misUsuarios;
$mis_inventarios = new misInventario;
?>
<!-- MODAL PARA INSERTAR REGISTROS -->
<div class="modal fade" id="modalNuevoCantidadMecanismoCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Agregar Registro</h4>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group">
                        <input type="hidden" id="codigo" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <!-- <label for="cod_mecanismo">Codigo Mecanismo</label> -->
                        <input type="hidden" id="cod_mecanismo" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <?php
                        $mi_inventario = $mis_inventarios->viewInventariosNoAsignados();
                        ?>
                        <label for="id">Id</label>
                        <select id="id" class="form-control" required>
                            <?php
                            foreach ($mi_inventario as $value) {
                            ?>
                                <option value="<?php echo $value['id_inve']  . " - " . $value['nombre_mecanismo']; ?>"><?php echo $value['id_inve']  . " - " . $value['nombre_mecanismo']; ?> </option>

                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <?php
                        $mi_reportes = $mis_reportes->viewReporteUsuario($reporte);
                        $mi_usuario = $mis_Usuarios->viewUsuarioDocumento($mi_reportes[0]["usuario"]);
                        ?>
                        <label for="identificacion_cliente">Usuario</label>
                        <!-- <input type="text" id="mecanismo" class="form-control input-sm" required=""> -->

                        <select id="identificacion_cliente" class="form-control" required disabled>
                            <?php
                            foreach ($mi_usuario as $value) {
                            ?>
                                <option value="<?php echo $value['identificacion'] ?>"><?php echo $value['identificacion'] . " - " . $value['nombre'] . " " . $value['apellido']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ubicacion">Ubicación</label>
                        <input type="text" id="ubicacion" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <label for="observacion">Observación</label>
                        <textarea class="form-control" id="observacion" rows="3" style="resize: vertical;"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="hidden" id="estadoalerta" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <input type="hidden" id="estadobateria" class="form-control input-sm" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal" id="agregarNuevoCantidadMecanismoCliente">
                            Agregar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- MODAL PARA EDICION DE DATOS-->
<div class="modal fade" id="modalEdicionCantidadMecanismoCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Modificar Mecanismo</h4>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
               
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group">
                        <input type="hidden" id="codigo_mecu" class="form-control input-sm" required>
                    </div>
                    <!-- <div class="form-group"> -->
                        <!-- <label for="cod_mecanismou">Codigo Mecanismo</label> -->
                        <!-- <input type="text" id="cod_mecanismou" class="form-control input-sm" required> -->
                    <!-- </div> -->
                    <div class="form-group">
                        <?php
                        $mi_usuario = $mis_usuarios->viewUsuarios();
                        ?>
                        <label for="identificacion_clienteu">Identificación Cliente</label>
                        <select id="identificacion_clienteu" class="form-control" required disabled>
                            <?php
                            foreach ($mi_usuario as $value) {
                            ?>
                                <option value="<?php echo $value['identificacion']; ?>"><?php echo $value['identificacion'] . " - " . $value['nombre'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <?php
                        //Los no asignados más los del reporte
                        $mi_inventario = $mis_inventarios->viewInventariosNoAsignados1($reporte);
                        ?>
                        <label for="idu">Id</label>
                        <select id="idu" class="form-control" required>
                            <?php
                            foreach ($mi_inventario as $value) {
                            ?>
                                <option value="<?php echo $value['id_inve']  . " - " . $value['nombre_mecanismo']; ?>"><?php echo $value['id_inve']  . " - " . $value['nombre_mecanismo']; ?> </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ubicacionu">Ubicación</label>
                    <input type="text" id="ubicacionu" class="form-control input-sm" required>
                </div>
                <div class="form-group">
                    <label for="observacionu">Observación</label>
                    <textarea class="form-control" id="observacionu" rows="3" style="resize: vertical;"></textarea>
                </div>
                <div class="form-group">
                    <input type="hidden" id="estadoalertau" class="form-control input-sm" required>
                </div>
                <div class="form-group">
                    <input type="hidden" id="estadobateriau" class="form-control input-sm" required>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col col-sm-6 text-left">
                            <button type="button" class="btn btn-danger" data-dismiss="modal" id="eliminarDatosCantidadMecanismoCliente">
                                Eliminar
                            </button>
                        </div>
                        <div class="col col-sm-6 text-right">
                            <button type="button" class="btn btn-warning" data-dismiss="modal" id="actualizaDatosCantidadMecanismoCliente">
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