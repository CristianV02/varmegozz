<!-- 
Reemplazar el nombre del archivo

    **************************
    * Variables a reemplazar *
    **************************

Reemplazar la palabra "clases" de:

../controlador/funciones-clases.js
tablaClases
./modales/modalClases.php
./componentes/vista_Clases.php
#agregarNuevoClases
agregardatosClases
#actualizaDatosClases'
modificarClases
#eliminarDatosClases
preguntarSiNoClases

Borrar cuando esté modificado todo e ir a ./componentes/vista_Clases.php
-->

<?php
if (isset($_GET['codigo'])) {
	$codigo = $_GET['codigo'];
	$codigo = 1;
} else {
	$codigo = "";
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Clases</title>
	<?php
	include 'librerias-css.php';
	?>
	<script src="../controlador/funciones-clases.js"></script>
</head>

<body id="body">
	<div class="col-sm-12">
		<?php
		include 'menu.php';
		?>
	</div>
	<div class="container-fluid">
		<div id="tablaClases"></div>
	</div>

	<!-- FIN DEL CONTENIDO -->
	<?php
	include './modales/modalClases.php';
	?>

	<?php
	include 'librerias-js.php';
	?>
	<script type="text/javascript">
		$(document).ready(function() {

			$('#tablaClases').load('./vista_admin/vista_clases.php');

			$('#agregarNuevoClases').click(function() {
				agregardatosClases();
			});

			$('#actualizaDatosClases').click(function() {
				modificarClases();
			});
			$('#eliminarDatosClases').click(function() {
				preguntarSiNoClases();
			});
		});
	</script>
</body>

</html>