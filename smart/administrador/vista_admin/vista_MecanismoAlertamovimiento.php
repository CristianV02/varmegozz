<?php
require_once '../../modelo/val-admin.php';
require_once '../../modelo/datos-mecanismo-alertamovimiento.php';
$mis_MecanismoAlertamovimiento = new misMecanismoAlertamovimiento();
// Validamos el rol de usuario para evitar intrusos
// if ($rol == 1 || $rol == 3 ){
// } else{
//     echo '<script language = javascript>
//     alert ("Debe seleccionar una empresa.") 
//     self.location="../index.php"
//     </script>';
// }
?>

<div class="col-sm-12">
    <!-- Inicio titulos de la pagina-->
    <div class="page-head">
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Mecanismo Alerta Movimiento (sensor-movimiento)
                    <small>Jaziz Biologico</small>
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
            <span class="active">Lista de Reporte Mecanismo (sensores de movimiento)</span>
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
                    <div class="text-center">Código</div>
                </th>

                <th>
                    <div class="text-center">Id</div>
                </th>
                <th>
                    <div class="text-center">Fecha</div>
                </th>
                <th>
                    <div class="text-center">Hora</div>
                </th>
                <th>
                    <div class="text-center">Identificación Cliente</div>
                </th>
                <th>
                    <div class="text-center">Editar</div>
                </th>
            </thead>
            <tbody>
                <?php
                $res = $mis_MecanismoAlertamovimiento->viewMecanismoAlertamovimientos();
                foreach ($res as $data) {
                    // Datos
                    $datos = $data['codigo'] . "||" .
                        $data['id'] . "||" .
                        $data['fecha'] . "||" .
                        $data['hora'] . "||" .
                        $data['identificacion_cliente'];

                ?>
                    <tr>
                        <td>
                            <div class="text-center">
                                <?php echo $data['codigo']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $data['id']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $data['fecha']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $data['hora']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $data['identificacion_cliente']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <button class="btn btn-primary glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicionReporteMecanismo" onclick="agregarformReporteMecanismo('<?php echo  $datos ?>')"></button>
                            </div>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <br />
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalNuevoReporteMecanismo">Crear Registro</button>
    <br />
    <br />
    <br />
    <br />
</div>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>