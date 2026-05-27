<?php
require_once '../modelo/val-admin.php';
// require '../modelo/datos-Reportes.php';

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Solicitud</title>
    <?php
    include 'librerias-css.php';
    ?>
    <script src="../controlador/funciones-crear-solicitud.js"></script>

</head>

<body id="body">
    <?php
    $claseContainer = "container-fluid";
    include 'header.php';
    ?>
    <div class="col-sm-12">
        <?php
        include 'menu.php';
        ?>
    </div>
    <div class="container-fluid">
        <div id="tablaCrearSolicitud"></div>
    </div>

    <!-- FIN DEL CONTENIDO -->
    <?php
    include './modales/modalcrearsolicitud.php';
    ?>
    <?php
    include 'librerias-js.php';
    ?>
    <script type="text/javascript">
        $(document).ready(function() {

            $('#tablaCrearSolicitud').load(`./vista_admin/vista_crear-solicitud.php`);


            $('#agregarNuevoCrearSolicitud').click(function() {
                agregardatosCrearSolicitud();
            });


        });
    </script>
</body>

</html>