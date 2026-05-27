<?php
require_once '../modelo/val-admin.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte Mecanismo</title>
    <?php
    include 'librerias-css1.php';
    ?>
    <script src="../controlador/funciones-ReporteMecanismo.js"></script>
</head>

<body id="body">
    <div>
        <div id="tablaReporteMecanismo"></div>
    </div>

    <!-- FIN DEL CONTENIDO -->
    <?php
    include './modales/modalReporteMecanismo.php'
    ?>
    <!-- Gráficas -->
    <?php
    include 'librerias-js1.php';
    ?>
    <script type="text/javascript">
        $(document).ready(function() {

            rol = "<?php echo $rol ?>"
            if (rol == "administrador"){
                $('#tablaReporteMecanismo').load('./vista_admin/vista_ReporteMecanismo.php');
            }
            else{
                $('#tablaReporteMecanismo').load('./vista_usu/vista_ReporteMecanismo.php');
            }

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