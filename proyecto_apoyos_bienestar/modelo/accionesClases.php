<!-- 
Reemplazar el nombre del archivo accionesClases.php

    **************************
    * Variables a reemplazar *
    **************************

Reemplazar todo:
nombre_tabla_BD

*****
Reemplazar los campos de los datos de la BD.


Borrar cuando esté modificado todo y probar
-->

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
		$telefono = $_POST['telefono'];
		$ciudad = $_POST['ciudad'];
		$regional_cod = $_POST['regional_cod'];
		$centro_formacion_cod = $_POST['centro_formacion_cod'];
		$direccion_sede = $_POST['direccion_sede'];
		$cargo = $_POST['cargo'];
		$area = $_POST['area'];
		$rol_id = $_POST['rol_id'];
		$sql = "INSERT INTO nombre_tabla_BD (tipo_documento, numero_documento, nombre, usuario, contrasena, email, telefono, ciudad, regional_cod, centro_formacion_cod, direccion_sede, cargo, area, rol_id) 
				VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$reg = $conexion->prepare($sql);
		$reg->bindParam(1, $tipo_documento);
		$reg->bindParam(2, $numero_documento);
		$reg->bindParam(3, $nombre);
		$reg->bindParam(4, $usuario);
		$reg->bindParam(5, $contrasena);
		$reg->bindParam(6, $email);
		$reg->bindParam(7, $telefono);
		$reg->bindParam(8, $ciudad);
		$reg->bindParam(9, $regional_cod);
		$reg->bindParam(10, $centro_formacion_cod);
		$reg->bindParam(11, $direccion_sede);
		$reg->bindParam(12, $cargo);
		$reg->bindParam(13, $area);
		$reg->bindParam(14, $rol_id);
		if ($reg->execute() == TRUE) {
			echo 1;
		} else {
			echo 0;
		}
    
	} else if ($accion == 'modificar') {
				$codigo = $_POST['codigo'];
				$tipo_documento = $_POST['tipo_documento'];
				$numero_documento = $_POST['numero_documento'];
				$nombre = $_POST['nombre'];
				$usuario = $_POST['usuario'];
				$contrasena = $_POST['contrasena'];
				$email = $_POST['email'];
				$telefono = $_POST['telefono'];
				$ciudad = $_POST['ciudad'];
				$regional_cod = $_POST['regional_cod'];
				$centro_formacion_cod = $_POST['centro_formacion_cod'];
				$direccion_sede = $_POST['direccion_sede'];
				$cargo = $_POST['cargo'];
				$area = $_POST['area'];
				$rol_id = $_POST['rol_id'];

		$sql = "UPDATE nombre_tabla_BD SET 
					   tipo_documento=:tipo_documento,
					   numero_documento=:numero_documento,
					   nombre=:nombre,
					   usuario=:usuario,
					   contrasena=:contrasena,
					   email=:email,
					   telefono=:telefono,
					   ciudad=:ciudad,
					   regional_cod=:regional_cod,
					   centro_formacion_cod=:centro_formacion_cod,
					   direccion_sede=:direccion_sede,
					   cargo=:cargo,
					   area=:area,
					   rol_id=:rol_id
				WHERE codigo = :codigo;";

		$reg = $conexion->prepare($sql);
		$reg->bindParam(":codigo", $codigo);
		$reg->bindParam(":tipo_documento", $tipo_documento);
		$reg->bindParam(":numero_documento", $numero_documento);
		$reg->bindParam(":nombre", $nombre);
		$reg->bindParam(":usuario", $usuario);
		$reg->bindParam(":contrasena", $contrasena);
		$reg->bindParam(":email", $email);
		$reg->bindParam(":telefono", $telefono);
		$reg->bindParam(":ciudad", $ciudad);
		$reg->bindParam(":regional_cod", $regional_cod);
		$reg->bindParam(":centro_formacion_cod", $centro_formacion_cod);
		$reg->bindParam(":direccion_sede", $direccion_sede);
		$reg->bindParam(":cargo", $cargo);
		$reg->bindParam(":area", $area);
		$reg->bindParam(":rol_id", $rol_id);
		if ($reg->execute() == TRUE) {
			echo 1;
		} else {
			echo 0;
		}
	} else if ($accion == 'eliminar') {
		$codigo = $_POST['codigo'];
		$sql = "DELETE FROM nombre_tabla_BD WHERE codigo = :codigo;";
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