<?php
require_once '../modelo/val-admin.php';

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes</title>
    <?php
    include 'librerias-css1.php';
    ?>
    <script src="../controlador/funciones-Reportes.js"></script>
</head>

<body id="body">
    <div>
        <div id="tablaReportes"></div>
    </div>

    <!-- FIN DEL CONTENIDO -->
    <?php
    include './modales/modalReportes.php';
    ?>
    <!-- Gráficas -->
    <?php
    include 'librerias-js1.php';
    ?>
    <script type="text/javascript">
        $(document).ready(function() {
            
            rol = "<?php echo $rol ?>"
            if (rol == "administrador"){
                $('#tablaReportes').load('./vista_admin/vista_Reportes.php');
            }
            else if (rol == "usuario"){ 
                $('#tablaReportes').load('./vista_usu/vista_Reportes.php');
            }
            else if (rol == "tecnico"){
                $('#tablaReportes').load('./vista_tecn/vista_Reportes.php');
            }

            $('#agregarNuevoReportes').click(function() {
                agregardatosReportes();
            });

            $('#actualizaDatosReportes').click(function() {
                modificarReportes();
            });
            $('#eliminarDatosReportes').click(function() {
                preguntarSiNoReportes();
            });
        });
    </script>
</body>

</html>