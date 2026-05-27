<?php
require_once '../modelo/val-admin.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Rol</title>
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
		<div id="tablaRol"></div>
	</div>

	<!-- FIN DEL CONTENIDO -->
	<?php
	include './modales/modalrol.php';
	?>
	<?php
	include 'librerias-js.php';
	?>
	<script src="../controlador/funciones-rol.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {

			$('#tablaRol').load('./vista_admin/vista_rol.php');

			// $('#tablaRegional').DataTable();
			// initRegion();

			$('#agregarNuevoRol').click(function() {
				agregarDatosRol();
			});

			$('#actualizaDatosRol').click(function() {
				modificarRol();
			});
			$('#eliminarDatosRol').click(function() {
				preguntarSiNoRol();
			});
		});
	</script>
</body>

</html>