<?php
require_once '../../modelo/val-admin.php';
require '../../modelo/datos-solicitud.php';
require '../../modelo/datos-datossolicitud.php';
$mis_Solicitud = new misSolicitud;
$mis_DatosSolicitud = new misDatosSolicitudes;
$maxSolicitud = $mis_Solicitud->maxSolicitud();
// Se valida que sea el administrados(1) sistema (2) admisiones (3) jefe de sistema (4) jefe de admisiones (5)
if ($id_rol == 1 || $id_rol == 2 || $id_rol == 3 || $id_rol == 4 || $id_rol == 5) {
} else {
    echo '<script language = javascript>
    alert ("No es un usuario valido.") 
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
                <h1>Solicitud</h1>
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
                    <div class="text-center">Id <br /> Solicitud</div>
                </th>
                <th>
                    <div class="text-center">Fecha de <br /> solicitud</div>
                </th>
                <th>
                    <div class="text-center">Estado</div>
                </th>
                <th>
                    <div class="text-center">Nombre</div>
                </th>
                <th>
                    <div class="text-center">Tipo de <br /> Usuario</div>
                </th>
                <th>
                    <div class="text-center">Cargo</div>
                </th>
                <th>
                    <div class="text-center">Id <br /> Usuario</div>
                </th>
                <th>
                    <div class="text-center">Id <br /> Programa</div>
                </th>
                <th>
                    <div class="text-center">Tipo</a></div>
                </th>
                <th>
                    <div class="text-center">Realizado Por </div>
                </th>
                <th>
                    <div class="text-center">Fecha <br /> Realizado</div>
                </th>
                <th>
                    <div class="text-center">Recibido por <br /> Admisiones</div>
                </th>
                <th>
                    <div class="text-center">Fecha de <br /> Admisiones</div>
                </th>
                <th>
                    <div class="text-center">Entregado</div>
                </th>
                <th>
                    <div class="text-center"> Editar</div>
                </th>
            </thead>
            <tbody>
                <?php
                $res = $mis_Solicitud->viewSolicitudes();
                foreach ($res as $data) {
                    // Rol del usuario
                    // Datos
                    $datos = $data['id_solicitud'] . "||" .
                        $data['fecha_de_solicitud'] . "||" .
                        $data['estado'] . "||" .
                        $data['nombres'] . "||" .
                        $data['tipo_usuario'] . "||" .
                        $data['cargo'] . "||" .
                        $data['id_usuario'] . "||" .
                        $data['id_programa'] . "||" .
                        $data['tipo'] . "||" .
                        $data['realizado_por'] . "||" .
                        $data['fecha_realizado'] . "||" .
                        $data['recibido_por_admisiones'] . "||" .
                        $data['fecha_de_admisiones'] . "||" .
                        $data['entregado'];
                ?>
                    <tr>
                        <td>
                            <div class="text-center">
                                <?php echo $data['id_solicitud']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $data['fecha_de_solicitud']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $data['estado']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                            <?php echo $data['nombres']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $data['tipo_usuario']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $data['cargo']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $data['id_usuario']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $data['id_programa']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $data['tipo']; ?>
                                </a>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $data['realizado_por']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $data['fecha_realizado']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $data['recibido_por_admisiones']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $data['fecha_de_admisiones']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $data['entregado']; ?>
                            </div>
                        </td>

                        <td>
                            <div class="text-center">
                                <button class="btn btn-primary glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicionSolicitud" onclick="agregarformSolicitud('<?php echo  $datos ?>')"></button>
                            </div>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <br>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalNuevoSolicitud">Crear Solicitud</button>
    <br>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>