<?php
require_once '../../modelo/val-admin.php';
require_once '../../modelo/datos-apoyos.php';
$misApoyos = new misApoyos();
// Validamos el rol de usuario para evitar intrusos
if ($rol_id == 1 || $rol_id == 4 ){
} else{
    echo '<script language = javascript>
    alert ("Debe seleccionar una empresa.") 
    self.location="../index.php"
    </script>';
}
?>

<div class="col-sm-12">
    <!-- Inicio titulos de la pagina-->
    <div class="page-head">
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Apoyos Socioeconomicos
                    <small>SENA</small>
                </h1>
            </div>
            <!-- END PAGE TITLE -->
        </div>
    </div>

    <!-- END PAGE HEAD-->
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="index.php">Inicio</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="configuracion.php">Configuración</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span class="active">Lista de Apoyos Socioeconomicos</span>
        </li>
    </ul>
    <!-- END PAGE BREADCRUMB -->
    <!-- BEGIN PAGE BASE CONTENT -->
    <!-- BEGIN DASHBOARD STATS 1-->
    <br />
    <!-- INICIO DEL CONTENIDO -->
    <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered">
            <thead>
                <th>
                    <div class="text-center">Item</div>
                </th>
                <th>
                    <div class="text-center">Tipo<br />Documento</div>
                </th>
                <th>
                    <div class="text-center">Número<br />Documento</div>
                </th>

                <th>
                    <div class="text-center">Nombres<br />Apellidos</div>
                </th>

                <th>
                    <div class="text-center">Número<br />Ficha</div>
                </th>
                <th>
                    <div class="text-center">Programa<br /> Formación</div>
                </th>
                <th>
                    <div class="text-center">Fecha Inicio<br />Ficha</div>
                </th>
                <th>
                    <div class="text-center">Fecha Fin<br />Ficha</div>
                </th>
                <th>
                    <div class="text-center">Nivel<br />Formación</div>
                </th>
                <th>
                    <div class="text-center">Estado del aprendiz<br />Formación</div>
                </th>
                <th>
                    <div class="text-center">Apoyos<br />Socioecónomicos</div>
                </th>
                <th>
                    <div class="text-center">Estado<br />Apoyo</div>
                </th>
                <th>
                    <div class="text-center">Fecha Inicio<br />Apoyo</div>
                </th>
                <th>
                    <div class="text-center">Fecha Fin<br />Apoyo</div>
                </th>
                <th>
                    <div class="text-center">Número<br />Resolución Apoyo</div>
                </th>
                <th>
                    <div class="text-center">Nombre Novedad<br /> Suspensión</div>
                </th>
                <th>
                    <div class="text-center">Motivo Novedad<br />Suspensión</div>
                </th>
                <th>
                    <div class="text-center">Fecha Novedad<br />Suspensión</div>
                </th>
                <th>
                    <div class="text-center">Nombre de Quien<br />Registra</div>
                </th>
                <th>
                    <div class="text-center">Resolución Novedad<br /> Suspensión</div>
                </th>
                <th>
                    <div class="text-center">Nombre Novedad<br /> Reactivación</div>
                </th>
                <th>
                    <div class="text-center">Motivo Novedad<br />Reactivación</div>
                </th>
                <th>
                    <div class="text-center">Fecha Novedad<br />Reactivación</div>
                </th>
                <th>
                    <div class="text-center">Nombre de Quien<br />Registra</div>
                </th>
                <th>
                    <div class="text-center">Resolución Novedad<br /> Reactivación</div>
                </th>
                <th>
                    <div class="text-center">Nombre Novedad<br /> Cancelación</div>
                </th>
                <th>
                    <div class="text-center">Motivo Novedad<br />Cancelación</div>
                </th>
                <th>
                    <div class="text-center">Fecha Novedad<br />Cancelación</div>
                </th>
                <th>
                    <div class="text-center">Nombre de Quien<br />Registra</div>
                </th>
                <th>
                    <div class="text-center">Resolución Novedad<br /> Cancelación</div>
                </th>
                <th>
                    <div class="text-center">Editar</div>
                </th>
            </thead>
            <tbody>
                <?php
                $res = $misApoyos->viewApoyos();
                foreach ($res as $data) {
                    // Datos
                    $datos = $data['codigo'] . "||" .
                        $data['tipo_documento'] . "||" .
                        $data['numero_documento'] . "||" .
                        $data['nombres_apellidos'] . "||" .
                        $data['ficha'] . "||" .
                        $data['programa_formacion'] . "||" .
                        $data['inicio_ficha'] . "||" .
                        $data['fin_ficha'] . "||" .
                        $data['nivel_formacion'] . "||" .
                        $data['estado_aprendiz'] . "||" .
                        $data['apoyo_socioeconomico'] . "||" .
                        $data['estado_apoyo'] . "||" .
                        $data['inicio_apoyo'] . "||" .
                        $data['fin_apoyo'] . "||" .
                        $data['numero_resolucion_apoyo'] . "||" .
                        $data['nombre_novedad_suspension'] . "||" .
                        $data['motivo_suspension'] . "||" .
                        $data['fecha_novedad_suspension'] . "||" .
                        $data['nombre_registro_suspension'] . "||" .
                        $data['resolucion_novedad_suspension'] . "||" .
                        $data['nombre_novedad_reactivacion'] . "||" .
                        $data['motivo_reactivacion'] . "||" .
                        $data['fecha_novedad_reactivacion'] . "||" .
                        $data['nombre_registro_reactivacion'] . "||" .
                        $data['resolucion_novedad_reactivacion'] . "||" .
                        $data['nombre_novedad_cancelacion'] . "||" .
                        $data['motivo_cancelacion'] . "||" .
                        $data['fecha_novedad_cancelacion'] . "||" .
                        $data['nombre_registro_cancelacion'] . "||" .
                        $data['resolucion_novedad_cancelacion'];
                ?>
                    <tr>
                        <td>
                            <div class="text-center">
                                <?php echo $data['codigo']; ?></div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $data['tipo_documento']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $data['numero_documento']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $data['nombres_apellidos']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $data['ficha']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $data['programa_formacion']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $data['inicio_ficha']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $data['fin_ficha']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $data['nivel_formacion']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $data['estado_aprendiz']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $data['apoyo_socioeconomico']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $data['estado_apoyo']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $data['inicio_apoyo']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $data['fin_apoyo']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $data['numero_resolucion_apoyo']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $data['nombre_novedad_suspension']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $data['motivo_suspension']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $data['fecha_novedad_suspension']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $data['nombre_registro_suspension']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $data['resolucion_novedad_suspension']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $data['nombre_novedad_reactivacion']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $data['motivo_reactivacion']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $data['fecha_novedad_reactivacion']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $data['nombre_registro_reactivacion']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $data['resolucion_novedad_reactivacion']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $data['nombre_novedad_cancelacion']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $data['motivo_cancelacion']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $data['fecha_novedad_cancelacion']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $data['nombre_registro_cancelacion']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $data['resolucion_novedad_cancelacion']; ?>
                            </div>
                        </td>
                        <td>
                            <button class="btn btn-primary glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicionApoyos" onclick="agregarformApoyos('<?php echo  $datos ?>')"></button>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <br />
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalNuevoApoyos">Crear Registro</button>
    <br />
    <br />
    <br />
    <br />
</div>
<footer>
    <!-- <div class="col-sm-12 text-center"> -->
    <span>Desarrollado: Tecnoparque Nodo Cúcuta</span>
    <span> - CEDRUM</span>
    <!-- </div> -->
</footer>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>