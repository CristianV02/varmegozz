<?php
date_default_timezone_set("America/Bogota");
require_once 'conexion.php';
$conexion = new Conexion();
if (isset($_GET['accion'])) {
	$accion = $_GET['accion'];
	if ($accion == 'registrar') {
		$nombre = $_POST['nombreLaboratorio'];
		
		$sql = "INSERT INTO laboratorio (nombre_laboratorio)
				VALUES (?)";
		$reg = $conexion->prepare($sql);
		$reg->bindParam(1, $nombre);
		if ($reg->execute()) {
			echo 1;
		} else {
			echo 0;
		}
	} else if ($accion == 'modificar') {
		$codigo = $_POST['codigo'];
		$nombre = $_POST['nombreLaboratorio'];
		
		$sql = "UPDATE laboratorio SET
					   nombre_laboratorio=:nombre
				WHERE codigo =:codigo;";
		$reg = $conexion->prepare($sql);
		$reg->bindParam(':codigo', $codigo);
		$reg->bindParam(":nombre", $nombre);
		if ($reg->execute()) {
			echo 1;
		} else {
			echo 0;
		}
	} else if ($accion == 'eliminar') {
		$codigo = $_POST['codigo'];
		$sql = "DELETE FROM laboratorio WHERE codigo = :codigo;";
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
