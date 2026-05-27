<?php
require_once '../modelo/val-admin.php';
require_once '../modelo/datos-usuarios.php';
require '../modelo/datos-inventario-mecanismo.php';
$mis_inventarios = new misInventario;
$mis_usuarios = new misUsuarios;

?>
<!-- MODAL PARA INSERTAR REGISTROS -->
<div class="modal fade" id="modalNuevoReporteMecanismo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Agregar Registro</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="codigo" class="form-control input-sm" required>
                <div class="form-group">
                    <?php
                    $mi_inventario = $mis_inventarios->viewInventarios();
                    ?>
                    <label for="id">Id</label>
                    <select id="id" class="form-control" required>
                        <?php
                        foreach ($mi_inventario as $value) {
                        ?>
                            <option value="<?php echo $value['id_inve']; ?>"><?php echo $value['id_inve']; ?> </option>

                        <?php
                        }
                        ?>
                    </select>
                </div>
                <label for="fecha">Fecha</label>
                <input type="date" id="fecha" class="form-control input-sm" required placeholder="AAAA-MM-DD">
                <br />
                <label for="hora">Hora</label>
                <input type="time" id="hora" class="form-control input-sm" required>
                <div class="form-group">
                    <?php
                    $mi_usuario = $mis_usuarios->viewUsuarios();
                    ?>
                    <label for="identificacion_cliente">Identificación Cliente</label>
                    <select id="identificacion_cliente" class="form-control" required>
                        <?php
                        foreach ($mi_usuario as $value) {
                        ?>
                            <option value="<?php echo $value['identificacion']; ?>"><?php echo $value['identificacion'] . " - " . $value['nombre'] . " " . $value['apellido']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="agregarNuevoReporteMecanismo">
                    Agregar
                </button>
            </div>
        </div>
    </div>
</div>
<!-- MODAL PARA EDICION DE DATOS-->
<div class="modal fade" id="modalEdicionReporteMecanismo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Actualizar Registro</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="codigou" class="form-control input-sm" required>
                <div class="form-group">
                    <?php
                    $mi_inventario = $mis_inventarios->viewInventarios();
                    ?>
                    <label for="idu">Id</label>
                    <select id="idu" class="form-control" required>
                        <?php
                        foreach ($mi_inventario as $value) {
                        ?>
                            <option value="<?php echo $value['id_inve']; ?>"><?php echo $value['id_inve']; ?> </option>

                        <?php
                        }
                        ?>
                    </select>
                </div>
                <label for="fechau">Fecha</label>
                <input type="date" id="fechau" class="form-control input-sm" required>
                <br />
                <label for="horau">Hora</label>
                <input type="time" id="horau" class="form-control input-sm" required>
                <br />
                <div class="form-group">
                    <?php
                    $mi_usuario = $mis_usuarios->viewUsuarios();
                    ?>
                    <label for="identificacion_clienteu">Identificación Cliente</label>
                    <select id="identificacion_clienteu" class="form-control" required>
                        <?php
                        foreach ($mi_usuario as $value) {
                        ?>
                            <option value="<?php echo $value['identificacion']; ?>"><?php echo $value['identificacion'] . " - " . $value['nombre'] . " " . $value['apellido']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <div class="modal-footer">
                        <div class="col col-sm-6 text-left">
                            <button type="button" class="btn btn-danger" data-dismiss="modal" id="eliminarDatosReporteMecanismo">
                                Eliminar
                            </button>
                        </div>
                        <div class="col col-sm-6 text-right">
                            <button type="button" class="btn btn-warning" data-dismiss="modal" id="actualizaDatosReporteMecanismo">
                                Actualizar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>