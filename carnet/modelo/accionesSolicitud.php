<?php
date_default_timezone_set("America/Bogota");
require_once 'conexion.php';
$conexion = new Conexion();
if (isset($_GET['accion'])) {
	$accion = $_GET['accion'];
	if ($accion == 'registrar') {
		$cedula = $_POST['cedula'];
		$codigo = $_POST['codigo'];
		$tipo = $_POST['tipo'];
		$estado = $_POST['estado'];
		$realizado_por = $_POST['realizado_por'];
		$fecha_realizado = $_POST['fecha_realizado'];
		$recibido_por_admisiones = $_POST['recibido_por_admisiones'];
		$fecha_de_admisiones = $_POST['fecha_de_admisiones'];
		$entregado = $_POST['entregado'];

		if ($codigo == 1) {
			require_once "datos-administrativo.php";
			$mis_administrativo = new misAdministrativo;
			$res = $mis_administrativo->viewAdministrativo($cedula);
			$tipo_usuario = "Administrativo";
			$cargo = $res[0]['cargo'];
			$id_programa = "No Aplica";
		} elseif ($codigo == 2) {
			require_once "datos-docente.php";
			$mis_docentes = new misDocente;
			$res = $mis_docentes->viewDocente($cedula);
			$tipo_usuario = "Docente";
			$cargos = "No Aplica";
			$id_programa = "No aplica";
		} elseif ($codigo == 3) {
			require_once "datos-estudiantes.php";
			$mis_estudiantes = new misEstudiante;
			$res = $mis_estudiantes->viewEstudiante($cedula);
			$tipo_usuario = "Estudiante";
			$cargo = "No Aplica";
			$id_programa = $res[0]['programa'];
		} else {
			echo 1;
		}
		print_r($res);

		$fecha_de_solicitud = date("Y-m-d");
		$nombres = $res[0]['nombres'];
		$id_usuario = $cedula;

		$sql = "INSERT INTO solicitud (fecha_de_solicitud, estado, nombres, tipo_usuario, cargo, id_usuario, id_programa, tipo, realizado_por, fecha_realizado, recibido_por_admisiones, fecha_de_admisiones, entregado) 
				VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$reg = $conexion->prepare($sql);
		$reg->bindParam(1, $fecha_de_solicitud);
		$reg->bindParam(2, $estado);
		$reg->bindParam(3, $nombres);
		$reg->bindParam(4, $tipo_usuario);
		$reg->bindParam(5, $cargo);
		$reg->bindParam(6, $id_usuario);
		$reg->bindParam(7, $id_programa);
		$reg->bindParam(8, $tipo);
		$reg->bindParam(9, $realizado_por);
		$reg->bindParam(10, $fecha_realizado);
		$reg->bindParam(11, $recibido_por_admisiones);
		$reg->bindParam(12, $fecha_de_admisiones);
		$reg->bindParam(13, $entregado);
		if ($reg->execute() == TRUE) {
			echo 1;
		} else {
			echo 0;
		}
	} else if ($accion == 'modificar') {
		$id_solicitud = $_POST['id_solicitud'];
		$fecha_de_solicitud = $_POST['fecha_de_solicitud'];
		$estado = $_POST['estado'];
		$nombres = $_POST['nombres'];
		$tipo_usuario = $_POST['tipo_usuario'];
		$cargo = $_POST['cargo'];
		$id_usuario = $_POST['id_usuario'];
		$id_programa = $_POST['id_programa'];
		$tipo = $_POST['tipo'];
		$realizado_por = $_POST['realizado_por'];
		$fecha_realizado = $_POST['fecha_realizado'];
		$recibido_por_admisiones = $_POST['recibido_por_admisiones'];
		$fecha_de_admisiones = $_POST['fecha_de_admisiones'];
		$entregado = $_POST['entregado'];

		$sql = "UPDATE solicitud SET 
					fecha_de_solicitud=:fecha_de_solicitud, 
                      estado=:estado,
                      nombres=:nombres, 
                      tipo_usuario=:tipo_usuario,
                      cargo=:cargo,
                      id_usuario=:id_usuario, 
                      id_programa=:id_programa,
                      tipo=:tipo,
                      realizado_por=:realizado_por,
                      fecha_realizado=:fecha_realizado,
                      recibido_por_admisiones=:recibido_por_admisiones,
                      fecha_de_admisiones=:fecha_de_admisiones,
                      entregado=:entregado
				WHERE id_solicitud =:id_solicitud;";

		$reg = $conexion->prepare($sql);
		$reg->bindParam(":id_solicitud", $id_solicitud);
		$reg->bindParam(":fecha_de_solicitud", $fecha_de_solicitud);
		$reg->bindParam(":estado", $estado);
		$reg->bindParam(":nombres", $nombres);
		$reg->bindParam(":tipo_usuario", $tipo_usuario);
		$reg->bindParam(":cargo", $cargo);
		$reg->bindParam(":id_usuario", $id_usuario);
		$reg->bindParam(":id_programa", $id_programa);
		$reg->bindParam(":tipo", $tipo);
		$reg->bindParam(":realizado_por", $realizado_por);
		$reg->bindParam(":fecha_realizado", $fecha_realizado);
		$reg->bindParam(":recibido_por_admisiones", $recibido_por_admisiones);
		$reg->bindParam(":fecha_de_admisiones", $fecha_de_admisiones);
		$reg->bindParam(":entregado", $entregado);
		if ($reg->execute() == TRUE) {
			echo 1;
		} else {
			echo 0;
		}
	} else if ($accion == 'eliminar') {
		$id_solicitud = $_POST['id_solicitud'];
		$sql = "DELETE FROM solicitud WHERE id_solicitud = :id_solicitud;";
		$del = $conexion->prepare($sql);
		$del->bindParam(":id_solicitud", $id_solicitud);
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
