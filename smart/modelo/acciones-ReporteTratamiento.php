<?php
date_default_timezone_set("America/Bogota");
require_once 'conexion.php';
$conexion = new Conexion();
if (isset($_GET['accion'])) {
	$accion = $_GET['accion'];
	if ($accion == 'registrar') {
		$usuario = $_POST['usuario'];
		$tratamiento = $_POST['tratamiento'];
		$tipo_plagas = $_POST['tipo_plagas'];
		$cod_reporte = $_POST['cod_reporte'];


		$sql = "INSERT INTO reporte_tratamiento (usuario, tratamiento,tipo_plagas, cod_reporte) 
				VALUES (?, ?, ?,?)";
		$reg = $conexion->prepare($sql);
		$reg->bindParam(1, $usuario);
		$reg->bindParam(2, $tratamiento);
		$reg->bindParam(3, $tipo_plagas);
		$reg->bindParam(4, $cod_reporte);

		if ($reg->execute()) {
			echo 1;
		} else {
			echo 0;
		}
	} else if ($accion == 'modificar') {
		$codigo = $_POST['codigo'];
		$usuario = $_POST['usuario'];
		$tratamiento = $_POST['tratamiento'];
		$tipo_plagas = $_POST['tipo_plagas'];
		$cod_reporte = $_POST['cod_reporte'];
		$nivel_infestacion = $_POST['nivel_infestacion'];


		$sql = "UPDATE reporte_tratamiento SET
					   usuario=:usuario,
					   tratamiento=:tratamiento,
					   tipo_plagas=:tipo_plagas,
					   cod_reporte=:cod_reporte,
					   nivel_infestacion=:nivel_infestacion
				WHERE codigo = :codigo;";

		$reg = $conexion->prepare($sql);
		$reg->bindParam(":codigo", $codigo);
		$reg->bindParam(":usuario", $usuario);
		$reg->bindParam(":tratamiento", $tratamiento);
		$reg->bindParam(":tipo_plagas", $tipo_plagas);
		$reg->bindParam(":cod_reporte", $cod_reporte);
		$reg->bindParam(":nivel_infestacion", $nivel_infestacion);

		if ($reg->execute()) {
			echo 1;
		} else {
			echo 0;
		}
	} else if ($accion == 'eliminar') {
		$codigo = $_POST['codigo'];
		$sql = "DELETE FROM reporte_tratamiento WHERE codigo = :codigo;";
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
