<?php
require_once '../modelo/val-admin.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cantidad Mecanismo</title>
    <?php
    include 'librerias-css1.php';
    ?>
    <script src="../controlador/funciones-CantidadMecanismoCliente.js"></script>
</head>

<body id="body">
    <div class="container-fluid">
        <div id="tablaCantidadMecanismoCliente"></div>
    </div>

    <!-- FIN DEL CONTENIDO -->
    <?php
    include './modales/modalCantidadMecanismoCliente.php';
    ?>

    <?php
    include 'librerias-js1.php';
    ?>
    <script type="text/javascript">
        $(document).ready(function() {

            $('#tablaCantidadMecanismoCliente').load('./vista_admin/vista_CantidadMecanismoCliente.php');

            $('#agregarNuevoCantidadMecanismoCliente').click(function() {
                agregardatosCantidadMecanismoCliente();
            });

            $('#actualizaDatosCantidadMecanismoCliente').click(function() {
                modificarCantidadMecanismoCliente();
            });
            $('#eliminarDatosCantidadMecanismoCliente').click(function() {
                preguntarSiNoCantidadMecanismoCliente();
            });
        });
    </script>
</body>

</html>