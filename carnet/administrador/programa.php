<?php
require_once '../modelo/val-admin.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Programa</title>
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
		<div id="tablaPrograma"></div>
	</div>
	<!-- FIN DEL CONTENIDO -->
	<?php
	include './modales/modalprograma.php';
	?>
	<?php
	include 'librerias-js.php';
	?>
	<script src="../controlador/funciones-programa.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {

			$('#tablaPrograma').load('./vista_admin/vista_programa.php');

			$('#agregarNuevoPrograma').click(function() {
				agregarDatosPrograma();
			});

			$('#actualizaDatosPrograma').click(function() {
				modificarPrograma();
			});
			$('#eliminarDatosPrograma').click(function() {
				preguntarSiNoPrograma();
			});
		});
	</script>
</body>
</html>