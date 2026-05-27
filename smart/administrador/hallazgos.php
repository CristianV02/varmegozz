<?php
require_once '../modelo/val-admin.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hallazgos</title>
    <?php
    include 'librerias-css.php';
    ?>
    <script src="../controlador/funciones-Hallazgo.js"></script>
</head>

<body id="body">
    <div>
        <div id="tablaHallazgos"></div>
    </div>

    <!-- FIN DEL CONTENIDO -->
    <?php
    include './modales/modalHallazgo.php';
    ?>

    <?php
    include 'librerias-js.php';
    ?>
    <script type="text/javascript">
        $(document).ready(function() {

            $('#tablaHallazgos').load('./vista_admin/vista_Hallazgos.php');

            $('#agregarNuevoHallazgos').click(function() {
                agregardatosHallazgos();
            });

            $('#actualizaDatosHallazgos').click(function() {
                modificarHallazgos();
            });
            $('#eliminarDatosHallazgos').click(function() {
                preguntarSiNoHallazgos();
            });
        });
    </script>
</body>

</html>