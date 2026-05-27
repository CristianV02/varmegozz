<?php
date_default_timezone_set("America/Bogota");
require_once 'conexion.php';
$conexion = new Conexion();
require './datos-reporte-mecanismo.php';
require './datos-reporte-sustancias.php';
require './datos-reporte-hallazgo.php';
$mis_ReporteMecanismo = new misReporteMecanismo;
$mis_ReporteSustancias = new misReporteSustancias;
$mis_ReporteHallazgo = new misReporteHallazgo;
if (isset($_GET['accion'])) {
	$accion = $_GET['accion'];
	if ($accion == 'registrar') {
		$tipo_doc = $_POST['tipo_doc'];
		$usuario = $_POST['usuario'];
		$nombre_apellido = $_POST['nombre_apellido'];
		$fecha_de_inicio = $_POST['fecha_de_inicio'];
		$hora_de_inicio = $_POST['hora_de_inicio'];
		$fecha_fin = $_POST['fecha_fin'];
		$hora_fin = $_POST['hora_fin'];
		$cantidad_mecanismo = $_POST['cantidad_mecanismo'];
		$cantidad_de_sustancia = $_POST['cantidad_de_sustancia'];
		$cantidad_de_hallazgo = $_POST['cantidad_de_hallazgo'];
		// $elaborado_por = $_SESSION['nombre'] . " " . $_SESSION['apellido'];
		$elaborado_por = "Crisitan Vargas" ;
		echo "elabarodo por" . $elaborado_por; 
		$ver_pdf = $_POST['ver_pdf'];
		$sql = "INSERT INTO reportes (tipo_doc, usuario, nombre_apellido, fecha_de_inicio, hora_de_inicio, fecha_fin, hora_fin, cantidad_mecanismo, cantidad_de_sustancia, cantidad_de_hallazgo, elaborado_por, ver_pdf) 
				VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$reg = $conexion->prepare($sql);
		$reg->bindParam(1, $tipo_doc);
		$reg->bindParam(2, $usuario);
		$reg->bindParam(3, $nombre_apellido);
		$reg->bindParam(4, $fecha_de_inicio);
		$reg->bindParam(5, $hora_de_inicio);
		$reg->bindParam(6, $fecha_fin);
		$reg->bindParam(7, $hora_fin);
		$reg->bindParam(8, $cantidad_mecanismo);
		$reg->bindParam(9, $cantidad_de_sustancia);
		$reg->bindParam(10, $cantidad_de_hallazgo);
		$reg->bindParam(11, $elaborado_por);
		$reg->bindParam(12, $ver_pdf);
		if ($reg->execute()) {
			echo 1;
		} else {
			echo 0;
		}
	} else if ($accion == 'modificar') {
		$codigo = $_POST['codigo'];
		$tipo_doc = $_POST['tipo_doc'];
		$usuario = $_POST['usuario'];
		$nombre_apellido = $_POST['nombre_apellido'];
		$fecha_de_inicio = $_POST['fecha_de_inicio'];
		$hora_de_inicio = $_POST['hora_de_inicio'];
		$fecha_fin = $_POST['fecha_fin'];
		$hora_fin = $_POST['hora_fin'];
		$cant_reporte = $mis_ReporteMecanismo->countReporteMecanismo($codigo);
		$cantidad_mecanismo = $cant_reporte;
		$cant_reporte = $mis_ReporteSustancias->countReporteSustancia($codigo);
		$cantidad_de_sustancia = $cant_reporte;
		$cant_reporte = $mis_ReporteHallazgo->countReporteHallazgo($codigo);
		$cantidad_de_hallazgo = $cant_reporte;
		$sql = "UPDATE reportes SET
					  tipo_doc=:tipo_doc,
                      usuario=:usuario,
                      nombre_apellido=:nombre_apellido,
                      fecha_de_inicio=:fecha_de_inicio,
                      hora_de_inicio=:hora_de_inicio,
                      fecha_fin=:fecha_fin,
                      hora_fin=:hora_fin,
                      cantidad_mecanismo=:cantidad_mecanismo,
                      cantidad_de_sustancia=:cantidad_de_sustancia,
                      cantidad_de_hallazgo=:cantidad_de_hallazgo
				WHERE codigo = :codigo;";

		$reg = $conexion->prepare($sql);
		$reg->bindParam(":codigo", $codigo);
		$reg->bindParam(":tipo_doc", $tipo_doc);
		$reg->bindParam(":usuario", $usuario);
		$reg->bindParam(":nombre_apellido", $nombre_apellido);
		$reg->bindParam(":fecha_de_inicio", $fecha_de_inicio);
		$reg->bindParam(":hora_de_inicio", $hora_de_inicio);
		$reg->bindParam(":fecha_fin", $fecha_fin);
		$reg->bindParam(":hora_fin", $hora_fin);
		$reg->bindParam(":cantidad_mecanismo", $cantidad_mecanismo);
		$reg->bindParam(":cantidad_de_sustancia", $cantidad_de_sustancia);
		$reg->bindParam(":cantidad_de_hallazgo", $cantidad_de_hallazgo);

		if ($reg->execute()) {
			echo 1;
		} else {
			echo 0;
		}
	} else if ($accion == 'eliminar') {
		$codigo = $_POST['codigo'];
		$sql = "DELETE FROM reportes WHERE codigo = :codigo;";
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
