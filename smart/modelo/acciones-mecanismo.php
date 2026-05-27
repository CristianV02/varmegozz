<?php
date_default_timezone_set("America/Bogota");
require_once 'conexion.php';
require_once './datos-mecanismo.php';
$conexion = new Conexion();
$misMecanismos = new misMecanismos();
$mi_mecanismo = $misMecanismos ->maxMecanismo();
if (isset($_GET['accion'])) {
	$accion = $_GET['accion'];
	if ($accion == 'registrar') {
		$codigo = $mi_mecanismo;
		$nombre = $_POST['nombre'];
		$tipo = $_POST['tipo'];
		$sql = "INSERT INTO mecanismo (codigo, nombre, tipo) 
				VALUES (?, ?, ?)";
		$reg = $conexion->prepare($sql);
		$reg->bindParam(1, $codigo);
		$reg->bindParam(2, $nombre);
		$reg->bindParam(3, $tipo);
		if ($reg->execute()) {
			echo 1;
		} else {
			echo 0;
		}
	} else if ($accion == 'modificar') {
		$codigo = $_POST['codigo'];
		$nombre = $_POST['nombre'];
		$tipo = $_POST['tipo'];
		
		$sql = "UPDATE mecanismo SET 
					   nombre=:nombre,
					   tipo=:tipo
				WHERE codigo = :codigo;";

		$reg = $conexion->prepare($sql);
		$reg->bindParam(':codigo', $codigo);
		$reg->bindParam(":nombre", $nombre);
		$reg->bindParam(":tipo", $tipo);
		if ($reg->execute() == TRUE) {
			echo 1;
		} else {
			echo 0;
		}
	} else if ($accion == 'eliminar') {
		$codigo = $_POST['codigo'];
		$sql = "DELETE FROM mecanismo WHERE codigo = :codigo;";
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
