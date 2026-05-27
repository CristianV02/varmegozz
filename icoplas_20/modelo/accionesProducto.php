<?php
date_default_timezone_set("America/Bogota");
require_once 'conexion.php';
$conexion = new Conexion();
if (isset($_GET['accion'])) {
	$accion = $_GET['accion'];
	if ($accion == 'registrar') {
		$id_producto = $_POST['id_producto'];
		$nombre_producto = $_POST['nombre_producto'];
		$precio_producto = $_POST['precio_producto'];
		$marca_producto = $_POST['marca_producto'];
		$sql = "INSERT INTO producto (id_producto, nombre_producto, precio_producto, marca_producto) 
				VALUES (?, ?, ?, ?)";
		$reg = $conexion->prepare($sql);
		$reg->bindParam(1, $id_producto);
		$reg->bindParam(2, $nombre_producto);
		$reg->bindParam(3, $precio_producto);
		$reg->bindParam(4, $marca_producto);
		if ($reg->execute() == TRUE) {
			echo 1;
		} else {
			echo 0;
		}
	} else if ($accion == 'modificar') {
		$codigo = $_POST['codigo'];
		$id_producto = $_POST['id_producto'];
		$nombre_producto = $_POST['nombre_producto'];
		$precio_producto = $_POST['precio_producto'];
		$marca_producto = $_POST['marca_producto'];

		$sql = "UPDATE producto SET 
					   id_producto=:id_producto,
					   nombre_producto=:nombre_producto,
					   precio_producto=:precio_producto,
					   marca_producto=:marca_producto
				WHERE codigo = :codigo;";

		$reg = $conexion->prepare($sql);
		$reg->bindParam(":codigo", $codigo);
		$reg->bindParam(":id_producto", $id_producto);
		$reg->bindParam(":nombre_producto", $nombre_producto);
		$reg->bindParam(":precio_producto", $precio_producto);
		$reg->bindParam(":marca_producto", $marca_producto);
		if ($reg->execute() == TRUE) {
			echo 1;
		} else {
			echo 0;
		}
	} else if ($accion == 'eliminar') {
		$codigo = $_POST['codigo'];
		$sql = "DELETE FROM producto WHERE codigo = :codigo;";
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
