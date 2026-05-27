<?php
require_once '../modelo/val-admin.php';
require_once '../modelo/datos-usuarios.php';
require '../modelo/datos-tipo-documento.php';
require '../modelo/datos-mecanismo.php';
require '../modelo/datos-sustancias.php';
require '../modelo/datos-laboratorios.php';
require "../modelo/datos-cantidad.php";
require '../modelo/datos-hallazgos.php';
require '../modelo/datos-tratamiento.php';
require '../modelo/datos-tipos-plagas.php';
require '../modelo/datos-nivel-infestacion.php';
require '../modelo/datos-inventario-mecanismo.php';
$mis_Usuarios = new misUsuarios;
$mis_documentos = new misDocumento;
$mis_Mecanismo = new misMecanismos;
$mis_Sustancias = new misSustancias;
$mis_Laboratorios = new misLaboratorios;
$mis_Cantidad = new misCantidad;
$mis_Hallazgos = new misHallazgos;
$mis_Tratamiento = new misTratamiento;
$mis_Tipo_plagas = new misTipo_plagas;
$mis_Infestacion = new misInfestacion;
$mis_inventarios = new misInventario;
?>

<!-- MODAL PARA Modificar Reportes -->
<div class="modal" id="modalEdicionReporte" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Actualizar Reporte</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        </div>
        <div class="modal-footer">
            <div>
                <button type="button" class="btn btn-primary" id="agregarNuevoReportes">
                    Agregar
                </button>
            </div>
        </div>
    </div>
</div>
<!-- MODAL PARA Modificar Usuario -->
<div class="modal" id="modalEdicionUsuario" tabindex="-1" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                 <h4 class="modal-title">Actualizar Usuario</h4>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group">
                        <input type="hidden" id="codigou" class="form-control input-sm" required disabled>
                        <?php
                        $mi_documento = $mis_documentos->viewDocumentos();
                        ?>
                        <label for="tipo_documentou">Tipo de Identificación</label>
                        <!-- <input type="text" class="form-control" id="tipo_id" placeholder="tipo documento" required> -->
                        <select id="tipo_documentou" class="form-control" required>
                            <?php
                            foreach ($mi_documento as $value) {
                            ?>
                                <option value="<?php echo $value['sigla']; ?>"><?php echo $value['sigla']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <?php
                        $mi_Usuario = $mis_Usuarios->viewUsuariosCliente();
                        ?>
                        <label for="usuariou">Usuario</label>
                        <select id="usuariou" class="form-control" required disabled>
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
                        <label for="fecha_de_iniciou">Fecha de Inicio</label>
                        <input type="date" class="form-control" id="fecha_de_iniciou" placeholder="fecha_de_inicio" required>
                    </div>
                    <div class="form-group">
                        <label for="hora_de_iniciou">Hora de Inicio</label>
                        <input type="time" class="form-control" id="hora_de_iniciou" placeholder="hora_de_inicio" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_finu">Fecha Fin</label>
                        <input type="date" class="form-control" id="fecha_finu" placeholder="fecha_fin" required>
                    </div>
                    <div class="form-group">
                        <label for="hora_finu">Hora Fin</label>
                        <input type="time" class="form-control" id="hora_finu" placeholder="hora_fin" required>
                    </div>
                    <div class="modal-footer">
                        <div class="row">
                            <div class="col col-sm-6 text-left">
                                <button type="button" class="btn btn-danger" data-dismiss="modal" id="eliminarDatosReportes">
                                    Eliminar
                                </button>
                            </div>
                            <div class="col col-sm-6 text-right">
                                <button type="button" class="btn btn-warning" data-dismiss="modal" id="actualizaDatosUsuario">
                                    Actualizar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- MODAL PARA Modificar Sustancias -->
<div class="modal" id="modalEdicionSustancias" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Actualizar Sustancia</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group">
                        <input type="hidden" id="codigosustanciasu" class="form-control input-sm" readyonly="">
                    </div>
                    <div class="form-group">
                        <input type="hidden" id="cod_reportesustanciasu" class="form-control input-sm" readyonly="">
                    </div>
                    <div class="form-group">
                        <?php
                        $mi_usuario = $mis_Usuarios->viewUsuarios();
                        ?>
                        <label for="usuarioSustanciasu">Usuario</label>
                        <!-- <input type="text" id="mecanismo" class="form-control input-sm" required> -->
                        <select id="usuarioSustanciasu" class="form-control" required disabled>
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
                        $mi_sustancias = $mis_Sustancias->viewSustancias();
                        ?>
                        <label for="sustanciasu">Nombre sustancia</label>
                        <!-- <input type="text" id="sustancia" class="form-control input-sm" required=""> -->
                        <select id="sustanciasu" class="form-control" required>
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
                        <input type="hidden" id="nivel_riesgou" class="form-control input-sm" readyonly="">
                    </div>
                    <div class="form-group">
                        <label for="cantidadu">Cantidad</label>
                        <select type="text" name="cantidadu" id="cantidadu" class="form-control" required>
                        </select>
                    </div>
                    <div class="form-group">
                        <!-- <input type="text" id="laboratoriou" class="form-control input-sm" readyonly=""> -->
                        <select type="text" name="laboratoriou" id="laboratoriou" style="visibility: hidden;" class="form-control" required></select>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <div class="row">
                            <div class="col col-sm-6 text-left">
                                <button type="button" class="btn btn-danger" data-dismiss="modal" id="eliminarDatosSustancias">
                                    Eliminar
                                </button>
                            </div>
                            <div class="col col-sm-6 text-right">
                                <button type="button" class="btn btn-warning" data-dismiss="modal" id="actualizaDatosSustancias">
                                    Actualizar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- MODAL PARA Modificar Mecanismo -->
<div class="modal" id="modalEdicionMecanismo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Actualizar Mecanismo</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group">
                        <input type="hidden" id="codigomecanismou" class="form-control input-sm" readyonly="">
                    </div>
                    <div class="form-group">
                        <input type="hidden" id="cod_reportemecanismou" class="form-control input-sm" readyonly="">
                    </div>
                    <div class="form-group">
                        <label for="usuarioMecanismou">Usuario</label>
                        <!-- <input type="text" id="mecanismo" class="form-control input-sm" required=""> -->
                        <?php
                        $mi_usuario = $mis_Usuarios->viewUsuarios();
                        ?>
                        <select id="usuarioMecanismou" class="form-control" required>
                            <option selected></option>
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
                        <label for="mecanismou">Mecanismo</label>
                        <!-- <input type="text" id="mecanismo" class="form-control input-sm" required=""> -->
                        <?php
                        $mi_mecanismo = $mis_Mecanismo->viewMecanismos();
                        ?>
                        <select id="mecanismou" class="form-control" required>
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
                        $mi_inventario = $mis_inventarios->viewInventarios();
                        ?>
                        <label for="id_mecanismou">Id Mecanismo</label>
                        <!-- <input type="text" id="id_mecanismo" class="form-control input-sm" required=""> -->
                        <select id="id_mecanismou" class="form-control" required>
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
                        <!-- <label for="estado">estado</label> -->
                        <input type="hidden" id="estadou" class="form-control input-sm" readyonly="">
                    </div>
                    <div class="modal-footer">
                        <div class="row">
                            <div class="col col-sm-6 text-left">
                                <button type="button" class="btn btn-danger" data-dismiss="modal" id="eliminarDatosMecanismo">
                                    Eliminar
                                </button>
                            </div>
                            <div class="col col-sm-6 text-right">
                                <button type="button" class="btn btn-warning" data-dismiss="modal" id="actualizaDatosMecanismo">
                                    Actualizar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- MODAL PARA Modificar Hallazgo -->
<div class="modal" id="modalEdicionHallazgo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Modificar Oportunidad de Mejora</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group">
                        <input type="hidden" id="cod_reportehallazgou" class="form-control input-sm" readonly>
                    </div>
                    <div class="form-group">
                        <input type="hidden" id="codigohallazgou" class="form-control input-sm" readonly>
                    </div>
                    <div class="form-group">

                        <?php
                        $mi_Usuario = $mis_Usuarios->viewUsuariosCliente();
                        ?>
                        <label for="usuarioHallazgou">Usuario</label>
                        <!-- <input type="text" id="mecanismo" class="form-control input-sm" required=""> -->

                        <select id="usuarioHallazgou" class="form-control" required disabled>
                            <?php
                            foreach ($mi_Usuario as $value) {
                            ?>
                                <option value="<?php echo $value['identificacion'] ?>"><?php echo $value['identificacion'] . " - " . $value['nombre'] . " " . $value['apellido']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="hallazgou">Tipo de Mejora</label>
                        <input type="text" id="hallazgou" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <label for="oportunidad_1u">Oportunidad de Mejora 1</label>
                        <textarea id="oportunidad_1u" class="form-control input-sm" rows="4" cols="34" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="oportunidad_2u">Oportunidad de Mejora 2</label>
                        <textarea id="oportunidad_2u" class="form-control input-sm" rows="4" cols="34" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="oportunidad_3u">Oportunidad de Mejora 3</label>
                        <textarea id="oportunidad_3u" class="form-control input-sm" rows="4" cols="34" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="oportunidad_4u">Oportunidad de Mejora 4</label>
                        <textarea id="oportunidad_4u" class="form-control input-sm" rows="4" cols="34" required></textarea>
                    </div>
                    <div class="modal-footer">
                        <div class="row">
                            <div class="col col-sm-6 text-left">
                                <button type="button" class="btn btn-danger" data-dismiss="modal" id="eliminarDatosHallazgo">
                                    Eliminar
                                </button>
                            </div>
                            <div class="col col-sm-6 text-right">
                                <button type="button" class="btn btn-warning" data-dismiss="modal" id="actualizaDatosHallazgo">
                                    Actualizar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- MODAL PARA Modificar Tratamiento -->
<div class="modal" id="modalEdicionTratamiento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Actualizar Tratamiento</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group">
                        <input type="hidden" id="codigoTratamientou" class="form-control input-sm" readyonly="">
                    </div>
                    <div class="form-group">
                        <input type="hidden" id="cod_reportetratamientou" class="form-control input-sm" readyonly="">
                    </div>
                    <div class="form-group">
                        <?php
                        $mi_usuario = $mis_Usuarios->viewUsuarios();
                        ?>
                        <label for="usuarioTratamientou">Usuario</label>
                        <select id="usuarioTratamientou" class="form-control" required disabled>
                            <?php
                            foreach ($mi_usuario as $value) {
                            ?>
                                <option value="<?php echo $value['identificacion']; ?>"><?php echo $value['identificacion']; ?> - <?php echo $value['nombre'] . " " . $value['apellido']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <?php
                        $mi_tratamiento = $mis_Tratamiento->viewTratamientos();
                        ?>
                        <label for="tratamientou">Tratamiento</label>
                        <!-- <input type="text" id="tratamiento" class="form-control input-sm" required=""> -->
                        <select id="tratamientou" class="form-control" required>
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
                        <label for="tipo_plagasu">Tipo de Plaga</label>
                        <select type="text" name="tipo_plagasu" id="tipo_plagasu" class="form-control" required>
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
    </div>
</div>