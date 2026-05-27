<?php
date_default_timezone_set("America/Bogota");
require_once 'conexion.php';
$conexion = new Conexion();
if (isset($_GET['accion'])) {
	$accion = $_GET['accion'];
	if ($accion == 'registrar') {
		$nombre_del_rol = $_POST['nombre_del_rol'];
		$permiso = $_POST['permiso'];
		$sql = "INSERT INTO rol(nombre_del_rol, permiso) 
				VALUES (?, ?)";
		$reg = $conexion->prepare($sql);
		$reg->bindParam(1, $nombre_del_rol);
		$reg->bindParam(2, $permiso);
		if ($reg->execute() == TRUE) {
			echo 1;
		} else {
			echo 0;
		}
       
	} else if ($accion == 'modificar') {
				$id_rol = $_POST['id_rol'];
				$nombre_del_rol = $_POST['nombre_del_rol'];
				$permiso = $_POST['permiso'];

		$sql = "UPDATE rol SET 
					   nombre_del_rol=:nombre_del_rol,
					   permiso=:permiso
				WHERE id_rol = :id_rol;";

		$reg = $conexion->prepare($sql);
		$reg->bindParam(":id_rol", $id_rol);
		$reg->bindParam(":nombre_del_rol", $nombre_del_rol);
		$reg->bindParam(":permiso", $permiso);
		if ($reg->execute() == TRUE) {
			echo 1;
		} else {
			echo 0;
		}
	} else if ($accion == 'eliminar') {
		$codigo = $_POST['codigo'];
		$sql = "DELETE FROM rol WHERE codigo = :codigo;";
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