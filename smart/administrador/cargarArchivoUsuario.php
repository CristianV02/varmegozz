<?php
require_once '../modelo/val-admin.php';
if (isset($_GET['codigo'])) {
	$codigo = $_GET['codigo'];
}
else{
	echo "Error...";
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cargar documentos de usuarios</title>
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
	<div>
		<div id="tablaCargarDoc"></div>
	</div>

	<!-- FIN DEL CONTENIDO -->
	<?php
	include './librerias-js.php';
	?>
	<script type="text/javascript">
		$(document).ready(function() {

			$('#tablaCargarDoc').load('./vista_admin/vista_CrearCargarDoc.php?codigo=<?php echo $codigo; ?>');
			
		});
	</script>
</body>

</html>