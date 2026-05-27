<?php
require_once '../modelo/val-admin.php';
?>
<!-- MODAL PARA INSERTAR REGISTROS -->
<div class="modal fade" id="modalNuevoFacultad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Agregar Registro</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="cod_facultad" class="form-control input-sm" required="">
                <br />
                <label>nombre_de_facultad</label>
                <input type="text" id="nombre_de_facultad" class="form-control input-sm" required="">
                <br />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="agregarNuevoFacultad">
                    Agregar
                </button>
            </div>
        </div>
    </div>
</div>
<!-- MODAL PARA EDICION DE DATOS-->
<div class="modal fade" id="modalEdicionFacultad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-title">
                    <h4 class="modal-title" id="myModalLabel">Actualizar</h4>
                </div>
            </div>
            <div class="modal-body">
                <input type="hidden" id="cod_facultadu" class="form-control input-sm" required="">
                <br />
                <label>nombre_de_faucltad</label>
                <input type="text" id="nombre_de_facultadu" class="form-control input-sm" required="">
                <br />
            </div>
            <div class="modal-footer">
                <div class="col-sm-6 text-left">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="eliminarDatosFacultad">
                        Eliminar
                    </button>
                </div>
                <div class="col-sm-6 text-right">
                    <button type="button" class="btn btn-warning" data-dismiss="modal" id="actualizaDatosFacultad">
                        Actualizar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>