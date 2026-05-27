<?php
require_once '../modelo/val-admin.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facultad</title>
    <?php
    include 'librerias-css.php';
    ?>
    <script src="../controlador/funciones-facultad.js"></script>
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
        <div id="tablaFacultad"></div>
    </div>

    <!-- FIN DEL CONTENIDO -->
    <?php
    include './modales/modalfacultad.php';
    ?>
    <?php
    include 'librerias-js.php';
    ?>
    <script type="text/javascript">
        $(document).ready(function() {

            $('#tablaFacultad').load('./vista_admin/vista_facultad.php');

            $('#agregarNuevoFacultad').click(function() {
                agregardatosFacultad();
            });

            $('#actualizaDatosFacultad').click(function() {
                modificarFacultad();
            });
            $('#eliminarDatosFacultad').click(function() {
                preguntarSiNoFacultad();
            });
        });
    </script>
</body>

</html>