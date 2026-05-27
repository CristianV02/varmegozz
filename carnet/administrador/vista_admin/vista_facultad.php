<?php
require_once '../../modelo/val-admin.php';
require '../../modelo/datos-facultad.php';
$mis_facultad = new misFacultad();

?>

<div class="col-sm-12">
    <!-- Inicio titulos de la pagina-->
    <div class="page-head">
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Facultad
                </h1>
            </div>
            <!-- END PAGE TITLE -->
        </div>
        <!-- END PAGE HEAD-->
        <!-- BEGIN PAGE BREADCRUMB -->
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <a href="index.php">Inicio</a>
                <i class="fa fa-circle"></i>
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
                        <div class="text-center">Codigo <br /> Facultad</div>
                    </th>
                    <th>
                        <div class="text-center">Nombre de <br /> Facultad</div>
                    </th>
                    <th>
                        <div class="text-center">Editar</div>
                    </th>
                </thead>
                <tbody>
                    <?php
                    $res = $mis_facultad->viewFacultades();
                    foreach ($res as $data) {
                        $datos = $data['cod_facultad'] . "||" .
                            $data['nombre_de_facultad'];
                    ?>
                        <tr>
                            <td>
                                <div class="text-center"><?php echo $data['cod_facultad']; ?></div>
                            </td>
                            <td>
                                <div class="text-center"><?php echo $data['nombre_de_facultad']; ?></div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <button class="btn btn-primary glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicionFacultad" onclick="agregarFormFacultad('<?php echo $datos ?>')">
                                    </button>
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
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalNuevoFacultad">Crear Facultad</button>
        <br />
        <br />
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>