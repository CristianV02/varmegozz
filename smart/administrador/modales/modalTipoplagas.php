<?php
require_once '../modelo/val-admin.php';
require_once '../modelo/datos-tratamiento.php';
$mis_tratamiento = new misTratamiento();

?>
<!-- MODAL PARA INSERTAR REGISTROS -->
<div class="modal" id="modalNuevoTipo_plagas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                <br />
                <label for="tratamiento">Tratamiento</label>
                <select type="text" name="tratamiento" id="tratamiento" class="form-control" required>
                    <?php
                    $mi_tratamiento = $mis_tratamiento->viewTratamientos();
                    foreach ($mi_tratamiento as $value) { ?>
                        <option value="<?php echo $value['tratamiento'] ?>"><?php echo $value['tratamiento'] ?></option>
                    <?php
                    }
                    ?>
                </select>
                <br />
                <label for="tipo_plaga">tipo plaga</label>
                <input type="text" id="tipo_plaga" class="form-control input-sm" required>
                <br />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="agregarNuevoTipoplaga">
                    Agregar
                </button>
            </div>
        </div>
    </div>
</div>
<!-- MODAL PARA EDICION DE DATOS-->
<div class="modal" id="modalEdicionTipo_plagas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
        <h4 class="modal-title">Actualizar Registro</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="codigou" class="form-control input-sm" required>
                <label for="tratamientou">Tratamiento</label>
                <select type="text" name="tratamientou" id="tratamientou" class="form-control" required>
                    <?php
                    $mi_tratamiento = $mis_tratamiento->viewTratamientos();
                    foreach ($mi_tratamiento as $value) { ?>
                        <option value="<?php echo $value['tratamiento'] ?>"><?php echo $value['tratamiento'] ?></option>
                    <?php
                    }
                    ?>
                </select>
                <br />
                <label for="tipo_plagau">Tipo plaga</label>
                <input type="text" id="tipo_plagau" class="form-control input-sm" required>
                <br />
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col col-sm-6 text-left">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" id="eliminarDatosTipoplaga">
                            Eliminar
                        </button>
                    </div>
                    <div class="col col-sm-6 text-right">
                        <button type="button" class="btn btn-warning" data-dismiss="modal" id="actualizaDatosTipoplaga">
                            Actualizar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>