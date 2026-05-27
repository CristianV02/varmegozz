<?php
date_default_timezone_set("America/Bogota");
require_once 'conexion.php';
require_once './datos-cantidad.php';
$conexion = new Conexion();
$misCantidad = new misCantidad();
$mi_cantidad= $misCantidad ->maxCantidad();
if (isset($_GET['accion'])) {
	$accion = $_GET['accion'];
	if ($accion == 'registrar') {
		$codigo = $mi_cantidad;
		$cod_sustancias = $_POST['cod_sustancias'];
		$valor = $_POST['valor'];
		$mediciones = $_POST['mediciones'];
		
		$sql = "INSERT INTO cantidad (codigo, cod_sustancias, valor, mediciones)
				VALUES (?, ?, ?, ?)";
		$reg = $conexion->prepare($sql);
		$reg->bindParam(1, $codigo);
		$reg->bindParam(2, $cod_sustancias);
		$reg->bindParam(3, $valor);
		$reg->bindParam(4, $mediciones);
		
		if ($reg->execute()) {
			echo 1;
		} else {
			echo 0;
		}
	} else if ($accion == 'modificar') {
		$codigo = $_POST['codigo'];
		$cod_sustancias = $_POST['cod_sustancias'];
		$valor = $_POST['valor'];		
		$mediciones = $_POST['mediciones'];

		
		$sql = "UPDATE cantidad SET
					   cod_sustancias=:cod_sustancias,
					   valor=:valor,
					   mediciones=:mediciones
				WHERE codigo = :codigo;";

		$reg = $conexion->prepare($sql);
		$reg->bindParam(":codigo", $codigo);
		$reg->bindParam(":cod_sustancias", $cod_sustancias);
		$reg->bindParam(":valor", $valor);
		$reg->bindParam(":mediciones", $mediciones);
		if ($reg->execute() == TRUE) {
			echo 1;
		} else {
			echo 0;
		}
	} else if ($accion == 'eliminar') {
		$codigo = $_POST['codigo'];
		$sql = "DELETE FROM cantidad WHERE codigo = :codigo;";
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
