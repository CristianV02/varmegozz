<?php
date_default_timezone_set("America/Bogota");
require_once 'conexion.php';
$conexion = new Conexion();
if (isset($_GET['accion'])) {
	$accion = $_GET['accion'];
	if ($accion == 'registrar') {
		$tipo_documento = $_POST['tipo_documento'];
		$numero_documento = $_POST['numero_documento'];
		$nombres_apellidos = $_POST['nombres_apellidos'];
		$ficha = $_POST['ficha'];
		$programa_formacion = $_POST['programa_formacion'];
		$inicio_ficha = $_POST['inicio_ficha'];
		$fin_ficha = $_POST['fin_ficha'];
		$nivel_formacion = $_POST['nivel_formacion'];
		$estado_aprendiz = $_POST['estado_aprendiz'];
		$apoyo_socioeconomico = $_POST['apoyo_socioeconomico'];
		$estado_apoyo = $_POST['estado_apoyo'];
		$inicio_apoyo = $_POST['inicio_apoyo'];
		$fin_apoyo = $_POST['fin_apoyo'];
		$numero_resolucion_apoyo = $_POST['numero_resolucion_apoyo'];
		$nombre_novedad_suspension = $_POST['nombre_novedad_suspension'];
		$motivo_suspension = $_POST['motivo_suspension'];
		$fecha_novedad_suspension = $_POST['fecha_novedad_suspension'];
		$nombre_registro_suspension = $_POST['nombre_registro_suspension'];
		$resolucion_novedad_suspension = $_POST['resolucion_novedad_suspension'];
		$nombre_novedad_reactivacion = $_POST['nombre_novedad_reactivacion'];
		$motivo_reactivacion = $_POST['motivo_reactivacion'];
		$fecha_novedad_reactivacion = $_POST['fecha_novedad_reactivacion'];
		$nombre_registro_reactivacion = $_POST['nombre_registro_reactivacion'];
		$resolucion_novedad_reactivacion = $_POST['resolucion_novedad_reactivacion'];
		$nombre_novedad_cancelacion = $_POST['nombre_novedad_cancelacion'];
		$motivo_cancelacion = $_POST['motivo_cancelacion'];
		$fecha_novedad_cancelacion = $_POST['fecha_novedad_cancelacion'];
		$nombre_registro_cancelacion = $_POST['nombre_registro_cancelacion'];
		$resolucion_novedad_cancelacion = $_POST['resolucion_novedad_cancelacion'];
		$sql = "INSERT INTO apoyos_socioeconomicos (tipo_documento, numero_documento, nombres_apellidos, ficha, programa_formacion, inicio_ficha, fin_ficha, nivel_formacion, estado_aprendiz, apoyo_socioeconomico, estado_apoyo, inicio_apoyo, fin_apoyo, numero_resolucion_apoyo, nombre_novedad_suspension, motivo_suspension, fecha_novedad_suspension, nombre_registro_suspension, resolucion_novedad_suspension, nombre_novedad_reactivacion, motivo_reactivacion, fecha_novedad_reactivacion, nombre_registro_reactivacion, resolucion_novedad_reactivacion, nombre_novedad_cancelacion, motivo_cancelacion, fecha_novedad_cancelacion, nombre_registro_cancelacion, resolucion_novedad_cancelacion) 
				VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$reg = $conexion->prepare($sql);
		$reg->bindParam(1, $tipo_documento);
		$reg->bindParam(2, $numero_documento);
		$reg->bindParam(3, $nombres_apellidos);
		$reg->bindParam(4, $ficha);
		$reg->bindParam(5, $programa_formacion);
		$reg->bindParam(6, $inicio_ficha);
		$reg->bindParam(7, $fin_ficha);
		$reg->bindParam(8, $nivel_formacion);
		$reg->bindParam(9, $estado_aprendiz);
		$reg->bindParam(10, $apoyo_socioeconomico);
		$reg->bindParam(11, $estado_apoyo);
		$reg->bindParam(12, $inicio_apoyo);
		$reg->bindParam(13, $fin_apoyo);
		$reg->bindParam(14, $numero_resolucion_apoyo);
		$reg->bindParam(15, $nombre_novedad_suspension);
		$reg->bindParam(16, $motivo_suspension);
		$reg->bindParam(17, $fecha_novedad_suspension);
		$reg->bindParam(18, $nombre_registro_suspension);
		$reg->bindParam(19, $resolucion_novedad_suspension);
		$reg->bindParam(20, $nombre_novedad_reactivacion);
		$reg->bindParam(21, $motivo_reactivacion);
		$reg->bindParam(22, $fecha_novedad_reactivacion);
		$reg->bindParam(23, $nombre_registro_reactivacion);
		$reg->bindParam(24, $resolucion_novedad_reactivacion);
		$reg->bindParam(25, $nombre_novedad_cancelacion);
		$reg->bindParam(26, $motivo_cancelacion);
		$reg->bindParam(27, $fecha_novedad_cancelacion);
		$reg->bindParam(28, $nombre_registro_cancelacion);
		$reg->bindParam(29, $resolucion_novedad_cancelacion);
		if ($reg->execute() == TRUE) {
			echo 1;
		} else {
			echo 0;
		}
	} else if ($accion == 'modificar') {
		$codigo = $_POST['codigo'];
		$tipo_documento = $_POST['tipo_documento'];
		$numero_documento = $_POST['numero_documento'];
		$nombres_apellidos = $_POST['nombres_apellidos'];
		$ficha = $_POST['ficha'];
		$programa_formacion = $_POST['programa_formacion'];
		$inicio_ficha = $_POST['inicio_ficha'];
		$fin_ficha = $_POST['fin_ficha'];
		$nivel_formacion = $_POST['nivel_formacion'];
		$estado_aprendiz = $_POST['estado_aprendiz'];
		$apoyo_socioeconomico = $_POST['apoyo_socioeconomico'];
		$estado_apoyo = $_POST['estado_apoyo'];
		$inicio_apoyo = $_POST['inicio_apoyo'];
		$fin_apoyo = $_POST['fin_apoyo'];
		$numero_resolucion_apoyo = $_POST['numero_resolucion_apoyo'];
		$nombre_novedad_suspension = $_POST['nombre_novedad_suspension'];
		$motivo_suspension = $_POST['motivo_suspension'];
		$fecha_novedad_suspension = $_POST['fecha_novedad_suspension'];
		$nombre_registro_suspension = $_POST['nombre_registro_suspension'];
		$resolucion_novedad_suspension = $_POST['resolucion_novedad_suspension'];
		$nombre_novedad_reactivacion = $_POST['nombre_novedad_reactivacion'];
		$motivo_reactivacion = $_POST['motivo_reactivacion'];
		$fecha_novedad_reactivacion = $_POST['fecha_novedad_reactivacion'];
		$nombre_registro_reactivacion = $_POST['nombre_registro_reactivacion'];
		$resolucion_novedad_reactivacion = $_POST['resolucion_novedad_reactivacion'];
		$nombre_novedad_cancelacion = $_POST['nombre_novedad_cancelacion'];
		$motivo_cancelacion = $_POST['motivo_cancelacion'];
		$fecha_novedad_cancelacion = $_POST['fecha_novedad_cancelacion'];
		$nombre_registro_cancelacion = $_POST['nombre_registro_cancelacion'];
		$resolucion_novedad_cancelacion = $_POST['resolucion_novedad_cancelacion'];
		$sql = "UPDATE apoyos_socioeconomicos SET 
					   tipo_documento=:tipo_documento,
					   numero_documento=:numero_documento,
					   nombres_apellidos=:nombres_apellidos,
					   ficha=:ficha,
					   programa_formacion=:programa_formacion,
					   inicio_ficha=:inicio_ficha,
					   fin_ficha=:fin_ficha,
					   nivel_formacion=:nivel_formacion,
					   estado_aprendiz=:estado_aprendiz,
					   apoyo_socioeconomico=:apoyo_socioeconomico,
					   estado_apoyo=:estado_apoyo,
					   inicio_apoyo=:inicio_apoyo,
					   fin_apoyo=:fin_apoyo,
					   numero_resolucion_apoyo=:numero_resolucion_apoyo,
					   nombre_novedad_suspension=:nombre_novedad_suspension,
					   motivo_suspension=:motivo_suspension,
					   fecha_novedad_suspension=:fecha_novedad_suspension,
					   nombre_registro_suspension=:nombre_registro_suspension,
					   resolucion_novedad_suspension=:resolucion_novedad_suspension,
					   nombre_novedad_reactivacion=:nombre_novedad_reactivacion,
					   motivo_reactivacion=:motivo_reactivacion,
					   fecha_novedad_reactivacion=:fecha_novedad_reactivacion,
					   nombre_registro_reactivacion=:nombre_registro_reactivacion,
					   resolucion_novedad_reactivacion=:resolucion_novedad_reactivacion,
					   nombre_novedad_cancelacion=:nombre_novedad_cancelacion,
					   motivo_cancelacion=:motivo_cancelacion,
					   fecha_novedad_cancelacion=:fecha_novedad_cancelacion,
					   nombre_registro_cancelacion=:nombre_registro_cancelacion,
					   resolucion_novedad_cancelacion=:resolucion_novedad_cancelacion
				WHERE codigo = :codigo;";
		$reg = $conexion->prepare($sql);
		$reg->bindParam(":codigo", $codigo);
		$reg->bindParam(":tipo_documento", $tipo_documento);
		$reg->bindParam(":numero_documento", $numero_documento);
		$reg->bindParam(":nombres_apellidos", $nombres_apellidos);
		$reg->bindParam(":ficha", $ficha);
		$reg->bindParam(":programa_formacion", $programa_formacion);
		$reg->bindParam(":inicio_ficha", $inicio_ficha);
		$reg->bindParam(":fin_ficha", $fin_ficha);
		$reg->bindParam(":nivel_formacion", $nivel_formacion);
		$reg->bindParam(":estado_aprendiz", $estado_aprendiz);
		$reg->bindParam(":apoyo_socioeconomico", $apoyo_socioeconomico);
		$reg->bindParam(":estado_apoyo", $estado_apoyo);
		$reg->bindParam(":inicio_apoyo", $inicio_apoyo);
		$reg->bindParam(":fin_apoyo", $fin_apoyo);
		$reg->bindParam(":numero_resolucion_apoyo", $numero_resolucion_apoyo);
		$reg->bindParam(":nombre_novedad_suspension", $nombre_novedad_suspension);
		$reg->bindParam(":motivo_suspension", $motivo_suspension);
		$reg->bindParam(":fecha_novedad_suspension", $fecha_novedad_suspension);
		$reg->bindParam(":nombre_registro_suspension", $nombre_registro_suspension);
		$reg->bindParam(":resolucion_novedad_suspension", $resolucion_novedad_suspension);
		$reg->bindParam(":nombre_novedad_reactivacion", $nombre_novedad_reactivacion);
		$reg->bindParam(":motivo_reactivacion", $motivo_reactivacion);
		$reg->bindParam(":fecha_novedad_reactivacion", $fecha_novedad_reactivacion);
		$reg->bindParam(":nombre_registro_reactivacion", $nombre_registro_reactivacion);
		$reg->bindParam(":resolucion_novedad_reactivacion", $resolucion_novedad_reactivacion);
		$reg->bindParam(":nombre_novedad_cancelacion", $nombre_novedad_cancelacion);
		$reg->bindParam(":motivo_cancelacion", $motivo_cancelacion);
		$reg->bindParam(":fecha_novedad_cancelacion", $fecha_novedad_cancelacion);
		$reg->bindParam(":nombre_registro_cancelacion", $nombre_registro_cancelacion);
		$reg->bindParam(":resolucion_novedad_cancelacion", $resolucion_novedad_cancelacion);
		if ($reg->execute() == TRUE) {
			echo 1;
		} else {
			echo 0;
		}
	} else if ($accion == 'eliminar') {
		$codigo = $_POST['codigo'];
		$sql = "DELETE FROM apoyos_socioeconomicos WHERE codigo = :codigo;";
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
