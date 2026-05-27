<?php
date_default_timezone_set("America/Bogota");
require_once 'conexion.php';
$conexion = new Conexion();
if (isset($_GET['accion'])) {
	$accion = $_GET['accion'];
	if ($accion == 'registrar') {
		$id_solicitud = $_POST['id_solicitud'];
		$fecha = $_POST['fecha'];
		$hora = $_POST['hora'];
		$sql = "INSERT INTO estado(id_solicitud, fecha, hora) 
				VALUES (?, ?, ?)";
		$reg = $conexion->prepare($sql);
		$reg->bindParam(1, $id_solicitud);
		$reg->bindParam(2, $fecha);
		$reg->bindParam(3, $hora);
		if ($reg->execute() == TRUE) {
			echo 1;
		} else {
			echo 0;
		}
       
	} else if ($accion == 'modificar') {
				$id_registro = $_POST['id_registro'];
				$id_solicitud = $_POST['id_solicitud'];
				$fecha= $_POST['fecha'];
				$hora = $_POST['hora'];

		$sql = "UPDATE estado SET 
					   id_solicitud=:id_solicitud,
					   fecha=:fecha,
					   hora=:hora
				WHERE id_registro = :id_registro;";

		$reg = $conexion->prepare($sql);
		$reg->bindParam(":id_registro", $id_registro);
		$reg->bindParam(":id_solicitud", $id_solicitud);
		$reg->bindParam(":fecha", $fecha);
		$reg->bindParam(":hora", $hora);
		if ($reg->execute() == TRUE) {
			echo 1;
		} else {
			echo 0;
		}
	} else if ($accion == 'eliminar') {
		$id_registro = $_POST['id_registro'];
		$sql = "DELETE FROM estado WHERE id_registro = :id_registro;";
		$del = $conexion->prepare($sql);
		$del->bindParam(":id_registro", $id_registro);
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