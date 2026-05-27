<?php
require_once '../modelo/val-admin.php';
if (isset($_GET['cod_centro_formacion'])) {
	$centro_formacion_cod = $_GET['cod_centro_formacion'];
} else {
	$centro_formacion_cod  = "";
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tipo de Documentos</title>
	<?php
	include 'librerias-css1.php';
	?>
</head>

<body id="body">
	<div>
		<div id="tablaDocumento"></div>
	</div>

	<!-- FIN DEL CONTENIDO -->
	<?php
	include './modales/modalTipoDocumento.php';
	?>
	<?php
	include 'librerias-js1.php';
	?>
	<script src="../controlador/funciones-tipo-documento.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {

			$('#tablaDocumento').load('./vista_admin/vista_tipo_documento.php');

			// $('#tablaRegional').DataTable();
			// initRegion();

			$('#agregarNuevoDocumento').click(function() {
				agregarDatosDocumento();
			});

			$('#actualizaDatosDocumento').click(function() {
				modificarDocumento();
			});
			$('#eliminarDatosDocumento').click(function() {
				preguntarSiNoDocumento();
			});
		});
	</script>
</body>

</html>