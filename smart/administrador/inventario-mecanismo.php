<?php
require_once '../modelo/val-admin.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario Mecanismo</title>
    <?php
    include 'librerias-css1.php';
    ?>
    <script src="../controlador/funciones-inventario-mecanismo.js"></script>
</head>

<body id="body">
    <div>
        <div id="tablaInventarioMecanismo"></div>
    </div>

    <!-- FIN DEL CONTENIDO -->
    <?php
    include './modales/modalInventarioMecanismo.php';
    ?>

    <?php
    include 'librerias-js1.php';
    ?>
    <script type="text/javascript">
        $(document).ready(function() {

            $('#tablaInventarioMecanismo').load('./vista_admin/vista_Inventario_Mecanismo.php');

            $('#agregarNuevoInventarioMecanismo').click(function() {
                agregardatosInventarioMecanismo();
            });

            $('#actualizaDatosInventarioMecanismo').click(function() {
                modificarInventarioMecanismo();
            });
            $('#eliminarDatosInventarioMecanismo').click(function() {
                preguntarSiNoInventarioMecanismo();
            });
        });
    </script>
</body>

</html>