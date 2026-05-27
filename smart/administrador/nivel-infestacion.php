<?php
require_once '../modelo/val-admin.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nivel Infestaciones</title>
    <?php
    include 'librerias-css1.php';
    ?>
    <script src="../controlador/funciones-NivelInfestaciones.js"></script>
</head>

<body id="body">
    <div>
        <div id="tablaNivelInfestaciones"></div>
    </div>

    <!-- FIN DEL CONTENIDO -->
    <?php
    include './modales/modalNivelInfestaciones.php'
    ?>

    <?php
    include 'librerias-js1.php';
    ?>
    <script type="text/javascript">
        $(document).ready(function() {

            $('#tablaNivelInfestaciones').load('./vista_admin/vista_NivelInfestaciones.php');

            $('#agregarNuevoNivelInfestaciones').click(function() {
                agregardatosNivelInfestaciones();
            });

            $('#actualizaDatosNivelInfestaciones').click(function() {
                modificarNivelInfestaciones();
            });
            $('#eliminarDatosNivelInfestaciones').click(function() {
                preguntarSiNoNivelInfestaciones();
            });
        });
    </script>
</body>

</html>