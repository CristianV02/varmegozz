<?php
date_default_timezone_set("America/Bogota");
require_once 'conexion.php';
$conexion = new Conexion();
if (isset($_GET['accion'])) {
	$accion = $_GET['accion'];
	if ($accion == 'registrar') {
		$nombre_de_facultad = $_POST['nombre_de_facultad'];

		$sql = "INSERT INTO facultad (nombre_de_facultad) 
				VALUES (?)";
		$reg = $conexion->prepare($sql);
		$reg->bindParam(1, $nombre_de_facultad);
		if ($reg->execute()) {
			echo 1;
		} else {
			echo 0;
		}
       
	} else if ($accion == 'modificar') {
				$cod_facultad = $_POST['cod_facultad'];
				$nombre_de_facultad = $_POST['nombre_de_facultad'];

		$sql = "UPDATE facultad SET 
					   nombre_de_facultad=:nombre_de_facultad
				WHERE cod_facultad = :cod_facultad;";

		$reg = $conexion->prepare($sql);
		$reg->bindParam(":cod_facultad", $cod_facultad);
		$reg->bindParam(":nombre_de_facultad", $nombre_de_facultad);
		if ($reg->execute() == TRUE) {
			echo 1;
		} else {
			echo 0;
		}
	} else if ($accion == 'eliminar') {
		$cod_facultad = $_POST['cod_facultad'];
		$sql = "DELETE FROM facultad WHERE cod_facultad = :cod_facultad;";
		$del = $conexion->prepare($sql);
		$del->bindParam(":cod_facultad", $cod_facultad);
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