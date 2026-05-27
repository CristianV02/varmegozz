<?php
require_once '../modelo/val-admin.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte Tratamiento</title>
    <?php
    include 'librerias-css1.php';
    ?>
    <script src="../controlador/funciones-ReporteTratamiento.js"></script>
</head>

<body id="body">
    <div>
        <div id="tablaReporteTratamiento"></div>
    </div>

    <!-- FIN DEL CONTENIDO -->
    <?php
    include './modales/modalReporteTratamiento.php';
    ?>

    <?php
    include 'librerias-js1.php';
    ?>
    <script type="text/javascript">
        $(document).ready(function() {

            $('#tablaReporteTratamiento').load('./vista_admin/vista_ReporteTratamiento.php');

            $('#agregarNuevoReporteTratamiento').click(function() {
                agregardatosReporteTratamiento();
            });

            $('#actualizaDatosReporteTratamiento').click(function() {
                modificarReporteTratamiento();
            });
            $('#eliminarDatosReporteTratamiento').click(function() {
                preguntarSiNoReporteTratamiento();
            });
        });
    </script>
</body>

</html>