<?php
require_once '../../modelo/val-admin.php';
require '../../modelo/datos-datossolicitud.php';
$mis_DatosSolicitud = new misDatosSolicitudes;

?>
<div class="col-sm-12">
    <!-- Inicio titulos de la pagina-->
    <div class="page-head">
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Datos Solicitud</h1>
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
            <span class="active">Lista de Solicitud</span>
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
                    <div class="text-center">Observaciones</div>
                </th>
                <th>
                    <div class="text-center">Estado de <br /> Pago</div>
                </th>
                <th>
                    <div class="text-center">Codigo <br /> Estudiante</div>
                </th>
                <th>
                    <div class="text-center">Correo <br /> Institucional</div>
                </th>
                <th>
                    <div class="text-center">Año de <br /> Grado</div>
                </th>
                <th>
                    <div class="text-center">Cantidad</div>
                </th>
                <th>
                    <div class="text-center">Numero <br /> Recibo</div>
                </th>
                <th>
                    <div class="text-center"> Editar</div>
                </th>
            </thead>
            <tbody>
                <?php
                $res = $mis_DatosSolicitud->viewDatosSolicitudes();
                foreach ($res as $data) {
                    // Rol del usuario
                    // Datos
                    $datos = $data['observaciones'] . "||" .
                        $data['estado_de_pago'] . "||" .
                        $data['cod_estudiante'] . "||" .
                        $data['correo_institucional'] . "||" .
                        $data['año_de_grado'] . "||" .
                        $data['cantidad'] . "||" .
                        $data['numero_recibo'];
                ?>
                    <tr>
                        <td>
                            <div class="text-center">
                                <?php echo $data['observaciones']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $data['estado_de_pago']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $data['cod_estudiante']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $data['correo_institucional']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $data['año_de_grado']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $data['cantidad']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $data['numero_recibo']; ?>
                            </div>
                        </td>

                        <!-- <td>
                            <div class="text-center">
                                <button class="btn btn-primary glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicionSolicitud" onclick="agregarformSolicitud('<?php echo  $datos ?>')"></button>
                            </div>
                        </td> -->
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- <br>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalNuevoSolicitud">Crear Solicitud</button>
    <br> -->
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>