<?php
require_once '../modelo/val-admin.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sustancias</title>
	<?php
	include 'librerias-css1.php';
	?>
	<script src="../controlador/funciones-sustancias.js"></script>
</head>

<body id="body">
	<div id="tablaSustancias"></div>

	<!-- FIN DEL CONTENIDO -->
	<?php
	include './modales/modalSustancias.php';
	?>

	<?php
	include 'librerias-js1.php';
	?>
	<script type="text/javascript">
		$(document).ready(function() {

			$('#tablaSustancias').load('./vista_admin/vista_Sustancias.php');

			// $('#tablaRegional').DataTable();
			// initRegion();

			$('#agregarNuevoSustancias').click(function() {
				agregardatosSustancias();
			});

			$('#actualizaDatosSustancias').click(function() {
				modificarSustancias();
			});
			$('#eliminarDatosSustancias').click(function() {
				preguntarSiNoSustancias();
			});
		});
	</script>
</body>

</html>