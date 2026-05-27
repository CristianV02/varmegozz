<?php
// require '../modelo/datos-estudiantes.php';
// $mis_Estudiantes = new misEstudiante;

?>
<!-- Modal registro de un usuario -->
<div class="modal fade" id="modalSolicitud" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                <h4>Registrar Nuevo Solicitud</h4>
            </div>
            <div class="modal-body">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group">
                            <input type="number" id="cedula" class="form-control input-sm" required>
                        </div>
                        <div class="modal-footer">
                            <div>
                                <button type="button" class="btn btn-primary" id="agregarNuevoCrearSolicitud">
                                    Agregar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>