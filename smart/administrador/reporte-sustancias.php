<?php
require_once '../modelo/val-admin.php';
//Recibe variable de la vista reporte, el código del reporte
if(isset($_GET['codigo'])){
    $codigo = $_GET['codigo'];
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte Sustancias</title>
    <?php
    include 'librerias-css1.php';
    ?>
    <script src="../controlador/funciones-ReporteSustancias.js"></script>
</head>

<body id="body">
    <div>
        <div id="tablaReporteSustancias"></div>
    </div>

    <!-- FIN DEL CONTENIDO -->
    <?php
    include './modales/modalReporteSustancias.php'
    ?>

    <?php
    include 'librerias-js1.php';
    ?>
    <script type="text/javascript">
        $(document).ready(function() {

            rol = "<?php echo $rol ?>"
            if (rol == "administrador") {
                $('#tablaReporteSustancias').load('./vista_admin/vista_ReporteSustancias.php?codigo=<?php echo $codigo;?>');
            } else {
                $('#tablaReporteSustancias').load('./vista_usu/vista_ReporteSustancias.php?codigo=<?php echo $codigo;?>');
            }

            $('#agregarNuevoReporteSustancias').click(function() {
                agregardatosReporteSustancias();
            });

            $('#actualizaDatosReporteSustancias').click(function() {
                modificarReporteSustancias();
            });
            $('#eliminarDatosReporteSustancias').click(function() {
                preguntarSiNoReporteSustancias();
            });
        });
    </script>
</body>

</html>