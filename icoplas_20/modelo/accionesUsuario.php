<?php
date_default_timezone_set("America/Bogota");
require_once 'conexion.php';
$conexion = new Conexion();
if (isset($_GET['accion'])) {
	$accion = $_GET['accion'];
	if ($accion == 'registrar') {
		$tipo_id = $_POST['tipo_id'];
		$identificacion = $_POST['identificacion'];
		$nombres = $_POST['nombres'];
		$apellidos = $_POST['apellidos'];
		$usuario = $_POST['usuario'];
		$contrasena = $_POST['contrasena'];
		$rol = $_POST['rol'];
		$sql = "INSERT INTO usuarios (tipo_id, identificacion, nombres, apellidos, usuario, contrasena, rol) 
				VALUES (?, ?, ?, ?, ?, ?, ?)";
		$reg = $conexion->prepare($sql);
		$reg->bindParam(1, $tipo_id);
		$reg->bindParam(2, $identificacion);
		$reg->bindParam(3, $nombres);
		$reg->bindParam(4, $apellidos);
		$reg->bindParam(5, $usuario);
		$reg->bindParam(6, $contrasena);
		$reg->bindParam(7, $rol);
		if ($reg->execute() == TRUE) {
			echo 1;
		} else {
			echo 0;
		}
	} else if ($accion == 'modificar') {
		$codigo = $_POST['codigo'];
		$tipo_id = $_POST['tipo_id'];
		$identificacion = $_POST['identificacion'];
		$nombres = $_POST['nombres'];
		$apellidos = $_POST['apellidos'];
		$usuario = $_POST['usuario'];
		$contrasena = $_POST['contrasena'];
		$rol = $_POST['rol'];

		$sql = "UPDATE usuarios SET 
					   tipo_id=:tipo_id,
					   identificacion=:identificacion,
					   nombres=:nombres,
					   apellidos=:apellidos,
					   usuario=:usuario,
					   contrasena=:contrasena,
					   rol=:rol
				WHERE codigo = :codigo;";

		$reg = $conexion->prepare($sql);
		$reg->bindParam(":codigo", $codigo);
		$reg->bindParam(":tipo_id", $tipo_id);
		$reg->bindParam(":identificacion", $identificacion);
		$reg->bindParam(":nombres", $nombres);
		$reg->bindParam(":apellidos", $apellidos);
		$reg->bindParam(":usuario", $usuario);
		$reg->bindParam(":contrasena", $contrasena);
		$reg->bindParam(":rol", $rol);
		if ($reg->execute() == TRUE) {
			echo 1;
		} else {
			echo 0;
		}
	} else if ($accion == 'eliminar') {
		$codigo = $_POST['codigo'];
		$sql = "DELETE FROM usuarios WHERE codigo = :codigo;";
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
