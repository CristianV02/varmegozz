<?php
require_once '../modelo/val-admin.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Usuarios</title>
	<?php
	include 'librerias-css.php';
	?>
	<script src="../controlador/funciones-usuarios.js"></script>
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
		<div id="tablaUsuarios"></div>
	</div>

	<!-- FIN DEL CONTENIDO -->
	<?php
	include './modales/modalUsuario.php';
	?>

	<?php
	include 'librerias-js.php';
	?>
	<script type="text/javascript">
		$(document).ready(function() {
			rol_id = <?php echo $rol_id; ?>;
			if (rol_id == 1) {
				$('#tablaUsuarios').load('./vista_admin/vista_usuario.php?');
			} else if (rol_id == 2) {
				$('#tablaUsuarios').load('./vista_coordinador/vista_usuario.php?');
			} else if (rol_id == 3) {
				$('#tablaUsuarios').load('./vista_instructor/vista_usuario.php?');
			} else if (rol_id == 4) {
				$('#tablaUsuarios').load('./vista_gestor_apoyos/vista_usuario.php?');
			} else {
				alert("Error...");
			}

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