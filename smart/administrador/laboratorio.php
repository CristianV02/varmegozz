<?php
require_once '../modelo/val-admin.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Laboratorios</title>
	<?php
	include 'librerias-css1.php';
	?>
	<script src="../controlador/funciones-laboratorio.js"></script>
</head>

<body id="body">
	<div>
		<div id="tablaLaboratorios"></div>
	</div>

	<!-- FIN DEL CONTENIDO -->
	<?php
	include './modales/modalLaboratorios.php';
	?>

	<?php
	include 'librerias-js1.php';
	?>
	<script type="text/javascript">
		$(document).ready(function() {

			$('#tablaLaboratorios').load('./vista_admin/vista_Laboratorios.php');

			$('#agregarNuevoLaboratorio').click(function() {
				agregardatosLaboratorio();
			});

			$('#actualizaDatosLaboratorio').click(function() {
				modificarLaboratorio();
			});

			$('#eliminarDatosLaboratorio').click(function() {
				preguntarSiNoLaboratorio();
			});
		});
	</script>
</body>

</html>