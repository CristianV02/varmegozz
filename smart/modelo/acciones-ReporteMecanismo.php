<?php
date_default_timezone_set("America/Bogota");
require_once 'conexion.php';
$conexion = new Conexion();
if (isset($_GET['accion'])) {
	$accion = $_GET['accion'];
	if ($accion == 'registrar') {
		$usuario = $_POST['usuario'];
		$mecanismo = $_POST['mecanismo'];
		$id_mecanismo = $_POST['id_mecanismo'];
		$estado = $_POST['estado'];
		$cod_reporte = $_POST['cod_reporte'];

		
		$sql = "INSERT INTO reporte_mecanismo (usuario, mecanismo,id_mecanismo,estado, cod_reporte) 
				VALUES (?,?,?,?,?)";
		$reg = $conexion->prepare($sql);
		$reg->bindParam(1, $usuario);
		$reg->bindParam(2, $mecanismo);
		$reg->bindParam(3, $id_mecanismo);
		$reg->bindParam(4, $estado);
		$reg->bindParam(5, $cod_reporte);

		if ($reg->execute() == TRUE) {
			echo 1;
		} else {
			echo 0;
		}
	} else if ($accion == 'modificar') {
		$codigo = $_POST['codigo'];
		$cod_reporte = $_POST['cod_reporte'];
		$nombre_mecanismo = $_POST['nombre_mecanismo'];
		$identificacion_cliente = $_POST['identificacion_cliente'];
		$id = $_POST['id'];
		$ubicacion = $_POST['ubicacion'];
		$observacion = $_POST['observacion'];
		$estadoalerta = $_POST['estadoalerta'];
		$estadobateria = $_POST['estadobateria'];

		
		$sql = "UPDATE reporte_mecanismo SET
					   cod_reporte=:cod_reporte,
					   nombre_mecanismo=:nombre_mecanismo,
					   identificacion_cliente=:identificacion_cliente,
					   id=:id,
					   ubicacion=:ubicacion,
					   observacion=:observacion,
					   estadoalerta=:estadoalerta,
					   estadobateria=:estadobateria
				WHERE codigo = :codigo;";

		$reg = $conexion->prepare($sql);
		$reg->bindParam(':codigo', $codigo);
		$reg->bindParam(":cod_reporte", $cod_reporte);
		$reg->bindParam(":nombre_mecanismo", $nombre_mecanismo);
		$reg->bindParam(":identificacion_cliente", $identificacion_cliente);
		$reg->bindParam(":id", $id);
		$reg->bindParam(":ubicacion", $ubicacion);
		$reg->bindParam(":observacion", $observacion);
		$reg->bindParam(":estadoalerta", $estadoalerta);
		$reg->bindParam(":estadobateria", $estadobateria);

		if ($reg->execute()) {
			echo 1;
		} else {
			echo 0;
		}
	} elseif ($accion == 'eliminar') {
		$codigo = $_POST['codigo'];
		$sql = "DELETE FROM reporte_mecanismo WHERE codigo = :codigo;";
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