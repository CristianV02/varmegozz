<?php
require_once '../modelo/val-admin.php';
require_once '../modelo/datos-usuarios.php';
require '../modelo/datos-tipo-documento.php';
require '../modelo/datos-mecanismo.php';
require '../modelo/datos-sustancias.php';
require "../modelo/datos-cantidad.php";
require '../modelo/datos-hallazgos.php';
require '../modelo/datos-inventario-mecanismo.php';
require '../modelo/datos-tratamiento.php';
require '../modelo/datos-tipos-plagas.php';
require '../modelo/datos-nivel-infestacion.php';
require_once '../modelo/datos-Reportes.php';
$mis_Usuarios = new misUsuarios;
$mis_documentos = new misDocumento;
$mis_Mecanismo = new misMecanismos;
$mis_Sustancias = new misSustancias;
$mis_inventarios = new misInventario;
$mis_Cantidad = new misCantidad;
$mis_Hallazgos = new misHallazgos;
$mis_Tratamiento = new misTratamiento;
$mis_Tipo_plagas = new misTipo_plagas;
$mis_Infestacion = new misInfestacion;
$mis_Reportes = new misReportes;
?>

<!-- MODAL PARA Crear Reportes -->
<div class="modal fade" id="modalCrearReportes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="tru">&times;</span></button>
                <div class="modal-title">
                    <h4>Guardar Reporte</h4>
                </div>

            </div>
            <!-- <div class="modal-body">
                <p></p>
            </div> -->
            <div class="modal-footer">
                <div>
                    <button type="button" class="btn btn-primary" id="agregarNuevoReportes">
                        Confirmar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- MODAL PARA Usuario -->
<div class="modal fade" id="modalUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <div class="modal-title">
                    <h4 class="modal-title" id="myModalLabel">Agregar Usuario</h4>
                </div>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group">
                        <input type="hidden" id="codigo_reporteu" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <?php
                        $mi_documento = $mis_documentos->viewDocumentos();
                        ?>
                        <label for="tipo_doc">Tipo de identificación</label>
                        <!-- <input type="text" class="form-control" id="tipo_id" placeholder="tipo documento" required> -->
                        <select id="tipo_doc" class="form-control" required>
                            <?php
                            foreach ($mi_documento as $value) {
                            ?>
                                <option value="<?php echo $value['sigla']; ?>"><?php echo $value['nombre']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <?php
                        $mi_Usuario = $mis_Usuarios->viewUsuariosCliente();
                        ?>
                        <!-- Lo que se seleccione aqui se debe fijar en el usuario para las otras tablas. -->
                        <label for="nombre_usuario">Usuario</label>
                        <select id="nombre_usuario" class="form-control" required>
                            <option selected></option>
                            <?php
                            foreach ($mi_Usuario as $value) {
                            ?>
                                <option value="<?php echo $value['identificacion'] . " - " . $value['nombre'] . " " . $value['apellido']; ?>"><?php echo $value['identificacion'] . " - " . $value['nombre'] . " " . $value['apellido']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="empresa_usu">Tipo de establecimiento</label>
                        <select type="text" name="empresa_usu" id="empresa_usu" class="form-control" required>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="fecha_de_inicio">Fecha de Inicio</label>
                        <input type="date" id="fecha_de_inicio" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <label for="hora_de_inicio">Hora de Inicio</label>
                        <input type="time" id="hora_de_inicio" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_fin">Fecha Fin</label>
                        <input type="date" id="fecha_fin" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <label for="hora_fin">Hora Fin</label>
                        <input type="time" id="hora_fin" class="form-control input-sm" required>
                    </div>
                    <div class="modal-footer">
                        <div>
                            <button type="button" class="btn btn-primary" id="agregarNuevoUsuario">
                                Agregar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- MODAL PARA Sustancias -->
<div class="modal fade" id="modalSustancias" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Agregar Sustancia</h4>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group">
                        <input type="hidden" id="cod_reportesustanciasu" class="form-control input-sm" readonly>
                    </div>
                    <div class="form-group">
                        <?php
                        $mi_reportes = $mis_Reportes->viewReporteUsuario($reporte);
                        $mi_usuario = $mis_Usuarios->viewUsuarioDocumento($mi_reportes[0]["usuario"]);
                        ?>
                        <label for="usuarioSustancias">Usuario</label>
                        <!-- <input type="text" id="mecanismo" class="form-control input-sm" required=""> -->

                        <select id="usuarioSustancias" class="form-control" required disabled>
                            <?php
                            foreach ($mi_usuario as $value) {
                            ?>
                                <option value="<?php echo $value['identificacion'] ?>"><?php echo $value['identificacion'] . " - " . $value['nombre'] . " " . $value['apellido']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <?php
                        $mi_sustancias = $mis_Sustancias->viewSustancias();
                        ?>
                        <label for="sustancias">Sustancias</label>
                        <select id="sustancias" class="form-control" required>
                            <?php
                            foreach ($mi_sustancias as $value) {
                            ?>
                                <option value="<?php echo $value['codigo']; ?>"><?php echo $value['codigo']; ?> - <?php echo $value['nombre']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                        <select type="text" name="cantidad" id="cantidad" class="form-control" required>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="agregarNuevaSustancias">
                            Agregar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- MODAL PARA Mecanismo -->
<!-- No se utiliza este modal, se utiliza modalCantidadMecanismoCliente.php Este debe ser igual al modal de cantidad mecanismo. -->
<div class="modal fade" id="modalMecanismo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Agregar Mecanismo 1</h4>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group">
                        <input type="hidden" id="cod_reportemecanismou" class="form-control input-sm" readonly>
                    </div>
                    <div class="form-group">
                        <?php
                        $mi_usuario = $mis_Usuarios->viewUsuarios();
                        ?>
                        <label for="usuarioMecanismo">Usuario</label>
                        <!-- <input type="text" id="mecanismo" class="form-control input-sm" required=""> -->
                        <select id="usuarioMecanismo" class="form-control" required disabled>
                            <?php
                            foreach ($mi_usuario as $value) {
                            ?>
                                <option value="<?php echo $value['identificacion']; ?>"><?php echo $value['identificacion']; ?> - <?php echo $value['nombre']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <?php
                        $mi_mecanismo = $mis_Mecanismo->viewMecanismos();
                        ?>
                        <label for="mecanismo">Mecanismo</label>
                        <!-- <input type="text" id="mecanismo" class="form-control input-sm" required=""> -->
                        <select id="mecanismo" class="form-control" required>
                            <?php
                            foreach ($mi_mecanismo as $value) {
                            ?>
                                <option value="<?php echo $value['nombre']; ?>"><?php echo $value['nombre']; ?> - <?php echo $value['codigo']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <?php
                        $mi_inventario = $mis_inventarios->viewInventariosNoAsignados();
                        ?>
                        <label for="id_mecanismo">Id Mecanismo</label>
                        <!-- <input type="text" id="id_mecanismo" class="form-control input-sm" required=""> -->
                        <select id="id_mecanismo" class="form-control" required>
                            <?php
                            foreach ($mi_inventario as $value) {
                            ?>

                                <option value="<?php echo $value['id_inve']; ?>"><?php echo $value['id_inve']; ?> </option>

                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <!-- <label>estado</label> -->
                        <input type="hidden" id="estado" class="form-control input-sm" readyonly>
                    </div>
                    <div class="modal-footer">
                        <div>
                            <button type="button" class="btn btn-primary" id="agregarNuevaMecanismo">
                                Agregar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- MODAL PARA Hallazgo -->
<div class="modal fade" id="modalHallazgo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Agregar Oportunidad de Mejora</h4>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group">
                        <input type="hidden" id="cod_reportehallazgou" class="form-control input-sm" readonly>
                    </div>
                    <div class="form-group">

                        <?php
                        $mi_reportes = $mis_Reportes->viewReporteUsuario($reporte);
                        $mi_usuario = $mis_Usuarios->viewUsuarioDocumento($mi_reportes[0]["usuario"]);
                        ?>
                        <label for="usuarioHallazgo">Usuario</label>
                        <!-- <input type="text" id="mecanismo" class="form-control input-sm" required=""> -->

                        <select id="usuarioHallazgo" class="form-control" required disabled>
                            <?php
                            foreach ($mi_usuario as $value) {
                            ?>
                                <option value="<?php echo $value['identificacion'] ?>"><?php echo $value['identificacion'] . " - " . $value['nombre'] . " " . $value['apellido']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="hallazgo">Tipo de Mejora</label>
                        <input type="text" id="hallazgo" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <label for="oportunidad_1">Oportunidad de Mejora 1</label>
                        <textarea id="oportunidad_1" class="form-control input-sm" rows="4" cols="34" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="oportunidad_2">Oportunidad de Mejora 2</label>
                        <textarea id="oportunidad_2" class="form-control input-sm" rows="4" cols="34" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="oportunidad_3">Oportunidad de Mejora 3</label>
                        <textarea id="oportunidad_3" class="form-control input-sm" rows="4" cols="34" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="oportunidad_4">Oportunidad de Mejora 4</label>
                        <textarea id="oportunidad_4" class="form-control input-sm" rows="4" cols="34" required></textarea>
                    </div>
                    <div class="modal-footer">
                        <div>
                            <button type="button" class="btn btn-primary" data-dismiss="modal" id="agregarNuevoHallazgo">
                                Agregar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- MODAL PARA Tratamiento -->
<div class="modal fade" id="modalTratamiento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Agregar Tratamiento</h4>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group">
                        <input type="hidden" id="cod_reportetratamientou" class="form-control input-sm" readonly>
                    </div>
                    <div class="form-group">
                        <?php
                        $mi_reportes = $mis_Reportes->viewReporteUsuario($reporte);
                        $mi_usuario = $mis_Usuarios->viewUsuarioDocumento($mi_reportes[0]["usuario"]);
                        ?>
                        <label for="usuarioTratamiento">Usuario</label>
                        <select id="usuarioTratamiento" class="form-control" required disabled>
                            <?php
                            foreach ($mi_usuario as $value) {
                            ?>
                                <option value="<?php echo $value['identificacion'] . " - " . $value['nombre'] . " " . $value['apellido']; ?>"><?php echo $value['identificacion'] . " - " . $value['nombre'] . " " . $value['apellido']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <?php
                        $mi_tratamiento = $mis_Tratamiento->viewTratamientos();
                        ?>
                        <label for="tratamiento">Tratamiento</label>
                        <select id="tratamiento" class="form-control" required>
                            <?php
                            foreach ($mi_tratamiento as $value) {
                            ?>
                                <option value="<?php echo $value['tratamiento']; ?>"><?php echo $value['tratamiento']; ?> - <?php echo $value['codigo']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="metodo_control">Método Control</label>
                        <select type="text" name="metodo_control" id="metodo_control" class="form-control" required>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tipo_plagas">Tipo de plagas</label>
                        <select type="text" name="tipo_plagas" id="tipo_plagas" class="form-control" required>
                        </select>
                    </div>
                    <div class="form-group">
                        <?php
                        $mi_Infestacion = $mis_Infestacion->viewInfestaciones();
                        ?>
                        <label for="nivel_infestacion">Nivel de Infestación</label>
                        <select id="nivel_infestacion" class="form-control" required>
                            <?php
                            foreach ($mi_Infestacion as $value) {
                            ?>
                                <option value="<?php echo $value['nivel']; ?>"><?php echo $value['nivel']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal" id="agregarNuevoTratamiento">
                            Agregar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>