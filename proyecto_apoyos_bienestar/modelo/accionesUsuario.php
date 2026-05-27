<?php
date_default_timezone_set("America/Bogota");
require_once 'conexion.php';
$conexion = new Conexion();
if (isset($_GET['accion'])) {
	$accion = $_GET['accion'];
	if ($accion == 'registrar') {
		$tipo_documento = $_POST['tipo_documento'];
		$numero_documento = $_POST['numero_documento'];
		$nombre = $_POST['nombre'];
		$usuario = $_POST['usuario'];
		$contrasena = $_POST['contrasena'];
		$email = $_POST['email'];
		$rol_id = $_POST['rol_id'];
		$sql = "INSERT INTO usuarios (tipo_documento, numero_documento, nombre, usuario, contrasena, email, rol_id) 
				VALUES (?, ?, ?, ?, ?, ?, ?)";
		$reg = $conexion->prepare($sql);
		$reg->bindParam(1, $tipo_documento);
		$reg->bindParam(2, $numero_documento);
		$reg->bindParam(3, $nombre);
		$reg->bindParam(4, $usuario);
		$reg->bindParam(5, $contrasena);
		$reg->bindParam(6, $email);
		$reg->bindParam(7, $rol_id);
		if ($reg->execute() == TRUE) {
			echo 1;
		} else {
			echo 0;
		}
    
	} else if ($accion == 'modificar') {
				$cod_usuario = $_POST['cod_usuario'];
				$tipo_documento = $_POST['tipo_documento'];
				$numero_documento = $_POST['numero_documento'];
				$nombre = $_POST['nombre'];
				$usuario = $_POST['usuario'];
				$contrasena = $_POST['contrasena'];
				$email = $_POST['email'];
				$rol_id = $_POST['rol_id'];

		$sql = "UPDATE usuarios SET 
					   tipo_documento=:tipo_documento,
					   numero_documento=:numero_documento,
					   nombre=:nombre,
					   usuario=:usuario,
					   contrasena=:contrasena,
					   email=:email,
					   rol_id=:rol_id
				WHERE cod_usuario = :cod_usuario;";

		$reg = $conexion->prepare($sql);
		$reg->bindParam(":cod_usuario", $cod_usuario);
		$reg->bindParam(":tipo_documento", $tipo_documento);
		$reg->bindParam(":numero_documento", $numero_documento);
		$reg->bindParam(":nombre", $nombre);
		$reg->bindParam(":usuario", $usuario);
		$reg->bindParam(":contrasena", $contrasena);
		$reg->bindParam(":email", $email);
		$reg->bindParam(":rol_id", $rol_id);
		if ($reg->execute() == TRUE) {
			echo 1;
		} else {
			echo 0;
		}
	} else if ($accion == 'eliminar') {
		$cod_usuario = $_POST['cod_usuario'];
		$sql = "DELETE FROM usuarios WHERE cod_usuario = :cod_usuario;";
		$del = $conexion->prepare($sql);
		$del->bindParam(":cod_usuario", $cod_usuario);
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