<?php
require_once '../modelo/val-admin.php';
if (isset($_POST['tipo_busqueda']) && isset($_POST['datoBusqueda'])) {
	$tipo_busqueda = $_POST["tipo_busqueda"];
	$datoBusqueda = $_POST["datoBusqueda"];
} elseif (isset($_GET['codigo']) && isset($_GET['valor'])) {
	$tipo_busqueda = $_GET["codigo"];
	$datoBusqueda = $_GET["valor"];
} else {
	$tipo_busqueda = "";
	$datoBusqueda = "";
	echo '<script language = javascript>
            alert ("Debe seleccionar un dato para buscar.") 
            self.location="./busqueda.php"
            </script>';
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Búsqueda</title>
	<?php
	include 'librerias-css.php';
	?>
	<script src="../controlador/funciones-novedades.js"></script>
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
		<div id="tablaDatos_Busqueda"></div>
	</div>

	<!-- FIN DEL CONTENIDO -->
	<?php
	include './modales/modalNovedades.php';
	?>
	<?php
	include 'librerias-js.php';
	?>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#tablaDatos_Busqueda').load('./vista_admin/vista_datos_busqueda.php?codigo=<?php echo $tipo_busqueda; ?>&valor=<?php echo $datoBusqueda; ?>');
		});
	</script>
</body>

</html>