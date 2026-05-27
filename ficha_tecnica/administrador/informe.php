<?php
require_once '../modelo/val-admin.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ficha Tecnica</title>
	<?php
	include 'librerias-css1.php';
	?>
	<script src="../controlador/funciones-tecnica.js"></script>
</head>

<body id="body">
	<div>
		<div id="tablaInforme"></div>
	</div>

	<!-- FIN DEL CONTENIDO -->
	<?php
	// include './modales/modalFichaTecnica.php';
	?>

	<?php
	include './librerias-js1.php';
	?>
	<script type="text/javascript">
		$(document).ready(function() {

			$('#tablaInforme').load('./vista_admin/vista_informe.php');

			
		});
	</script>
</body>

</html>