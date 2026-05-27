<?php
require_once '../modelo/val-admin.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Metodo Tratamiento</title>
    <?php
    include 'librerias-css1.php';
    ?>
    <script src="../controlador/funciones-Metodo-Tratamiento.js"></script>
</head>

<body id="body">
    <div>
        <div id="tablametodotratamiento"></div>
    </div>

    <!-- FIN DEL CONTENIDO -->
    <?php
    include './modales/modalMetodoTratamiento.php';
    ?>

    <?php
    include 'librerias-js1.php';
    ?>
    <script type="text/javascript">
        $(document).ready(function() {

            $('#tablametodotratamiento').load('./vista_admin/vista_MetodoTratamiento.php');

            $('#agregarNuevoMetodoTratamiento').click(function() {
                agregardatosMetodoTratamiento();
            });

            $('#actualizaDatosMetodoTratamiento').click(function() {
                modificarMetodoTratamiento();
            });
            $('#eliminarDatosMetodoTratamiento').click(function() {
                preguntarSiNoMetodoTratamiento();
            });
        });
    </script>
</body>

</html>