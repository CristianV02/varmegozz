<?php
require_once '../modelo/val-admin.php';
?>
<!-- MODAL PARA INSERTAR REGISTROS -->
<div class="modal" id="modalNuevoTratamiento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                <input type="text" id="tratamiento" class="form-control input-sm" required>
                <br />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="agregarNuevoTratamiento">
                    Agregar
                </button>
            </div>
        </div>
    </div>
</div>
<!-- MODAL PARA EDICION DE DATOS-->
<div class="modal" id="modalEdicionTratamiento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Actualizar Registro</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="codigou" class="form-control input-sm" required>
                <label for="tratamientou">Tratamiento</label>
                <input type="text" id="tratamientou" class="form-control input-sm" required>
                <br />
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col col-sm-6 text-left">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" id="eliminarDatosTratamiento">
                            Eliminar
                        </button>
                    </div>
                    <div class="col col-sm-6 text-right">
                        <button type="button" class="btn btn-warning" data-dismiss="modal" id="actualizaDatosTratamiento">
                            Actualizar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>