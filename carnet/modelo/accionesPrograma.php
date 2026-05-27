<?php
date_default_timezone_set("America/Bogota");
require_once 'conexion.php';
$conexion = new Conexion();
if (isset($_GET['accion'])) {
	$accion = $_GET['accion'];
	if ($accion == 'registrar') {
		$nombre_del_programa = $_POST['nombre_del_programa'];
		$cod_facultad = $_POST['cod_facultad'];
		$sql = "INSERT INTO programa(nombre_del_programa, cod_facultad) 
				VALUES (?, ?)";
		$reg = $conexion->prepare($sql);
		$reg->bindParam(1, $nombre_del_programa);
		$reg->bindParam(2, $cod_facultad);
		if ($reg->execute() == TRUE) {
			echo 1;
		} else {
			echo 0;
		}
       
	} else if ($accion == 'modificar') {
				$id_programa = $_POST['id_programa'];
				$nombre_del_programa= $_POST['nombre_del_programa'];
				$cod_facultad = $_POST['cod_facultad'];

		$sql = "UPDATE programa SET 
					   nombre_del_programa=:nombre_del_programa,
					   cod_facultad=:cod_facultad
				WHERE id_programa = :id_programa;";

		$reg = $conexion->prepare($sql);
		$reg->bindParam(":id_programa", $id_programa);
		$reg->bindParam(":nombre_del_programa", $nombre_del_programa);
		$reg->bindParam(":cod_facultad", $cod_facultad);
		if ($reg->execute() == TRUE) {
			echo 1;
		} else {
			echo 0;
		}
	} else if ($accion == 'eliminar') {
		$id_programa = $_POST['id_programa'];
		$sql = "DELETE FROM programa WHERE id_programa = :id_programa;";
		$del = $conexion->prepare($sql);
		$del->bindParam(":id_programa", $id_programa);
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