<?php
require_once '../modelo/val-admin.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Solicitud</title>
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
		<div id="tablaSolicitud"></div>
	</div>

	<!-- FIN DEL CONTENIDO -->
	<?php
	include './modales/modalsolicitud.php';
	?>
	<?php
	include 'librerias-js.php';
	?>
	<script src="../controlador/funciones-solicitud.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			id_rol = <?php echo $id_rol; ?>;
			if (id_rol == 1) {
				$('#tablaSolicitud').load('./vista_admin/vista_solicitud.php?');
			} else if (id_rol == 2) {
				$('#tablaSolicitud').load('./vista_sistema/vista_solicitud.php?');
			} else if (id_rol == 3) {
				$('#tablaSolicitud').load('./vista_admisiones/vista_solicitud.php?');
			} else if (id_rol == 4) {
				$('#tablaSolicitud').load('./vista_jefe_sistema/vista_solicitud.php?');
			} else if (id_rol == 5) {
				$('#tablaSolicitud').load('./vista_jefe_admisiones/vista_solicitud.php?');
			} else {
				alert("Error...");
			}

			$('#agregarNuevoSolicitud').click(function() {
				agregarDatosSolicitud();
			});

			$('#actualizaDatosSolicitud').click(function() {
				modificarSolicitud();
			});
			$('#eliminarDatosSolicitud').click(function() {
				preguntarSiNoSolicitud();
			});
		});
	</script>
</body>

</html>