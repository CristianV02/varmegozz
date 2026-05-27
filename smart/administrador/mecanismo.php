<?php
require_once '../modelo/val-admin.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mecanismo</title>
    <?php
    include 'librerias-css1.php';
    ?>
    <script src="../controlador/funciones-mecanismo.js"></script>
</head>

<body id="body">
    <div>
        <div id="tablaMecanismo"></div>
    </div>

    <!-- FIN DEL CONTENIDO -->
    <?php
    include './modales/modalMecanismo.php';
    ?>

    <?php
    include 'librerias-js1.php';
    ?>
    <script type="text/javascript">
        $(document).ready(function() {

            $('#tablaMecanismo').load('./vista_admin/vista_mecanismo.php');

            $('#agregarNuevoMecanismo').click(function() {
                agregardatosMecanismo();
            });

            $('#actualizaDatosMecanismo').click(function() {
                modificarMecanismo();
            });
            $('#eliminarDatosMecanismo').click(function() {
                preguntarSiNoMecanismo();
            });
        });
    </script>
</body>

</html>