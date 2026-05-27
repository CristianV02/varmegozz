<?php
date_default_timezone_set("America/Bogota");
require_once 'conexion.php';
$conexion = new Conexion();
if (isset($_GET['accion'])) {
	$accion = $_GET['accion'];
	if ($accion == 'registrar') {
		$usuario = $_POST['usuario'];
		$sustancias = $_POST['cod_sustancias'];
		$cantidad = $_POST['cantidad'];
		$cod_reporte = $_POST['cod_reporte'];

		$sql = "INSERT INTO reporte_sustancias (usuario,sustancias, cantidad, cod_reporte) 
				VALUES (?, ?, ?, ?)";
		$reg = $conexion->prepare($sql);
		$reg->bindParam(1, $usuario);
		$reg->bindParam(2, $sustancias);
		$reg->bindParam(3, $cantidad);
		$reg->bindParam(4, $cod_reporte);

		if ($reg->execute() == TRUE) {
			echo 1;
		} else {
			echo 0;
		}
	} else if ($accion == 'modificar') {
		$codigo = $_POST['codigo'];
		$usuario = $_POST['usuario'];
		$sustancias = $_POST['sustancias'];
		$laboratorio = $_POST['laboratorio'];
		$nivel_riesgo = $_POST['nivel_riesgo'];
		$cantidad = $_POST['cantidad'];
		$cod_reporte = $_POST['cod_reporte'];

		$sql = "UPDATE reporte_sustancias SET
					   usuario=:usuario,
					   sustancias=:sustancias,
					   laboratorio=:laboratorio,
					   nivel_riesgo=:nivel_riesgo,
					   cantidad=:cantidad,
					   cod_reporte=:cod_reporte
				WHERE codigo = :codigo;";

		$reg = $conexion->prepare($sql);
		$reg->bindParam(':codigo', $codigo);
		$reg->bindParam(":usuario", $usuario);
		$reg->bindParam(":sustancias", $sustancias);
		$reg->bindParam(":laboratorio", $laboratorio);
		$reg->bindParam(":nivel_riesgo", $nivel_riesgo);
		$reg->bindParam(":cantidad", $cantidad);
		$reg->bindParam(":cod_reporte", $cod_reporte);


		if ($reg->execute()) {
			echo 1;
		} else {
			echo 0;
		}
	} else if ($accion == 'eliminar') {
		$codigo = $_POST['codigo'];
		$sql = "DELETE FROM reporte_sustancias WHERE codigo = :codigo;";
		$del = $conexion->prepare($sql);
		$del->bindParam(":codigo", $codigo);
		if ($del->execute() == TRUE) {
			echo 1;
		} else {
			echo 0;
		}
	} else {
		echo 2;
	}
} else {
	echo 3;
}
