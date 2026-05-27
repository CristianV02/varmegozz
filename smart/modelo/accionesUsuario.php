<?php
date_default_timezone_set("America/Bogota");
require_once 'conexion.php';
$conexion = new Conexion();
if (isset($_GET['accion'])) {
	$accion = $_GET['accion'];
	if ($accion == 'registrar') {
		$tipo_id = $_POST['tipo_id'];
		$identificacion = $_POST['identificacion'];
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$usuario = $_POST['usuario'];
		$contrasena = $_POST['contrasena'];
		$correo = $_POST['correo'];
		$telefono = $_POST['telefono'];
		$direccion = $_POST['direccion'];
		$rol = $_POST['rol'];
		$sql = "INSERT INTO usuarios (tipo_id, identificacion, nombre, apellido, usuario, contrasena, correo, telefono, direccion, rol)
				VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$reg = $conexion->prepare($sql);
		$reg->bindParam(1, $tipo_id);
		$reg->bindParam(2, $identificacion);
		$reg->bindParam(3, $nombre);
		$reg->bindParam(4, $apellido);
		$reg->bindParam(5, $usuario);
		$reg->bindParam(6, $contrasena);
		$reg->bindParam(7, $correo);
		$reg->bindParam(8, $telefono);
		$reg->bindParam(9, $direccion);
		$reg->bindParam(10, $rol);
		if ($reg->execute() == TRUE) {
			echo 1;
		} else {
			echo 0;
		}
	} else if ($accion == 'modificar') {
		$codigo = $_POST['codigo'];
		$tipo_id = $_POST['tipo_id'];
		$identificacion = $_POST['identificacion'];
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$usuario = $_POST['usuario'];
		$contrasena = $_POST['contrasena'];
		$correo = $_POST['correo'];
		$telefono = $_POST['telefono'];
		$direccion = $_POST['direccion'];
		$rol = $_POST['rol'];

		$sql = "UPDATE usuarios SET 
					   tipo_id=:tipo_id,
					   identificacion=:identificacion,
					   nombre=:nombre,
					   apellido=:apellido,
					   usuario=:usuario,
					   contrasena=:contrasena,
					   correo=:correo,
					   telefono=:telefono,
					   direccion=:direccion,
					   rol=:rol
				WHERE codigo = :codigo;";

		$reg = $conexion->prepare($sql);
		$reg->bindParam(":codigo", $codigo);
		$reg->bindParam(":tipo_id", $tipo_id);
		$reg->bindParam(":identificacion", $identificacion);
		$reg->bindParam(":nombre", $nombre);
		$reg->bindParam(":apellido", $apellido);
		$reg->bindParam(":usuario", $usuario);
		$reg->bindParam(":contrasena", $contrasena);
		$reg->bindParam(":correo", $correo);
		$reg->bindParam(":telefono", $telefono);
		$reg->bindParam(":direccion", $direccion);
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
