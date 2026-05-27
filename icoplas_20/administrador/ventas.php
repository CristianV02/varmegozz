<?php
require_once '../modelo/val-admin.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ventas</title>
	<?php
	include 'librerias-css1.php';
	?>
	<script src="../controlador/funciones-ventas.js"></script>
</head>

<body id="body">
	<div>
		<div id="tablaVentas"></div>
	</div>

	<!-- FIN DEL CONTENIDO -->
	<?php
	include './modales/modalVentas.php';
	?>

	<?php
	include './librerias-js1.php';
	?>
	<script type="text/javascript">
		$(document).ready(function() {

			$('#tablaVentas').load('./vista_admin/vista_ventas.php');

			$('#agregarNuevaVentas').click(function() {
				agregardatosVentas();
			});

			$('#actualizaDatosVentas').click(function() {
				modificarVentas();
			});
			$('#eliminarDatosVentas').click(function() {
				preguntarSiNoVentas();
			});
		});
	</script>
</body>

</html>