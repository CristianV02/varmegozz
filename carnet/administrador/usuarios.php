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
		<div id="tablaUsuario"></div>
	</div>

	<!-- FIN DEL CONTENIDO -->
	<?php
	include './modales/modalusuario.php';
	?>
	<?php
	include 'librerias-js.php';
	?>
	<script type="text/javascript">
		$(document).ready(function() {
			id_rol = <?php echo $id_rol; ?>;
			if (id_rol == 1) {
				$('#tablaUsuario').load('./vista_admin/vista_usuario.php?');
			} else if (id_rol == 2) {
				$('#tablaUsuario').load('./vista_sistema/vista_usuario.php?');
			} else if (id_rol == 3) {
				$('#tablaUsuario').load('./vista_admisiones/vista_usuario.php?');
			} else if (id_rol == 4) {
				$('#tablaUsuario').load('./vista_jefe_sistema/vista_usuario.php?');
			} else if (id_rol == 5) {
				$('#tablaUsuario').load('./vista_jefe_admisiones/vista_usuario.php?');
			} else {
				alert("Error...");
			}


			$('#agregarNuevoUsuario').click(function() {
				agregarDatosUsuario();
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