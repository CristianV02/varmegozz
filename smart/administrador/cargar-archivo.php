<?php
require_once '../modelo/val-admin.php';
if (isset($_GET['informacion'])) {
	$informacion = $_GET['informacion'];
    $trozos = explode("-", $informacion);
    $codigo = $trozos[0];
    $reporte = $trozos[1];
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
	<title>cargarArchivos</title>
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
		<div id="tablaCargarFoto"></div>
	</div>

	<!-- FIN DEL CONTENIDO -->
	<?php
	include './librerias-js.php';
	?>
	<script type="text/javascript">
		$(document).ready(function() {

			$('#tablaCargarFoto').load('./vista_admin/vista_CrearCargar.php?informacion=<?php echo $informacion; ?>');
			
		});
	</script>
</body>

</html>