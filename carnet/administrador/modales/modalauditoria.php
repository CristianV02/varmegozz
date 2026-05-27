<?php
require_once '../modelo/val-admin.php';
// require '../modelo/datos-facultad.php';
// $mis_facultad = new misFacultad;
?>
<!-- MODAL PARA INSERTAR REGISTROS -->
<div class="modal fade" id="modalNuevoAuditoria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Agregar Auditoria</h4>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group">
                        <input type="hidden" id="id" class="form-control input-sm" required="">
                    </div>
                    <div class="form-group">
                        <label>descripcion</label>
                        <input type="text" id="descripcion" class="form-control input-sm" required="">
                    </div>
                    <div class="form-group">
                        <label for="usuario">Usuarios</label>
                        <input type="text" id="usuario" class="form-control input-sm" required="">
                    </div>
                    <div class="form-group">
                        <label for="tabla">tabla</label>
                        <input type="text" id="tabla" class="form-control input-sm" required="">
                    </div>
                    <div class="form-group">
                        <label for="fecha">Fecha</label>
                        <input type="date" id="fecha" class="form-control input-sm" required="">
                    </div>
                    <div class="modal-footer">
                        <div>
                            <button type="button" class="btn btn-primary" data-dismiss="modal" id="agregarNuevoAuditoria">
                                Agregar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- MODAL PARA EDICION DE DATOS-->
<div class="modal fade" id="modalEdicionAuditoria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-title">
                    <h4 class="modal-title" id="myModalLabel">Actualizar Auditoria</h4>
                </div>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group">
                        <input type="hidden" id="idu" class="form-control input-sm" required="">
                    </div>
                    <div class="form-group">
                        <label for="descripcionu">Descripcion</label>
                        <input type="text" id="descripcionu" class="form-control input-sm" required="">
                    </div>
                    <div class="form-group">
                        <label for="usuariou">Usuarios</label>
                        <input type="text" id="usuariou" class="form-control input-sm" required="">
                    </div>
                    <div class="form-group">
                        <label for="tablau">Tabla</label>
                        <input type="text" id="tablau" class="form-control input-sm" required="">
                    </div>
                    <div class="form-group">
                        <label for="fechau">Fecha</label>
                        <input type="date" id="fechau" class="form-control input-sm" required="">
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col-sm-6 text-left">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" id="eliminarDatosAuditoria">
                            Eliminar
                        </button>
                    </div>
                    <div class="col-sm-6 text-right">
                        <button type="button" class="btn btn-warning" data-dismiss="modal" id="actualizaDatosAuditoria">
                            Actualizar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>