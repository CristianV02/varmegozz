<?php
date_default_timezone_set("America/Bogota");
require_once 'conexion.php';
$conexion = new Conexion();
if (isset($_GET['accion'])) {
	$accion = $_GET['accion'];
	if ($accion == 'registrar') {
		$id_usuario = $_POST['id_usuario'];
		$nombres_apellidos = $_POST['nombres_apellidos'];
		$usuario = $_POST['usuario'];
		$contrasena = $_POST['contrasena'];
		$id_rol = $_POST['id_rol'];
		$sql = "INSERT INTO usuario (id_usuario, nombres_apellidos, usuario, contrasena, id_rol) 
				VALUES (?, ?, ?, ?, ?)";
		$reg = $conexion->prepare($sql);
		$reg->bindParam(1, $id_usuario);
		$reg->bindParam(2, $nombres_apellidos);
		$reg->bindParam(3, $usuario);
		$reg->bindParam(4, $contrasena);
		$reg->bindParam(5, $id_rol);
		if ($reg->execute() == TRUE) {
			echo 1;
		} else {
			echo 0;
		}
	} else if ($accion == 'modificar') {
		$id = $_POST['id'];
		$id_usuario = $_POST['id_usuario'];
		$nombres_apellidos = $_POST['nombres_apellidos'];
		$usuario = $_POST['usuario'];
		$contrasena = $_POST['contrasena'];
		$id_rol = $_POST['id_rol'];

		$sql = "UPDATE usuario SET 
					   id_usuario=:id_usuario,
					   nombres_apellidos=:nombres_apellidos,
					   usuario=:usuario,
					   contrasena=:contrasena,
					   id_rol=:id_rol
				WHERE id =:id;";

		$reg = $conexion->prepare($sql);
		$reg->bindParam(":id", $id);
		$reg->bindParam(":id_usuario", $id_usuario);
		$reg->bindParam(":nombres_apellidos", $nombres_apellidos);
		$reg->bindParam(":usuario", $usuario);
		$reg->bindParam(":contrasena", $contrasena);
		$reg->bindParam(":id_rol", $id_rol);
		if ($reg->execute() == TRUE) {
			echo 1;
		} else {
			echo 0;
		}
	} else if ($accion == 'eliminar') {
		$id = $_POST['id'];
		$sql = "DELETE FROM usuario WHERE id = :id;";
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
