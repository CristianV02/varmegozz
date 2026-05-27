<?php
require_once '../modelo/val-admin.php';
require '../modelo/datos-Reportes.php';
$cedula_usuario = $_GET['codigo'];
$mis_Reportes = new misReportes;
// echo "cédula= " . $cedula_usuario;
//Variables
// $res = $mis_Resultados->viewResultadoCedula($cedula_usuario);
// if (count($res) != 0) {
// 	$escalaNombre = ['de_A', 'de_B', 'de_C', 'de_E', 'de_F', 'de_G', 'de_H', 'de_I', 'de_L', 'de_M', 'de_N', 'de_O', 'de_Q1', 'de_Q2', 'de_Q3', 'de_Q4', 'estabilidad', 'ansiedad', 'dureza', 'independencia', 'autoControl', 'de_MI'];

// 	for ($i = 0; $i < count($escalaNombre); $i++) {
// 		$datos[$i] = $res[0][$escalaNombre[$i]];
// 	}
// } else {
// 	$datos = [];
// }
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PDF</title>
	<?php
	include './librerias-css.php';
	?>
</head>

<body id="body">
	<div class="col-sm-12">
		<?php
		include 'menu.php';
		?>
	</div>
	<?php
	//Si no hay datos en tabla resultados, no muestra información porque sale error. Muestra Cargando Información.
	// if (count($res) != 0) {
	?>
		<!-- <section class="container" style="display: none;">
			<section class="col-sm-6" id="escalasPrimarias">
				<h1>Escalas Primarias</h1>
				<canvas id="escalas"> </canvas>
			</section>
			<section class="col-sm-6" id="dimensionesGlobales">
				<h1>Dimensiones Globales</h1>
				<canvas id="globales"> </canvas>
			</section>
		</section> -->
	<?php
	// } else {
	?>
		<!-- <section class="col-sm-6">
			<h1 class="text-center">Cargando Información...</h1>
		</section> -->
	<?php
	// }
	?>
	<br>
	<br>
	<br>
	<!-- FIN DEL CONTENIDO -->
	<?php
	// include './modales/modalEnunciadoEncuesta.php';
	?>
	<!-- <script src="../controlador/funcionesDGusuario.js"></script> -->
	<?php
	include './librerias-js.php';
	$urlRedireccion = "../fpdf-dev/smartPDF.php?codigo=" . $cedula_usuario;
	?>
	<script type="text/javascript">
		$(document).ready(function() {
				window.location.href = "<?php echo $urlRedireccion; ?>";
		});
	</script>

</body>

</html>