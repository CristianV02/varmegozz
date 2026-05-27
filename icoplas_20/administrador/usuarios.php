<?php
require_once '../modelo/val-admin.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>usuarios</title>
	<?php
	include 'librerias-css1.php';
	?>
	<script src="../controlador/funciones-usuarios.js"></script>
</head>

<body id="body">
	<div>
		<div id="tablaUsuarios"></div>
	</div>

	<!-- FIN DEL CONTENIDO -->
	<?php
	include './modales/modalUsuario.php';
	?>

	<?php
	include './librerias-js1.php';
	?>
	<script type="text/javascript">
		$(document).ready(function() {

			$('#tablaUsuarios').load('./vista_admin/vista_usuario.php');

			$('#agregarNuevoUsuario').click(function() {
				agregardatosUsuario();
			});

			$('#actualizaDatosUsuario').click(function() {
				modificarUsuario();
			});
			$('#eliminarDatosUsuario').click(function() {
				preguntarSiNoUsuario();
			});
		});
	</script>
</body>

</html>