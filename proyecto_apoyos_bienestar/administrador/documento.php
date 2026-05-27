<?php
if(isset($_GET['cod_centro_formacion'])){
	$centro_formacion_cod = $_GET['cod_centro_formacion'];
}
else{
	$centro_formacion_cod  = "";
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sedes</title>
	<?php
	include 'librerias-css.php';
	?>
</head>

<body id="body">
<div class="col-sm-12">
		<?php
		include 'menu.php';
		?>
	</div>
	<div class="container-fluid">
		<div id="tablaDocumento"></div>
	</div>

    <!-- FIN DEL CONTENIDO -->
    <?php
    include './modales/modalDocumento.php';
    ?>
    <script src="../controlador/funciones-documento.js"></script>
    <?php
	include 'librerias-js.php';
	?>
    <script type="text/javascript">
        $(document).ready(function() {
			
			$('#tablaDocumento').load('./vista_admin/vista_documento.php');

			// $('#tablaRegional').DataTable();
			// initRegion();

			$('#guardarNuevoDocumento').click(function() {
				agregarDatosDocumento();
			});
            
			$('#actualizaDatosDocumento').click(function() {
				modificarDocumento();
			});
			$('#eliminarDatosDocumento').click(function() {
				preguntarSiNoDocumento();
			});
        });
    </script>
</body>

</html>