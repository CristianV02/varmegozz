<?php
date_default_timezone_set("America/Bogota");
require_once 'conexion.php';
$conexion = new Conexion();
if (isset($_GET['accion'])) {
	$accion = $_GET['accion'];
	if ($accion == 'registrar') {
		$nombre = $_POST['nombre'];
		$laboratorio = $_POST['laboratorio'];
		$canti_inventario = $_POST['canti_inventario'];
		$nivel_riesgo = $_POST['nivel_riesgo'];
		$fecha_vencimiento = $_POST['fecha_vencimiento'];
		$registro_sanitario = $_POST['registro_sanitario'];
		
		$sql = "INSERT INTO sustancias (nombre, laboratorio, canti_inventario, nivel_riesgo, fecha_vencimiento, registro_sanitario) 
				VALUES (?, ?, ?, ?, ?, ?)";
		$reg = $conexion->prepare($sql);
		$reg->bindParam(1, $nombre);
		$reg->bindParam(2, $laboratorio);
		$reg->bindParam(3, $canti_inventario);
		$reg->bindParam(4, $nivel_riesgo);
		$reg->bindParam(5, $fecha_vencimiento);
		$reg->bindParam(6, $registro_sanitario);
		if ($reg->execute() == TRUE) {
			echo 1;
		} else {
			echo 0;
		}
	} else if ($accion == 'modificar') {
		$codigo = $_POST['codigo'];
		$nombre = $_POST['nombre'];
		$laboratorio = $_POST['laboratorio'];
		$canti_inventario= $_POST['canti_inventario'];
		$nivel_riesgo= $_POST['nivel_riesgo'];
		$fecha_vencimiento = $_POST['fecha_vencimiento'];
		$registro_sanitario = $_POST['registro_sanitario'];
		
		$sql = "UPDATE sustancias SET 
					   nombre=:nombre,
					   laboratorio=:laboratorio,
					   canti_inventario=:canti_inventario,
					   nivel_riesgo=:nivel_riesgo,
					   fecha_vencimiento=:fecha_vencimiento,
					   registro_sanitario=:registro_sanitario
				WHERE codigo =:codigo;";
		$reg = $conexion->prepare($sql);
		$reg->bindParam(':codigo', $codigo);
		$reg->bindParam(":nombre", $nombre);
		$reg->bindParam(":laboratorio", $laboratorio);
		$reg->bindParam(":canti_inventario", $canti_inventario);
		$reg->bindParam(":nivel_riesgo", $nivel_riesgo);
		$reg->bindParam(":fecha_vencimiento", $fecha_vencimiento);
		$reg->bindParam(":registro_sanitario", $registro_sanitario);
		if ($reg->execute() == TRUE) {
			echo 1;
		} else {
			echo 0;
		}
	} else if ($accion == 'eliminar') {
		$codigo = $_POST['codigo'];
		$sql = "DELETE FROM sustancias WHERE codigo = :codigo;";
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
