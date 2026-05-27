<?php
date_default_timezone_set("America/Bogota");
require_once 'conexion.php';
$conexion = new Conexion();
if (isset($_GET['accion'])) {
	$accion = $_GET['accion'];
	if ($accion == 'registrar') {
		$id = $_POST['id'];
		$fecha = $_POST['fecha'];
		$hora = $_POST['hora'];
		$identificacion_cliente = $_POST['identificacion_cliente'];
	
		$sql = "INSERT INTO mecanismo_alerta (id, fecha, hora, identificacion_cliente) 
				VALUES (?, ?, ?, ?)";
		$reg = $conexion->prepare($sql);
		$reg->bindParam(1, $id);
		$reg->bindParam(2, $fecha);
		$reg->bindParam(3, $hora);
		$reg->bindParam(4, $identificacion_cliente);

		if ($reg->execute() == TRUE) {
			echo 1;
		} else {
			echo 0;
		}
	} else if ($accion == 'modificar') {
		$codigo = $_POST['codigo'];
		$id = $_POST['id'];
		$fecha = $_POST['fecha'];
		$hora = $_POST['hora'];
		$identificacion_cliente = $_POST['identificacion_cliente'];
		
		$sql = "UPDATE mecanismo_alerta SET 
					   id=:id,
					   fecha=:fecha,
					   hora=:hora,
                       identificacion_cliente=:identificacion_cliente
				WHERE codigo = :codigo;";

		$reg = $conexion->prepare($sql);
		$reg->bindParam(':codigo', $codigo);
		$reg->bindParam(":id", $id);
		$reg->bindParam(":fecha", $fecha);
		$reg->bindParam(":hora", $hora);
        $reg->bindParam(":identificacion_cliente", $identificacion_cliente);

		if ($reg->execute() == TRUE) {
			echo 1;
		} else {
			echo 0;
		}
	} else if ($accion == 'eliminar') {
		$codigo = $_POST['codigo'];
		$sql = "DELETE FROM mecanismo_alerta WHERE codigo = :codigo;";
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