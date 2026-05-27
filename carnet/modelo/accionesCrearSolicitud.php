<?php

use PhpOffice\PhpSpreadsheet\Calculation\TextData\Format;

date_default_timezone_set("America/Bogota");
require_once 'conexion.php';
$conexion = new Conexion();
if (isset($_GET['accion'])) {
	$accion = $_GET['accion'];
	if ($accion == 'registrar') {
		require_once './datos-estudiates.php';
		$mis_estudiantes = new misEstudiante;
		$cedula = $_POST['cedula'];
		$mi_estudiantes = $mi_estudiantes->viewEstudiante($estudiante);
		$programa = $mi_estudiantes[0]['programa'];
		$facultad = $mi_estudiantes[0]['facultad'];
		$nombres = $mi_estudiantes[0]['nombres'];
		$correoinstitucional = $mi_estudiantes[0]['correoinstitucional'];
		$sql = "INSERT INTO crearsolicitud(cedula,programa,facultad,nombres,correoinstitucional) 
				VALUES (?,?,?,?,?)";
		$reg = $conexion->prepare($sql);
		$reg->bindParam(1, $id_usuario);
		$reg->bindParam(1, $programa);
		$reg->bindParam(1, $facultad);
		$reg->bindParam(1, $nombres);
		$reg->bindParam(1, $correoinstitucional);
		if ($reg->execute() == TRUE) {
			echo 1;
		} else {
			echo 0;
		}
    }
}