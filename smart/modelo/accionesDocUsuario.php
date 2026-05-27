<?php
date_default_timezone_set("America/Bogota");
require_once 'conexion.php';
$conexion = new Conexion();
if (isset($_GET['accion'])) {
	$accion = $_GET['accion'];
	if ($accion == 'registrar') {
		$nombre = $_POST['nombre'];
		$descripcion = $_POST['descripcion'];
		$id_cliente = $_POST['id_cliente'];
		$sql = "INSERT INTO documentos_usuarios (nombre, descripcion, id_cliente)
				VALUES (?, ?, ?)";
		$reg = $conexion->prepare($sql);
		$reg->bindParam(1, $nombre);
		$reg->bindParam(2, $descripcion);
		$reg->bindParam(3, $id_cliente);
		if ($reg->execute()) {
			echo 1;
		} else {
			echo 0;
		}
	} elseif ($accion == 'modificar') {
		$codigo = $_POST['codigo'];
		$nombre = $_POST['nombre'];
		$descripcion = $_POST['descripcion'];
		$id_cliente = $_POST['id_cliente'];

		$sql = "UPDATE documentos_usuarios SET
					   nombre=:nombre,
					   descripcion=:descripcion,
					   id_cliente=:id_cliente
				WHERE codigo = :codigo;";

		$reg = $conexion->prepare($sql);
		$reg->bindParam(":codigo", $codigo);
		$reg->bindParam(":nombre", $nombre);
		$reg->bindParam(":descripcion", $descripcion);
		$reg->bindParam(":id_cliente", $id_cliente);
		if ($reg->execute()) {
			echo 1 . " la acción es: " . $accion;
		} else {
			echo 0;
		}
	} elseif ($accion == 'eliminar') {
		$codigo = $_POST['codigo'];
		$sql = "DELETE FROM documentos_usuarios WHERE codigo = :codigo;";
		$del = $conexion->prepare($sql);
		$del->bindParam(":codigo", $codigo);
		if ($del->execute()) {
			echo 1;
		} else {
			echo 0;
		}
	} else {
		echo 2 . " la acción es: " . $accion;
	}
} else {
	echo 3;
}
