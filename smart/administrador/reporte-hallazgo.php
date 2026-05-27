<?php
require_once '../modelo/val-admin.php';
if (isset($_GET['codigo'])) {
    $codigo = $_GET['codigo'];
} else {
    $codigo = "";
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte Hallazgo</title>
    <?php
    include 'librerias-css1.php';
    ?>
    <script src="../controlador/funciones-ReporteHallazgo.js"></script>
</head>

<body id="body">
    <div>
        <div id="tablaReporteHallazgo"></div>
    </div>

    <!-- FIN DEL CONTENIDO -->
    <?php
    include './modales/modalReporteHallazgo.php'
    ?>

    <?php
    include 'librerias-js1.php';
    ?>
    <script type="text/javascript">
        $(document).ready(function() {

            rol = "<?php echo $rol ?>"
            if (rol == "administrador") {
                $('#tablaReporteHallazgo').load('./vista_admin/vista_ReporteHallazgo.php?codigo=<?php echo $codigo; ?>');
            }
            $('#agregarNuevoReporteHallazgo').click(function() {
                agregardatosReporteHallazgo();
            });

            $('#actualizaDatosReporteHallazgo').click(function() {
                modificarReporteHallazgo();
            });
            $('#eliminarDatosReporteHallazgo').click(function() {
                preguntarSiNoReporteHallazgo();
            });
        });
    </script>
</body>

</html>