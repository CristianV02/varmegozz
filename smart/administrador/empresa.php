<?php
require_once '../modelo/val-admin.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Empresa</title>
	<?php
	include 'librerias-css1.php';
	?>
	<script src="../controlador/funciones-empresa.js"></script>
</head>

<body id="body">
	<div>
		<div id="tablaEmpresa"></div>
	</div>

	<!-- FIN DEL CONTENIDO -->
	<?php
	include './modales/modalEmpresa.php';
	?>

	<?php
	include 'librerias-js1.php';
	?>
	<script type="text/javascript">
		$(document).ready(function() {
			rol = "<?php echo $rol ?>"
            if (rol == "administrador"){
			$('#tablaEmpresa').load('./vista_admin/vista_empresa.php');
            }
            else{
			$('#tablaEmpresa').load('./vista_usu/vista_empresa.php');
            }

			$('#agregarNuevoEmpresa').click(function() {
				agregardatosEmpresa();
			});

			$('#actualizaDatosEmpresa').click(function() {
				modificarEmpresa();
			});
			$('#eliminarDatosEmpresa').click(function() {
				preguntarSiNoEmpresa();
			});
		});
	</script>
</body>

</html>