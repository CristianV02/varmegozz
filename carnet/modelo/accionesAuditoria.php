<?php
date_default_timezone_set("America/Bogota");
require_once 'conexion.php';
$conexion = new Conexion();
if (isset($_GET['accion'])) {
	$accion = $_GET['accion'];
	if ($accion == 'registrar') {
		$descripcion = $_POST['descripcion'];
		$usuario = $_POST['usuario'];
		$tabla = $_POST['tabla'];
		$fecha = $_POST['fecha'];

		$sql = "INSERT INTO auditoria(descripcion, usuario, tabla, fecha) 
				VALUES (?, ?, ?, ?)";
		$reg = $conexion->prepare($sql);
		$reg->bindParam(1, $descripcion);
        $reg->bindParam(2, $usuario);
        $reg->bindParam(3, $tabla);
		$reg->bindParam(4, $fecha);

		if ($reg->execute() == TRUE) {
			echo 1;
		} else {
			echo 0;
		}
       
	} else if ($accion == 'modificar') {
				$id = $_POST['id'];
				$descripcion = $_POST['descripcion'];
				$usuario = $_POST['usuario'];
				$tabla = $_POST['tabla'];
				$fecha= $_POST['fecha'];

		$sql = "UPDATE auditoria SET 
					   descripcion=:descripcion,
					   usuario=:usuario,
					   tabla=:tabla,
					   fecha=:fecha
				WHERE id = :id;";

		$reg = $conexion->prepare($sql);
		$reg->bindParam(":id", $id);
		$reg->bindParam(":descripcion", $descripcion);
		$reg->bindParam(":usuario", $usuario);
		$reg->bindParam(":tabla", $tabla);
		$reg->bindParam(":fecha", $fecha);
		if ($reg->execute() == TRUE) {
			echo 1;
		} else {
			echo 0;
		}
	} else if ($accion == 'eliminar') {
		$id = $_POST['id'];
		$sql = "DELETE FROM auditoria WHERE id = :id;";
		$del = $conexion->prepare($sql);
		$del->bindParam(":id", $id);
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