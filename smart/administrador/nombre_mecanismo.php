<?php
require_once '../modelo/val-admin.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nombre Mecanismo</title>
    <?php
    include 'librerias-css1.php';
    ?>
    <script src="../controlador/funciones-nombre-mecanismo.js"></script>
</head>

<body id="body">
    <div>
        <div id="tablaNombreMecanismo"></div>
    </div>

    <!-- FIN DEL CONTENIDO -->
    <?php
    include './modales/modalNombreMecanismo.php';
    ?>

    <?php
    include 'librerias-js1.php';
    ?>
    <script type="text/javascript">
        $(document).ready(function() {

            $('#tablaNombreMecanismo').load('./vista_admin/vista_nombre_mecanismo.php');

            $('#agregarNuevoNombreMecanismo').click(function() {
                agregardatosNombreMecanismo();
            });

            $('#actualizaDatosNombreMecanismo').click(function() {
                modificarNombreMecanismo();
            });
            $('#eliminarDatosNombreMecanismo').click(function() {
                preguntarSiNoNombreMecanismo();
            });
        });
    </script>
</body>

</html>