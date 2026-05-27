<?php
date_default_timezone_set("America/Bogota");
require_once 'conexion.php';
require_once './datos-mecanismo.php';
$conexion = new Conexion();
if (isset($_GET['accion'])) {
	$accion = $_GET['accion'];
	if ($accion == 'registrar') {
		$nombre_mecanismo = $_POST['nombre_mecanismo'];
		
		$sql = "INSERT INTO nombre_mecanismo (nombre_mecanismo) 
				VALUES (?)";
		$reg = $conexion->prepare($sql);
		$reg->bindParam(1, $nombre_mecanismo);
		if ($reg->execute()) {
			echo 1;
		} else {
			echo 0;
		}
	} else if ($accion == 'modificar') {
		$codigo = $_POST['codigo'];
		$nombre_mecanismo = $_POST['nombre_mecanismo'];
		
		$sql = "UPDATE nombre_mecanismo SET 
					   nombre_mecanismo=:nombre_mecanismo
				WHERE codigo = :codigo;";

		$reg = $conexion->prepare($sql);
		$reg->bindParam(':codigo', $codigo);
		$reg->bindParam(":nombre_mecanismo", $nombre_mecanismo);
		if ($reg->execute() == TRUE) {
			echo 1;
		} else {
			echo 0;
		}
	} else if ($accion == 'eliminar') {
		$codigo = $_POST['codigo'];
		$sql = "DELETE FROM nombre_mecanismo WHERE codigo = :codigo;";
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
