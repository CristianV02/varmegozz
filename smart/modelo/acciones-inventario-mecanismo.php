<?php
date_default_timezone_set("America/Bogota");
require_once 'conexion.php';
$conexion = new Conexion();
if (isset($_GET['accion'])) {
	$accion = $_GET['accion'];
	if ($accion == 'registrar') {
		$nombre_mecanismo = $_POST['nombre_mecanismo'];
		$id_inve = $_POST['id_inve'];
		echo "$nombre_mecanismo - $id_inve";
		$sql = "INSERT INTO inve_mecanismo (nombre_mecanismo, id_inve) 
				VALUES (?, ?)";
		$reg = $conexion->prepare($sql);
		$reg->bindParam(1, $nombre_mecanismo);
		$reg->bindParam(2, $id_inve);
		if ($reg->execute()) {
			echo 1;
		} else {
			echo 0;
		}
	} else if ($accion == 'modificar') {
		$codigo = $_POST['codigo'];
		$nombre_mecanismo = $_POST['nombre_mecanismo'];
		$id_inve = $_POST['id_inve'];
		$esta_asignado = $_POST['esta_asignado'];

		$sql = "UPDATE inve_mecanismo SET
					   nombre_mecanismo=:nombre_mecanismo,
					   id_inve=:id_inve,
					   esta_asignado=:esta_asignado
				WHERE codigo = :codigo;";

		$reg = $conexion->prepare($sql);
		$reg->bindParam(':codigo', $codigo);
		$reg->bindParam(":nombre_mecanismo", $nombre_mecanismo);
		$reg->bindParam(":id_inve", $id_inve);
		$reg->bindParam(":esta_asignado", $esta_asignado);
		if ($reg->execute()) {
			echo 1;
		} else {
			echo 0;
		}
	} else if ($accion == 'eliminar') {
		$codigo = $_POST['codigo'];
		$sql = "DELETE FROM inve_mecanismo WHERE codigo = :codigo;";
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
