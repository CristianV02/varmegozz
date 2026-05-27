<?php
require_once '../modelo/val-admin.php';
require_once '../modelo/datos-usuarios.php';
$mis_Usuarios = new misUsuarios;
if ($id_rol == 1) {
    $no_modificar = "";
} else {
    $no_modificar = "readonly";
}
?>
<!-- Modal registro de un solicitud -->
<div class="modal fade" id="modalNuevoSolicitud" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                <h4>Registrar Nuevo Solicitud</h4>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <!-- <form class="text-color" id="signup" action="" method="POST"> -->
                    <div class="form-group">
                        <label for="cedula">Escribir la cedula</label>
                        <input type="text" id="cedula" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <label for="codigo">Seleccionar el tipo de usuarios</label>
                        <select id="codigo" class="form-control" required>
                            <option value="1">Administrativo</option>
                            <option value="2">Docente</option>
                            <option value="3">Estudiantes</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tipo">Seleccionar el tipo de Carnet</label>
                        <select id="tipo" class="form-control" required>
                            <option value="Nuevo">Nuevo</option>
                            <option value="Duplicado">Duplicado</option>
                            <option value="Posgrado">Posgrado</option>
                            <option value="Administrador">Administrador</option>
                            <option value="Docente">Docente</option>
                            <option value="Grado">Grado</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <!-- <label for="estado">Estado</label> -->
                        <input type="hidden" id="estado" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <!-- <label for="estado">Estado</label> -->
                        <input type="hidden" id="realiazado_por" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <!-- <label for="estado">Estado</label> -->
                        <input type="hidden" id="fecha_realizado" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <!-- <label for="estado">Estado</label> -->
                        <input type="hidden" id="realizado_por_admisiones" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <!-- <label for="estado">Estado</label> -->
                        <input type="hidden" id="fecha_de_admisiones" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <!-- <label for="estado">Estado</label> -->
                        <input type="hidden" id="entregado" class="form-control input-sm" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div>
                    <button type="button" class="btn btn-primary" id="agregarNuevoSolicitud">
                        Agregar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal ACTUALIZAR información de un solicitud -->
<div class="modal fade" id="modalEdicionSolicitud" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    < class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                <h4>Modificar Nuevo Solicitud</h4>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group">
                        <!-- <label for="id_solicitud">id_solicitud</label> -->
                        <input type="hidden" id="id_solicitudu" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_de_solicitudu">fecha_de_solicitud</label>
                        <input type="date" id="fecha_de_solicitudu" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <label for="estadou">estado</label>
                        <select id="estadou" class="form-control" required>
                            <option value="1">Cancelado</option>
                            <option value="2">Pendiente</option>
                            <option value="3">Realizado</option>
                            <option value="4">Entregado</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nombresu">nombres</label>
                        <input type="text" id="nombresu" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <label for="tipo_usuariou">tipo_usuario</label>
                        <input type="text" id="tipo_usuariou" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <label for="cargou">cargo</label>
                        <input type="text" id="cargou" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <label for="id_usuariou">id_usuario</label>
                        <input type="number" id="id_usuariou" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <label for="id_programau">id_programa</label>
                        <input type="number" id="id_programau" class="form-control input-sm" required>
                    </div>

                    <!-- <div class="form-group">
                            <label for="tipou">tipo</label>
                            <input type="text" id="tipou" class="form-control input-sm" required>
                        </div> -->
                    <div class="form-group">
                        <label for="realizado_poru">realizado_por</label>
                        <input type="text" id="realizado_poru" class="form-control input-sm" required>
                        <div class="form-group">
                            <label for="fecha_realizadou">fecha_realizado</label>
                            <input type="date" id="fecha_realizadou" class="form-control input-sm" required>
                        </div>
                        <div class="form-group">
                            <label for="recibido_por_admisionesu">recibido por admisiones</label>
                            <input type="text" class="form-control" id="recibido_por_admisionesu" <?php echo $no_modificar; ?> required>
                        </div>

                        <div class="form-group">
                            <label for="fecha_de_admisionesu">fecha_de_admisiones</label>
                            <input type="date" id="fecha_de_admisionesu" class="form-control input-sm" required>
                        </div>
                        <div class="form-group">
                            <label for="entregadou">entregado</label>
                            <input type="text" id="entregadou" class="form-control input-sm" required>
                        </div>
                        <div class="modal-footer">
                            <div class="col-sm-6 text-left">
                                <button type="button" class="btn btn-danger" data-dismiss="modal" id="eliminarDatosSolicitud">
                                    Eliminar
                                </button>
                            </div>
                            <div class="col-sm-6 text-right">
                                <button type="button" class="btn btn-warning" data-dismiss="modal" id="actualizaDatosSolicitud">
                                    Actualizar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>