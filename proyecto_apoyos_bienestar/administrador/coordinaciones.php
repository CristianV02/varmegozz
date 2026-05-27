<?php
require_once '../modelo/val-admin.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Coordinaciones</title>
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
	<div class="container-fluid">
		<div id="tablaCoordinaciones"></div>
	</div>

	<!-- FIN DEL CONTENIDO -->
	<?php
	include './modales/modalCoordinaciones.php';
	?>
	<script src="../controlador/funciones-coordinaciones.js"></script>
	<?php
	include 'librerias-js.php';
	?>
	<script type="text/javascript">
		$(document).ready(function() {
			rol_id = <?php echo $rol_id; ?>;
			if (rol_id == 1) {
				$('#tablaCoordinaciones').load('./vista_admin/vista_coordinaciones.php');
			} else if (rol_id == 2) {
				// $('#tablaCoordinaciones').load('./vista_admin/vista_coordinaciones.php?');
			} else if (rol_id == 3) {
				$('#tablaCoordinaciones').load('./vista_instructor/vista_coordinaciones.php');
			} else if (rol_id == 4) {
				$('#tablaCoordinaciones').load('./vista_gestor_apoyos/vista_coordinaciones.php');
			} else {
				alert("Error...");
			}

			$('#agregarNuevoCoordinaciones').click(function() {
				agregardatosCoordinaciones();
			});
			$('#actualizaDatosCoordinaciones').click(function() {
				modificarCoordinaciones();
			});
			$('#eliminarDatosCoordinaciones').click(function() {
				preguntarSiNoCoordinaciones();
			});
		});
	</script>
</body>

</html>