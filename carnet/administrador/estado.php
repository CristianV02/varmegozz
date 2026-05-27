<?php
require_once '../modelo/val-admin.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Estado</title>
	<?php
	include 'librerias-css.php';
	?>
	<script src="../controlador/funciones-estado.js"></script>
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
		<div id="tablaEstado"></div>
	</div>
	<!-- FIN DEL CONTENIDO -->
	<?php
	include './modales/modalestado.php';
	?>
	<?php
	include 'librerias-js.php';
	?>
	<script type="text/javascript">
		$(document).ready(function() {

			$('#tablaEstado').load('./vista_admin/vista_estado.php');

			$('#agregarNuevoEstado').click(function() {
				agregarDatosEstado();
			});

			$('#actualizaDatosEstado').click(function() {
				modificarEstado();
			});
			$('#eliminarDatosEstado').click(function() {
				preguntarSiNoEstado();
			});
		});
	</script>
</body>
</html>