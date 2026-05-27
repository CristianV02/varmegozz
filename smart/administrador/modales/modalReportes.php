<?php
require_once '../modelo/val-admin.php';
require '../modelo/datos-tipo-documento.php';
require_once '../modelo/datos-usuarios.php';
require '../modelo/datos-cantidad_mecanismo_cliente.php';
require '../modelo/datos-reporte-sustancias.php';
require '../modelo/datos-hallazgos.php';
$mis_documentos = new misDocumento;
$mis_Usuarios = new misUsuarios;
$mis_CantidadMecanismoCliente = new misCantidadMecanismoCliente;
$mis_ReporteSustancias = new misReporteSustancias;
$mis_Hallazgos = new misHallazgos;
?>
<!-- Modal registro de un usuario -->
<div class="modal fade" id="modalNuevoReportes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <div class="modal-title">
                    <h4>Registrar Nuevo Reporte
                    </h4>
                </div>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row">
                        <div class="form-group">
                            <input type="hidden" id="codigo" class="form-control input-sm" required>
                            <input type="hidden" id="tipo_id" class="form-control input-sm" required>
                            <input type="hidden" id="usuario" class="form-control input-sm" required>
                            <input type="hidden" id="nombre_apellido" class="form-control input-sm" required>
                            <input type="date" type="hidden" id="fecha_de_inicio" class="form-control input-sm" required>
                            <input type="time" type="hidden" id="hora_de_inicio" class="form-control input-sm" required>
                            <input type="date" type="hidden" id="fecha_fin" class="form-control input-sm" required>
                            <input type="time" type="hidden" id="hora_fin" class="form-control input-sm" required>
                            <input type="hidden" id="cantidad_mecanismo" class="form-control input-sm" required>
                            <input type="hidden" id="cantidad_de_sustancias" class="form-control input-sm" required>
                            <input type="hidden" id="cantidad_de_hallazgos" class="form-control input-sm" required>
                            <input type="hidden" id="ver_pfd" class="form-control input-sm" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div>
                            <button type="button" class="btn btn-primary" id="agregarNuevoReportes">
                                Agregar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal ACTUALIZAR información de un usuario -->
<!-- <div class="modal fade" id="modalEdicionReportes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <div class="modal-title">
                    <h4>Actualizar Reportes
                    </h4>
                </div>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <input type="hidden" id="codigou" class="form-control input-sm" required>
                    <input type="hidden" id="tipo_idu" class="form-control input-sm" required>
                    <input type="hidden" id="usuariou" class="form-control input-sm" required>
                    <input type="hidden" id="nombre_apellidou" class="form-control input-sm" required>
                    <input type="hidden" id="fecha_de_iniciou" class="form-control input-sm" required>
                    <input type="hidden" id="hora_de_iniciou" class="form-control input-sm" required>
                    <input type="hidden" id="fecha_finu" class="form-control input-sm" required>
                    <input type="hidden" id="hora_finu" class="form-control input-sm" required>
                    <input type="hidden" id="cantidad_mecanismou" class="form-control input-sm" required>
                    <input type="hidden" id="cantidad_de_sustanciasu" class="form-control input-sm" required>
                    <input type="hidden" id="cantidad_de_hallazgosu" class="form-control input-sm" required>
                    <input type="hidden" id="nivel_infestacionu" class="form-control input-sm" required>
                    <input type="hidden" id="ver_pfdu" class="form-control input-sm" required>
                </div>
            </div>
        </div>
    </div>
</div> -->