<?php
date_default_timezone_set("America/Bogota");
require_once 'conexion.php';
$conexion = new Conexion();
if (isset($_GET['accion'])) {
	$accion = $_GET['accion'];
	if ($accion == 'registrar') {
		$usuario = $_POST['usuario'];
		$hallazgo = $_POST['hallazgo'];
		$foto1 = $_POST['foto1'];
		$foto2 = $_POST['foto2'];
		$observaciones = $_POST['observaciones'];
		$cod_reporte = $_POST['cod_reporte'];
		$sql = "INSERT INTO reporte_hallazgo (usuario, hallazgo, foto1, foto2, observaciones, cod_reporte) 
				VALUES (?, ?, ?, ?, ?, ?)";
		$reg = $conexion->prepare($sql);
		$reg->bindParam(1, $usuario);
		$reg->bindParam(2, $hallazgo);
		$reg->bindParam(3, $foto1);
		$reg->bindParam(4, $foto2);
		$reg->bindParam(5, $observaciones);
		$reg->bindParam(6, $cod_reporte);

		if ($reg->execute() == TRUE) {
			echo 1;
		} else {
			echo 0;
		}
		$codigo = $_POST['codigo'];
	} else if ($accion == 'modificar') {
		$codigo = $_POST['codigo'];
		$usuario = $_POST['usuario'];
		$hallazgo = $_POST['hallazgo'];
		$oportunidad_1 = $_POST['oportunidad_1'];
		$oportunidad_2 = $_POST['oportunidad_2'];
		$oportunidad_3 = $_POST['oportunidad_3'];
		$oportunidad_4 = $_POST['oportunidad_4'];
		$cod_reporte = $_POST['cod_reporte'];


		$sql = "UPDATE reporte_hallazgo SET 
					   usuario=:usuario,
					   hallazgo=:hallazgo,
					   oportunidad_1=:oportunidad_1,
					   oportunidad_2=:oportunidad_2,
					   oportunidad_3=:oportunidad_3,
					   oportunidad_4=:oportunidad_4,
					   cod_reporte=:cod_reporte
				WHERE codigo = :codigo;";

		$reg = $conexion->prepare($sql);
		$reg->bindParam(":codigo", $codigo);
		$reg->bindParam(":usuario", $usuario);
		$reg->bindParam(":hallazgo", $hallazgo);
		$reg->bindParam(":oportunidad_1", $oportunidad_1);
		$reg->bindParam(":oportunidad_2", $oportunidad_2);
		$reg->bindParam(":oportunidad_3", $oportunidad_3);
		$reg->bindParam(":oportunidad_4", $oportunidad_4);
		$reg->bindParam(":cod_reporte", $cod_reporte);

		if ($reg->execute() == TRUE) {
			echo 1;
		} else {
			echo 0;
		}
	} else if ($accion == 'eliminar') {
		$codigo = $_POST['codigo'];
		$sql = "DELETE FROM reporte_hallazgo WHERE codigo = :codigo;";
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
