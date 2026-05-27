<?php
date_default_timezone_set("America/Bogota");
require_once 'conexion.php';
$conexion = new Conexion();
if (isset($_GET['accion'])) {
	$accion = $_GET['accion'];
	if ($accion == 'registrar') {
		$id_producto = $_POST['id_producto'];
		$nombre_producto = $_POST['nombre_producto'];
		$precio_total = $_POST['precio_total'];
		$unidades = $_POST['unidades'];
		$nombre_comprador = $_POST['nombre_comprador'];
		$sql = "INSERT INTO ventas (id_producto, nombre_producto, precio_total, unidades, nombre_comprador) 
				VALUES (?, ?, ?, ?, ?)";
		$reg = $conexion->prepare($sql);
		$reg->bindParam(1, $id_producto);
		$reg->bindParam(2, $nombre_producto);
		$reg->bindParam(3, $precio_total);
		$reg->bindParam(4, $unidades);
		$reg->bindParam(5, $nombre_comprador);
		if ($reg->execute() == TRUE) {
			echo 1;
		} else {
			echo 0;
		}
	} else if ($accion == 'modificar') {
		$codigo = $_POST['codigo'];
		$id_producto = $_POST['id_producto'];
		$nombre_producto = $_POST['nombre_producto'];
		$precio_total = $_POST['precio_total'];
		$unidades = $_POST['unidades'];
		$nombre_comprador = $_POST['nombre_comprador'];

		$sql = "UPDATE ventas SET 
					   id_producto=:id_producto,
					   nombre_producto=:nombre_producto,
					   precio_total=:precio_total,
					   unidades=:unidades,
					   nombre_comprador=:nombre_comprador
				WHERE codigo = :codigo;";

		$reg = $conexion->prepare($sql);
		$reg->bindParam(":codigo", $codigo);
		$reg->bindParam(":id_producto", $id_producto);
		$reg->bindParam(":nombre_producto", $nombre_producto);
		$reg->bindParam(":precio_total", $precio_total);
		$reg->bindParam(":unidades", $unidades);
		$reg->bindParam(":nombre_comprador", $nombre_comprador);
		if ($reg->execute() == TRUE) {
			echo 1;
		} else {
			echo 0;
		}
	} else if ($accion == 'eliminar') {
		$codigo = $_POST['codigo'];
		$sql = "DELETE FROM ventas WHERE codigo = :codigo;";
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
