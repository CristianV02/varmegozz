<?php
require_once '../../modelo/val-admin.php';
require_once '../../modelo/datos-hallazgos.php';
$mis_Hallazgos = new misHallazgos();
?>

<div class="col-sm-12">
    <!-- Inicio titulos de la pagina-->
    <div class="page-head">
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Hallazgos
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
            <a href="configuracion.php">Configuración</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span class="active">Lista de Hallazgos</span>
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
                    <div class="text-center">Codigo</div>
                </th>

                <th>
                    <div class="text-center">Donde se<br> Encuentra</div>
                </th>
                <th>
                    <div class="text-center">Descripciones</div>
                </th>
                <th>
                    <div class="text-center">Mejoras</div>
                </th>
                <th>
                    <div class="text-center">Fotos</div>
                </th>
                <th>
                    <div class="text-center">Identificaciones <br> Cliente</div>
                </th>
                <th>
                    <div class="text-center">Editar</div>
                </th>
            </thead>
            <tbody>
                <?php
                $res = $mis_Hallazgos->viewHallazgos();
                foreach ($res as $data) {
                    // Datos
                    $datos = $data['codigo'] . "||" .
                        $data['donde_se_encuentra'] . "||" .
                        $data['descripcion'] . "||" .
                        $data['mejora'] . "||" .
                        $data['fotos'] . "||"  .
                        $data['identificaciones_cliente'];


                ?>
                    <tr>
                        <td>
                            <div class="text-center">
                                <?php echo $data['codigo']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $data['donde_se_encuentra']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $data['descripcion']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $data['mejora']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $data['fotos']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $data['identificaciones_cliente']; ?>
                            </div>
                        </td>
                        <td>
                            <button class="btn btn-primary glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicionHallazgos" onclick="agregarformHallazgos('<?php echo  $datos ?>')"></button>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <br />
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalNuevoHallazgos">Crear Registro</button>
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