<?php
require_once '../../modelo/val-admin.php';
require_once '../../modelo/datos-reporte-hallazgo.php';
$mis_ReporteHallazgo = new misReporteHallazgo;
if (isset($_GET['informacion'])) {
    $informacion = $_GET['informacion'];
    $trozos = explode("-", $informacion);
    $codigo = $trozos[0];
    $reporte = $trozos[1];

    $modificarfoto = "";

    if (count($trozos) > 2) {
        $modificarfoto = "m";
    }
} else {
    echo "Error...";
}
$mi_hallazgo = $mis_ReporteHallazgo->viewCodHallazgo($codigo);
?>
<div class="col-sm-12">
    <!-- Inicio titulos de la pagina-->
    <div class="page-head">
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <!-- <div class="page-title">
                <h2>Cargar archivos de evidencias
                </h2>
            </div> -->
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
        <h3 class="text-center">Cargar los archivos de evidencias</h3>
        <div class="col-sm-12">
            <div class="col-sm-4"></div>
            <div class="col-sm-4 text-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">Tipo de mejora</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $mi_hallazgo[0]['hallazgo']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-4"></div>
        </div>
        <div class="col-sm-12">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <form action="../modelo/cargarArchivos.php" method="post" enctype="multipart/form-data">
                    <table id="example" class="table table-striped table-bordered">
                        <tr>
                            <td>
                                <div class="text-center">Evidencia 1</div>
                                <div class="text-center">
                                    <input type="text" name="modificar_fotos" id="modificar_fotos" value='<?php echo $modificarfoto ?>' hidden>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <input type="hidden" name="codigo" id="codigo" value="<?php echo $codigo; ?>" required readonly>
                                    <input type="hidden" name="reporte" id="reporte" value="<?php echo $reporte; ?>" required readonly>
                                    <input type="file" name="foto1" id="foto1">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="text-center">Evidencia 2</div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <input type="file" name="foto2" id="foto2">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="text-center">Evidencia 3</div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <input type="file" name="foto3" id="foto3">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="text-center">Evidencia 4</div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <input type="file" name="foto4" id="foto4">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="text-center"></div>
                            </td>
                            <td>
                                <div class="text-center"><input type="submit" value="Subir archivos" name="submit"></div>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="col-sm-4"></div>
        </div>
        <br />
        <br />
    </div>
</div>