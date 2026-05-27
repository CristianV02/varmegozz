<?php
require_once '../modelo/val-admin.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tipo de Plagas</title>
    <?php
    include 'librerias-css1.php';
    ?>
    <script src="../controlador/funciones-tipo-plagas.js"></script>
</head>

<body id="body">
    <div>
        <div id="tablatipoplaga"></div>
    </div>

    <!-- FIN DEL CONTENIDO -->
    <?php
    include './modales/modalTipoplagas.php';
    ?>

    <?php
    include 'librerias-js1.php';
    ?>
    <script type="text/javascript">
        $(document).ready(function() {

            $('#tablatipoplaga').load('./vista_admin/vista_tipo_plagas.php');

            $('#agregarNuevoTipoplaga').click(function() {
                agregardatosTipoplaga();
            });

            $('#actualizaDatosTipoplaga').click(function() {
                modificarTipoplaga();
            });
            $('#eliminarDatosTipoplaga').click(function() {
                preguntarSiNoTipoplaga();
            });
        });
    </script>
</body>

</html>