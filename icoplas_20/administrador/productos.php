<?php
require_once '../modelo/val-admin.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>producto</title>
	<?php
	include 'librerias-css1.php';
	?>
	<script src="../controlador/funciones-producto.js"></script>
</head>

<body id="body">
	<div>
		<div id="tablaProducto"></div>
	</div>

	<!-- FIN DEL CONTENIDO -->
	<?php
	include './modales/modalProducto.php';
	?>

	<?php
	include './librerias-js1.php';
	?>
	<script type="text/javascript">
		$(document).ready(function() {

			$('#tablaProducto').load('./vista_admin/vista_productos.php');

			$('#agregarNuevoProducto').click(function() {
				agregardatosProducto();
			});

			$('#actualizaDatosProducto').click(function() {
				modificarProducto();
			});
			$('#eliminarDatosProducto').click(function() {
				preguntarSiNoProducto();
			});
		});
	</script>
</body>

</html>