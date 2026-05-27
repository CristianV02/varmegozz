<?php
require_once '../modelo/val-admin.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cargar Archivos</title>
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
		<div id="tablaCargar_archivo"></div>
	</div>
	<!--Footer-->
	<footer>
		<span>Desarrollado: Tecnoparque Nodo Cúcuta</span>
		<span> - CEDRUM</span>
	</footer>

	<!-- FIN DEL CONTENIDO -->

	<?php
	include 'librerias-js.php';
	?>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#tablaCargar_archivo').load('./vista_admin/vista_cargar_archivo.php');
		});
	</script>
</body>

</html>