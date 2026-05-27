<?php
require_once '../modelo/val-admin.php';
require '../modelo/datos-mecanismo.php';
$mis_mecanismo = new misMecanismos;
?>
<!-- MODAL PARA INSERTAR REGISTROS -->
<div class="modal" id="modalNuevoInventarioMecanismo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Agregar Registro</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="codigo" class="form-control input-sm" required>
                <div class="form-group">
                    <?php
                    $mi_mecanismo = $mis_mecanismo->viewMecanismos();
                    ?>
                    <label for="cod_mecanismo">Codigo Mecanismo</label>
                    <select id="cod_mecanismo" class="form-control" required>
                        <?php
                        foreach ($mi_mecanismo as $value) {
                        ?>
                            <option value="<?php echo $value['nombre'] . " - " . $value['tipo']; ?>"><?php echo $value['nombre'] . " - " . $value['tipo']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <br>
                    <label for="id_inve">Id Inventario</label>
                    <input type="text" id="id_inve" class="form-control input-sm" required>
                    <br />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="agregarNuevoInventarioMecanismo">
                        Agregar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- MODAL PARA EDICION DE DATOS-->
<div class="modal" id="modalEdicionInventarioMecanismo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                 <h4 class="modal-title">Actualizar Registro</h4>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               
            </div>
            <div class="modal-body">
                <input type="hidden" id="codigou" class="form-control input-sm" required>
                <div class="form-group">
                    <?php
                    $mi_mecanismo = $mis_mecanismo->viewMecanismos();
                    ?>
                    <label for="cod_mecanismou">Codigo Mecanismo</label>
                    <select id="cod_mecanismou" class="form-control" required>
                        <?php
                        foreach ($mi_mecanismo as $value) {
                        ?>
                            <option value="<?php echo $value['nombre'] . " - " . $value['tipo']; ?>"><?php echo $value['nombre'] . " - " . $value['tipo']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <br>
                    <label for="id_inveu">Id Inventario</label>
                    <input type="text" id="id_inveu" class="form-control input-sm" required>
                    <br />
                    <label for="esta_asignadou">Estado Mecanismo</label>
                    <select id="esta_asignadou" class="form-control" required>
                        <option value="0">No asignado</option>
                        <option value="1">Asignado</option>
                    </select>
                    <br>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col col-sm-6 text-left">
                            <button type="button" class="btn btn-danger" data-dismiss="modal" id="eliminarDatosInventarioMecanismo">
                                Eliminar
                            </button>
                        </div>
                        <div class="col col-sm-6 text-right">
                            <button type="button" class="btn btn-warning" data-dismiss="modal" id="actualizaDatosInventarioMecanismo">
                                Actualizar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>