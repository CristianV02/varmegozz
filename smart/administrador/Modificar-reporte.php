<?php
require_once '../modelo/val-admin.php';
require_once '../modelo/datos-cantidad_mecanismo_cliente.php';
$mis_CantidadMecanismoCliente = new misCantidadMecanismoCliente();
if (isset($_GET['reporte'])) {
    $reporte = $_GET['reporte'];
} else {
    $reporte = "";
}
$miReporte = $mis_CantidadMecanismoCliente->viewMecanismoClienteReporte($reporte);
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Reportes</title>
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
        <div id="tablaModificarReportes"></div>
    </div>

    <!-- FIN DEL CONTENIDO -->
    <?php
    include './modales/modalModificarReporte.php';
    include './modales/modalCantidadMecanismoCliente.php';
    ?>
    <script src="../controlador/funciones-ModificarReporte.js"></script>
    <script src="../controlador/funciones-CantidadMecanismoCliente.js"></script>
    <?php
    include 'librerias-js.php';
    ?>
    <script type="text/javascript">
        $(document).ready(function() {
            params = window.location.search;
            reporte_param = new URLSearchParams(params);
            reporte = reporte_param.get('reporte');

            $('#tablaModificarReportes').load(`./vista_admin/vista_ModificarReporte.php?reporte=${reporte}`);

            // $('#actualizaDatosModificado').click(function() {
            //     agregardatosCrearReportes();
            // });
            $('#actualizaDatosSustancias').click(function() {
                modificarReporteSustancias();
            });
            $('#eliminarDatosSustancias').click(function() {
                preguntarSiNoReporteSustancias();
            });
            $('#actualizaDatosUsuario').click(function() {
                modificarReportes();
            });
            $('#eliminarDatosReportes').click(function() {
                preguntarSiNoReportes();
            });
            $('#actualizaDatosCantidadMecanismoCliente').click(function() {
                modificarCantidadMecanismoCliente();
            });
            $('#eliminarDatosCantidadMecanismoCliente').click(function() {
                preguntarSiNoCantidadMecanismoCliente();
            });
            $('#actualizaDatosHallazgo').click(function() {
                modificarReporteHallazgo();
            });
            $('#eliminarDatosHallazgo').click(function() {
                preguntarSiNoReporteHallazgo();
            });
            $('#eliminarDatosTratamiento').click(function() {
                preguntarSiNoReporteTratamiento();
            });
            $('#actualizaDatosTratamiento').click(function() {
                modificarReporteTratamiento();
            });

            $("#sustanciasu").off("change").on("change", function() {
                var cod_sustancias = $("#sustanciasu").val();
                cargarLaboratoriou(cod_sustancias);
            });
            //Cargar los métodos de control dependiendo del tratamiento
            $("#tratamientou").off("change").on("change", function() {
                var tratamiento = $("#tratamientou").val();
                cargarMetodosControlu(tratamiento);
                cargarTipoPlagasu(tratamiento);
            });
            //Cargar los tipo de plagas dependiendo del tratamiento
            // $("#tratamientou").off("change").on("change", function() {
            //     var tratamiento = $("#tratamientou").val();
            // });
            //Cargar los cantidad dependiendo del sustancias
            $("#sustanciasu").off("change").on("change", function() {
                var sustancias = $("#sustanciasu").val();
                cargarCantidadu(sustancias);
            });
        });
    </script>
</body>

</html>