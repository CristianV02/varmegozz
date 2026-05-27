<?php
require_once '../modelo/val-admin.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mecanismo Alerta Movimiento (sensor-movimiento) </title>
    <?php
    include 'librerias-css.php';
    ?>
    <script src="../controlador/funciones-MecanismoAlertamovimiento.js"></script>
</head>

<body id="body">
    <div>
        <div id="tablaReporteMecanismo"></div>
    </div>

    <!-- FIN DEL CONTENIDO -->
    <?php
    include './modales/modalMecanismoAlertamovimiento.php'
    ?>

    <?php
    include 'librerias-js.php';
    ?>
    <script type="text/javascript">
        $(document).ready(function() {

            $('#tablaReporteMecanismo').load('./vista_admin/vista_MecanismoAlertamovimiento.php');

            $('#agregarNuevoReporteMecanismo').click(function() {
                agregardatosReporteMecanismo();
            });

            $('#actualizaDatosReporteMecanismo').click(function() {
                modificarReporteMecanismo();
            });
            $('#eliminarDatosReporteMecanismo').click(function() {
                preguntarSiNoReporteMecanismo();
            });
        });
    </script>
</body>

</html>