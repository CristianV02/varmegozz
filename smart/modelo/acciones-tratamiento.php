<?php
date_default_timezone_set("America/Bogota");
require_once 'conexion.php';
$conexion = new Conexion();
if (isset($_GET['accion'])) {
	$accion = $_GET['accion'];
	if ($accion == 'registrar') {
		$tratamiento = $_POST['tratamiento'];

		$sql = "INSERT INTO tratamiento (tratamiento)
				VALUES (?)";
		$reg = $conexion->prepare($sql);
		$reg->bindParam(1, $tratamiento);
		if ($reg->execute()) {
			echo 1;
		} else {
			echo 0;
		}
	} elseif ($accion == 'modificar') {
		$codigo = $_POST['codigo'];
		$tratamiento = $_POST['tratamiento'];
		$tipo_tratamiento = $_POST['tipo_tratamiento'];
		$sql = "UPDATE tratamiento SET
					   tratamiento=:tratamiento
				WHERE codigo = :codigo;";

		$reg = $conexion->prepare($sql);
		$reg->bindParam(":codigo", $codigo);
		$reg->bindParam(":tratamiento", $tratamiento);
		if ($reg->execute()) {
			echo 1;
		} else {
			echo 0;
		}
	} elseif ($accion == 'eliminar') {
		$codigo = $_POST['codigo'];
		$sql = "DELETE FROM tratamiento WHERE codigo = :codigo;";
		$del = $conexion->prepare($sql);
		$del->bindParam(":codigo", $codigo);
		if ($del->execute()) {
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
