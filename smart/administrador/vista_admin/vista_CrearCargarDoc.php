<?php
require_once '../../modelo/val-admin.php';
require_once '../../modelo/datos-docUsuarios.php';
$misDocUsuarios = new misDocUsuarios();
if (isset($_GET['codigo'])) {
    $codigo = $_GET['codigo'];
} else {
    echo "Error...";
}
$mi_DocUsuarios = $misDocUsuarios->viewDocUsuario($codigo);
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
        <!-- BEGIN PAGE BASE CONTENT -->
        <!-- BEGIN DASHBOARD STATS 1-->
        <br />
        <!-- INICIO DEL CONTENIDO -->
        <h3 class="text-center">Cargar los archivos para el usuario</h3>
        <div class="col-sm-12">
            <div class="col-sm-4"></div>
            <div class="col-sm-4 text-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">Nombre del documento</th>
                            <th class="text-center">Descripción del documento</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $mi_DocUsuarios[0]['nombre']; ?></td>
                            <td><?php echo $mi_DocUsuarios[0]['descripcion']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-4"></div>
        </div>
        <div class="col-sm-12">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <form action="../modelo/cargarDocUsuario.php" method="post" enctype="multipart/form-data">
                    <table id="example" class="table table-striped table-bordered">
                        <tr>
                            <td>
                                <div class="text-center">Cargar Archivo</div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <input type="hidden" name="codigo" id="codigo" value="<?php echo $codigo; ?>" required readonly>
                                    <input type="file" name="archivo" id="archivo">
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