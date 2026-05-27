<?php
require_once '../modelo/val-admin.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Documentos de los usuarios</title>
	<?php
	include 'librerias-css1.php';
	?>
	<script src="../controlador/funciones-DocUsuarios.js"></script>
</head>

<body id="body">
	<div>
		<div id="tablaDocUsuarios"></div>
	</div>

	<!-- FIN DEL CONTENIDO -->
	<?php
	include './modales/modalDocUsuario.php';
	?>
	<?php
	include 'librerias-js1.php';
	?>
	
	<!-- Gráficas -->
	
	<script type="text/javascript">
		$(document).ready(function() {

			rol = "<?php echo $rol ?>"
			if (rol == "administrador") {
				$('#tablaDocUsuarios').load('./vista_admin/vista_docUsuario.php');
			} else {
				$('#tablaDocUsuarios').load('./vista_usu/vista_docUsuario.php');
			}


			$('#agregarNuevoDocUsuario').click(function() {
				agregardatosDocUsuario();
			});

			$('#actualizaDatosDocUsuario').click(function() {
				modificarDocUsuario();
			});
			$('#eliminarDatosDocUsuario').click(function() {
				preguntarSiNoDocUsuario();
			});
		});
	</script>
</body>

</html>