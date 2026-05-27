<?php
require_once '../modelo/val-admin.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Auditoria</title>
	<?php
	include 'librerias-css.php';
	?>
	<script src="../controlador/funciones-auditoria.js"></script>
</head>

<body id="body">
	<div class="col-sm-12">
		<?php
		include 'menu.php';
		?>
	</div>
	<div class="container-fluid">
		<div id="tablaAuditoria"></div>
	</div>

	<!-- FIN DEL CONTENIDO -->
	<?php
	include './modales/modalauditoria.php';
	?>
	<?php
	include 'librerias-js.php';
	?>
	<script type="text/javascript">
		$(document).ready(function() {

			$('#tablaAuditoria').load('./vista_admin/vista_auditoria.php');


			$('#agregarNuevoAuditoria').click(function() {
				agregarDatosAuditoria();
			});

			$('#actualizaDatosAuditoria').click(function() {
				modificarAuditoria();
			});
			$('#eliminarDatosAuditoria').click(function() {
				preguntarSiNoAuditoria();
			});
		});
	</script>
</body>

</html>