<?php
require_once '../modelo/val-admin.php';
// require '../modelo/datos-facultad.php';
// $mis_facultad = new misFacultad;
?>
<!-- MODAL PARA INSERTAR REGISTROS -->
<div class="modal fade" id="modalNuevoEstado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Agregar Estado</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id_registro" class="form-control input-sm" required="">
                <br />
                <label>id_solicitud</label>
                <input type="text" id="id_solicitud" class="form-control input-sm" required="">
                <br />
                <div class="form-group">
                    <label for="fecha">Fecha</label>
                    <input type="date" id="fecha" class="form-control input-sm" required="">
                </div>
                <div class="form-group">
                    <label for="hora">Hora</label>
                    <input type="time" id="hora" class="form-control input-sm" required="">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="agregarNuevoEstado">
                    Agregar
                </button>
            </div>
        </div>
    </div>
</div>
<!-- MODAL PARA EDICION DE DATOS-->
<div class="modal fade" id="modalEdicionEstado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-title">
                    <h4 class="modal-title" id="myModalLabel">Actualizar Estado</h4>
                </div>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id_registrou" class="form-control input-sm" required="">
                
                <label>id_solicitud</label>
                <input type="text" id="id_solicitudu" class="form-control input-sm" required="">
                <br />
                <div class="form-group">
                    <label for="fechau">Fecha</label>
                    <input type="date" id="fechau" class="form-control input-sm" required="">
                </div>
                <div class="form-group">
                    <label for="horau">Hora</label>
                    <input type="time" id="horau" class="form-control input-sm" required="">
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-sm-6 text-left">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="eliminarDatosEstado">
                        Eliminar
                    </button>
                </div>
                <div class="col-sm-6 text-right">
                    <button type="button" class="btn btn-warning" data-dismiss="modal" id="actualizaDatosEstado">
                        Actualizar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>