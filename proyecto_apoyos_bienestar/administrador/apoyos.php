<?php
require_once '../modelo/val-admin.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Apoyos Socioecónomicos</title>
	<?php
	include 'librerias-css.php';
	?>
	<script src="../controlador/funciones-apoyos.js"></script>
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
	<div class="container-fluid">
		<div id="tablaApoyos"></div>
	</div>

	<!-- FIN DEL CONTENIDO -->
	<?php
	include './modales/modalApoyos.php';
	?>

	<?php
	include 'librerias-js.php';
	?>
	<script type="text/javascript">
		$(document).ready(function() {

			$('#tablaApoyos').load('./vista_admin/vista_apoyos.php');

			// $('#tablaRegional').DataTable();
			// initRegion();

			$('#agregarNuevoApoyos').click(function() {
				agregardatosApoyos();
			});

			$('#actualizaDatosApoyos').click(function() {
				modificarApoyos();
			});
			$('#eliminarDatosApoyos').click(function() {
				preguntarSiNoApoyos();
			});
		});
	</script>
</body>

</html>