<?php
require_once '../modelo/val-admin.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Datos Solicitud</title>
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
		<div id="tablaDatosSolicitud"></div>
	</div>

	<!-- FIN DEL CONTENIDO -->
	<?php
	// include './modales/modaldatossolicitud.php';
	?>
	<?php
	include 'librerias-js.php';
	?>
	<!-- <script src="../controlador/funciones-datos-solicitud.js"></script> -->
	<script type="text/javascript">
		$(document).ready(function() {
			id_rol = <?php echo $id_rol; ?>;
			if (id_rol == 1) {
				$('#tablaDatosSolicitud').load('./vista_admin/vista_datos_solicitud.php?');
			// } else if (id_rol == 2) {
			// 	$('#tablaSolicitud').load('./vista_sistema/vista_datos_solicitud.php?');
			// } else if (id_rol == 3) {
			// 	$('#tablaSolicitud').load('./vista_admisiones/vista_datos_solicitud.php?');
			// } else if (id_rol == 4) {
			// 	$('#tablaSolicitud').load('./vista_jefe_sistema/vista_datos_solicitud.php?');
			// } else if (id_rol == 5) {
			// 	$('#tablaSolicitud').load('./vista_jefe_admisiones/vista_datos_solicitud.php?');
			} else {
				alert("Error...");
			}

			
		});
	</script>
</body>

</html>