<?php
date_default_timezone_set("America/Bogota");
require_once 'conexion.php';
$conexion = new Conexion();
if (isset($_GET['accion'])) {
	$accion = $_GET['accion'];
	if ($accion == 'registrar') {
		$tratamiento = $_POST['tratamiento'];
		$tipo_plaga = $_POST['tipo_plaga'];
		
		$sql = "INSERT INTO tipo_plagas (tratamiento, tipo_plaga) 
				VALUES (?, ?)";
		$reg = $conexion->prepare($sql);
		$reg->bindParam(1, $tratamiento);
		$reg->bindParam(2, $tipo_plaga);
		if ($reg->execute() == TRUE) {
			echo 1;
		} else {
			echo 0;
		}
	} else if ($accion == 'modificar') {
		$codigo = $_POST['codigo'];
		$tratamiento = $_POST['tratamiento'];
		$tipo_plaga = $_POST['tipo_plaga'];
		
		$sql = "UPDATE tipo_plagas SET
					   tratamiento=:tratamiento,
					   tipo_plaga=:tipo_plaga
				WHERE codigo = :codigo;";

		$reg = $conexion->prepare($sql);
		$reg->bindParam(':codigo', $codigo);
		$reg->bindParam(":tratamiento", $tratamiento);
		$reg->bindParam(":tipo_plaga", $tipo_plaga);
		if ($reg->execute() == TRUE) {
			echo 1;
		} else {
			echo 0;
		}
	} else if ($accion == 'eliminar') {
		$codigo = $_POST['codigo'];
		$sql = "DELETE FROM tipo_plagas WHERE codigo = :codigo;";
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
