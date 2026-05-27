<?php
require_once '../modelo/val-admin.php';
require '../modelo/datos-Reportes.php';
if (isset($_GET['datos'])) {
    $dato = $_GET['datos'];
} else {
    $dato = 0;
}

if (isset($_GET['reporte'])) {
    $reporte = $_GET['reporte'];
} else {
    $reporte = "";
}

$mis_Reportes = new misReportes;
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Reportes</title>
    <?php
    include 'librerias-css.php';
    ?>
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
    <div>
        <div id="tablaCrearReportes"></div>
    </div>

    <!-- FIN DEL CONTENIDO -->
    <?php
    include './modales/modalCrearReporte.php';
    ?>
    <?php
    include './modales/modalCantidadMecanismoCliente.php';
    ?>
    <script src="../controlador/funciones-CrearReporte.js"></script>
    <script src="../controlador/funciones-CantidadMecanismoCliente.js"></script>
    <?php
    include 'librerias-js.php';
    ?>
    <script type="text/javascript">
        $(document).ready(function() {

            // Enviando params desde Javascript
            params = window.location.search;
            reporte_param = new URLSearchParams(params);
            reporte = reporte_param.get('reporte');

            dato = <?php echo $dato ?>;
            $('#tablaCrearReportes').load(`./vista_admin/vista_CrearReporte.php?reporte=${reporte}`);

            $('#agregarNuevoReportes').click(function() {
                agregardatosCrearReportes();
            });
            $('#agregarNuevaSustancias').click(function() {
                agregardatosSustancias();
            });
            $('#agregarNuevoUsuario').click(function() {
                agregardatosUsuario();
            });
            $('#agregarNuevoCantidadMecanismoCliente').click(function() {
                agregardatosCantidadMecanismoCliente();
            });
            $('#agregarNuevoHallazgo').click(function() {
                agregardatosHallazgo();
            });
            $('#agregarNuevoTratamiento').click(function() {
                agregardatosTratamiento();
            });

            // Carga las empresas de cada usuario
            $("#nombre_usuario").off("change").on("change", function() {
                var nombre_usuario = $("#nombre_usuario").val();
                info_usuario = $("#nombre_usuario").val().split(" - ");
                identificacion = info_usuario[0];
                cargarEmpresas(identificacion);
            });

            //Cargar los métodos de control dependiendo del tratamiento
            $("#tratamiento").off("change").on("change", function() {
				var tratamiento = $("#tratamiento").val();
				cargarMetodosControl(tratamiento);
                cargarTipoPlagas(tratamiento);
			});
            //  //Cargar los tipo de plagas dependiendo del tratamiento
            //  $("#tratamientou").off("change").on("change", function() {
            //     var tratamiento = $("#tratamientou").val();
                
            // });
            //Cargar los cantidad dependiendo del sustancias
            $("#sustancias").off("change").on("change", function() {
                var sustancias = $("#sustancias").val();
                cargarCantidad(sustancias);
            });
        });
    </script>
</body>

</html>