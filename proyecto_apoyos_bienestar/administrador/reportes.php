<?php
require_once '../modelo/val-admin.php';
if ($rol_id == 3) {
	echo '<script language = javascript>
            alert ("Usuario incorrecto.") 
            self.location="../index.php"
            </script>';
} elseif ($rol_id == 1 || $rol_id == 2 || $rol_id == 4) {
} else {
	echo '<script language = javascript>
            alert ("Usuario incorrecto.") 
            self.location="../index.php"
            </script>';
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Reportes</title>
	<?php
	include 'librerias-css.php';
	?>
	<!-- <script src="../controlador/funciones-usuarios.js"></script> -->
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
		<div id="tablaReportes"></div>
	</div>

	<!-- FIN DEL CONTENIDO -->

	<?php
	include 'librerias-js.php';
	?>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#tablaReportes').load('./vista_admin/vista_reportes.php');
		});
	</script>
</body>

</html>