<?php
date_default_timezone_set("America/Bogota");
require_once 'conexion.php';
$conexion = new Conexion();
if (isset($_GET['accion'])) {
	$accion = $_GET['accion'];
	if ($accion == 'registrar') {
		$coordinador = $_POST['coordinador'];
		$padrino_bienestar = $_POST['padrino_bienestar'];
		$ficha = $_POST['ficha'];
		// $tipoOferta = $_POST['tipoOferta'];
		$modalidad = $_POST['modalidad'];
		$etapaFicha = $_POST['etapaFicha'];
		$nivelFormacion = $_POST['nivelFormacion'];
		$programa_formacion = $_POST['programa_formacion'];
		$fechaInicio = $_POST['fechaInicio'];
		$fechaFin = $_POST['fechaFin'];
		$municipio = $_POST['municipio'];
		$instructor = $_POST['instructor'];
		$movilInstructor = $_POST['movilInstructor'];
		$sede = $_POST['sede'];
		$ambiente = $_POST['ambiente'];
		$jornada = $_POST['jornada'];
		$horario = $_POST['horario'];
		$lider_vocero = $_POST['lider_vocero'];
		$celular = $_POST['celular'];
		$correo = $_POST['correo'];
		$sql = "INSERT INTO coordinaciones (coordinador, padrino_bienestar, ficha, modalidad, etapaFicha, nivelFormacion, programa_formacion, fechaInicio, fechaFin,  municipio, instructor, movilInstructor, sede, ambiente, jornada, horario, lider_vocero, celular, correo) 
				VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$reg = $conexion->prepare($sql);
		$reg->bindParam(1, $coordinador);
		$reg->bindParam(2, $padrino_bienestar);
		$reg->bindParam(3, $ficha);
		// $reg->bindParam(4, $tipoOferta);
		$reg->bindParam(4, $modalidad);
		$reg->bindParam(5, $etapaFicha);
		$reg->bindParam(6, $nivelFormacion);
		$reg->bindParam(7, $programa_formacion);
		$reg->bindParam(8, $fechaInicio);
		$reg->bindParam(9, $fechaFin);
		$reg->bindParam(10, $municipio);
		$reg->bindParam(11, $instructor);
		$reg->bindParam(12, $movilInstructor);
		$reg->bindParam(13, $sede);
		$reg->bindParam(14, $ambiente);
		$reg->bindParam(15, $jornada);
		$reg->bindParam(16, $horario);
		$reg->bindParam(17, $lider_vocero);
		$reg->bindParam(18, $celular);
		$reg->bindParam(19, $correo);
		if ($reg->execute() == TRUE) {
			echo 1;
		} else {
			echo 0;
		}
	} else if ($accion == 'modificar') {
		$cod_coordinaciones = $_POST['cod_coordinaciones'];
		$coordinador = $_POST['coordinador'];
		$padrino_bienestar = $_POST['padrino_bienestar'];
		$ficha = $_POST['ficha'];
		// $tipoOferta = $_POST['tipoOferta'];
		$modalidad = $_POST['modalidad'];
		$etapaFicha = $_POST['etapaFicha'];
		$nivelFormacion = $_POST['nivelFormacion'];
		$programa_formacion = $_POST['programa_formacion'];
		$fechaInicio = $_POST['fechaInicio'];
		$fechaFin = $_POST['fechaFin'];
		$municipio = $_POST['municipio'];
		$instructor = $_POST['instructor'];
		$movilInstructor = $_POST['movilInstructor'];
		$sede = $_POST['sede'];
		$ambiente = $_POST['ambiente'];
		$jornada = $_POST['jornada'];
		$horario = $_POST['horario'];
		$lider_vocero = $_POST['lider_vocero'];
		$celular = $_POST['celular'];
		$correo = $_POST['correo'];

		$sql = "UPDATE coordinaciones SET 
					   coordinador=:coordinador,
					   padrino_bienestar=:padrino_bienestar,
					   ficha=:ficha,
					--    tipoOferta=:tipoOferta,
					   modalidad=:modalidad,
					   etapaFicha=:etapaFicha,
					   nivelFormacion=:nivelFormacion,
					   programa_formacion=:programa_formacion,
					   fechaInicio=:fechaInicio,
					   fechaFin=:fechaFin,
					   municipio=:municipio,
					   instructor=:instructor,
					   movilInstructor=:movilInstructor,
					   sede=:sede,
					   ambiente=:ambiente,
					   jornada=:jornada,
					   horario=:horario,
					   lider_vocero=:lider_vocero,
					   celular=:celular,
					   correo=:correo
				WHERE cod_coordinaciones = :cod_coordinaciones;";

		$reg = $conexion->prepare($sql);
		$reg->bindParam(":cod_coordinaciones", $cod_coordinaciones);
		$reg->bindParam(":coordinador", $coordinador);
		$reg->bindParam(":padrino_bienestar", $padrino_bienestar);
		$reg->bindParam(":ficha", $ficha);
		// $reg->bindParam(":tipoOferta", $tipoOferta);
		$reg->bindParam(":modalidad", $modalidad);
		$reg->bindParam(":etapaFicha", $etapaFicha);
		$reg->bindParam(":nivelFormacion", $nivelFormacion);
		$reg->bindParam(":programa_formacion", $programa_formacion);
		$reg->bindParam(":fechaInicio", $fechaInicio);
		$reg->bindParam(":fechaFin", $fechaFin);
		$reg->bindParam(":municipio", $municipio);
		$reg->bindParam(":instructor", $instructor);
		$reg->bindParam(":movilInstructor", $movilInstructor);
		$reg->bindParam(":sede", $sede);
		$reg->bindParam(":ambiente", $ambiente);
		$reg->bindParam(":jornada", $jornada);
		$reg->bindParam(":horario", $horario);
		$reg->bindParam(":lider_vocero", $lider_vocero);
		$reg->bindParam(":celular", $celular);
		$reg->bindParam(":correo", $correo);
		if ($reg->execute() == TRUE) {
			echo 1;
		} else {
			echo 0;
		}
	} else if ($accion == 'eliminar') {
		$cod_coordinaciones = $_POST['cod_coordinaciones'];
		$sql = "DELETE FROM coordinaciones WHERE cod_coordinaciones = :cod_coordinaciones;";
		$del = $conexion->prepare($sql);
		$del->bindParam(":cod_coordinaciones", $cod_coordinaciones);
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
