<?php
date_default_timezone_set("America/Bogota");
require_once 'conexion.php';
require_once './datos-empresa.php';
$conexion = new Conexion();
$mis_Empresas = new misEmpresas();
$mi_empresa= $mis_Empresas ->maxEmpresa();
if (isset($_GET['accion'])) {
	$accion = $_GET['accion'];
	if ($accion == 'registrar') {
		$codigo = $mi_empresa;
		$NITRUT = $_POST['NITRUT'];
		$numero = $_POST['numero'];
		$nombre_empresa = $_POST['nombre_empresa'];
		$direccion = $_POST['direccion'];
		$identificacion = $_POST['identificacion'];
		$nombre_usuario = $_POST['nombre_usuario'];
		$telefono = $_POST['telefono'];
		$correo = $_POST['correo'];
		$cargo = $_POST['cargo'];
		$sql = "INSERT INTO tipo_establecimiento (codigo, NITRUT, numero, nombre_empresa, direccion, identificacion, nombre_usuario, telefono, correo, cargo) 
				VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$reg = $conexion->prepare($sql);
		$reg->bindParam(1, $codigo);
		$reg->bindParam(2, $NITRUT);
		$reg->bindParam(3, $numero);
		$reg->bindParam(4, $nombre_empresa);
		$reg->bindParam(5, $direccion);
		$reg->bindParam(6, $identificacion);
		$reg->bindParam(7, $nombre_usuario);
		$reg->bindParam(8, $telefono);
		$reg->bindParam(9, $correo);
		$reg->bindParam(10, $cargo);
		if ($reg->execute()) {
			echo 1;
		} else {
			echo 0;
		}
    
	} else if ($accion == 'modificar') {
				$codigo= $_POST['codigo'];
				$NITRUT = $_POST['NITRUT'];
				$numero = $_POST['numero'];
				$nombre_empresa = $_POST['nombre_empresa'];
				$direccion = $_POST['direccion'];
				$identificacion = $_POST['identificacion'];
				$nombre_usuario = $_POST['nombre_usuario'];
				$telefono = $_POST['telefono'];
				$correo = $_POST['correo'];
				$cargo = $_POST['cargo'];

		$sql = "UPDATE tipo_establecimiento SET
					   NITRUT=:NITRUT,
					   numero=:numero,
					   nombre_empresa=:nombre_empresa,
					   direccion=:direccion,
					   identificacion=:identificacion,
					   nombre_usuario=:nombre_usuario,
					   telefono=:telefono,
					   correo=:correo,
					   cargo=:cargo
				WHERE codigo = :codigo;";

		$reg = $conexion->prepare($sql);
		$reg->bindParam(":codigo", $codigo);
		$reg->bindParam(":NITRUT", $NITRUT);
		$reg->bindParam(":numero", $numero);
		$reg->bindParam(":nombre_empresa", $nombre_empresa);
		$reg->bindParam(":direccion", $direccion);
		$reg->bindParam(":identificacion", $identificacion);
		$reg->bindParam(":nombre_usuario", $nombre_usuario);
		$reg->bindParam(":telefono", $telefono);
		$reg->bindParam(":correo", $correo);
		$reg->bindParam(":cargo", $cargo);
		if ($reg->execute()) {
			echo 1;
		} else {
			echo 0;
		}
	} else if ($accion == 'eliminar') {
		$codigo = $_POST['codigo'];
		$sql = "DELETE FROM tipo_establecimiento WHERE codigo = :codigo;";
		$del = $conexion->prepare($sql);
		$del->bindParam(":codigo", $codigo);
		if ($del->execute()) {
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