<?php
require_once '../modelo/val-admin.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tratamiento</title>
    <?php
    include 'librerias-css1.php';
    ?>
    <script src="../controlador/funciones-Tratamiento.js"></script>
</head>

<body id="body">
    <div>
        <div id="tablatratamiento"></div>
    </div>

    <!-- FIN DEL CONTENIDO -->
    <?php
    include './modales/modalTratamiento.php';
    ?>

    <?php
    include 'librerias-js1.php';
    ?>
    <script type="text/javascript">
        $(document).ready(function() {

            $('#tablatratamiento').load('./vista_admin/vista_tratamiento.php');

            $('#agregarNuevoTratamiento').click(function() {
                agregardatosTratamiento();
            });

            $('#actualizaDatosTratamiento').click(function() {
                modificarTratamiento();
            });
            $('#eliminarDatosTratamiento').click(function() {
                preguntarSiNoTratamiento();
            });
        });
    </script>
</body>

</html>