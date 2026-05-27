<?php
require_once '../modelo/val-admin.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cantidades</title>
	<?php
	include 'librerias-css1.php';
	?>
	<script src="../controlador/funciones-cantidad.js"></script>
</head>

<body id="body">
	<div>
		<div id="tablaCantidad"></div>
	</div>

	<!-- FIN DEL CONTENIDO -->
	<?php
	include './modales/modalCantidad.php';
	?>
	<?php
	include 'librerias-js1.php';
	?>
	<script type="text/javascript">
		$(document).ready(function() {

			$('#tablaCantidad').load('./vista_admin/vista_cantidad.php');

			$('#agregarNuevoCantidad').click(function() {
				agregardatosCantidad();
			});
			$('#actualizaDatosCantidad').click(function() {
				modificarCantidad();
			});
			$('#eliminarDatosCantidad').click(function() {
				preguntarSiNoCantidad();
			});
		});
	</script>
</body>

</html>