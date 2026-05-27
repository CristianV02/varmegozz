<?php
date_default_timezone_set("America/Bogota");
// require '../vendor/autoload.php';
require '../librerias/php/vendor/autoload.php';
require_once 'conexion.php';
require 'datos-apoyos.php';
// Instancias
$conexion = new Conexion();
$mis_apoyos = new misApoyos();

// use PhpOffice\PhpSpreadsheet\Shared\Date;
// use PhpOffice\PhpSpreadsheet\IOFactory;

extract($_POST);
if ($action == "upload") {
	if ($_POST["tipoDoc"] == 1) {
		# code...
		//Vaciar la tabla de destino de los datos
		$sql = "DELETE FROM apoyos_socioeconomicos";
		$del = $conexion->prepare($sql);
		if ($del->execute() == TRUE) {
			// Variables del formulario
			$archivo = $_FILES['excel']['name'];
			// Validadmos si llega un archivo
			if (strpos($archivo, " ")) {
				$archivo = str_replace(" ", "_", $archivo);
			}
			$tipo = $_FILES['excel']['type'];
			$destino = "arcexcel/" . $archivo;
			// $destinos = "arcexcels/" . $archivo;
			if (copy($_FILES['excel']['tmp_name'], $destino)) {
				if (file_exists("arcexcel/" . $archivo)) {
					$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load("arcexcel/" . $archivo);
					$date = new \PhpOffice\PhpSpreadsheet\Shared\Date();
					$sheet = $spreadsheet->getSheet(0);
					// $objPHPExcel = IOFactory::load("arcexcel/" . $archivo);
					//Cuenta el total de hojas que tiene el archivo.
					// $totalhojas = $objPHPExcel->getSheetCount();
					// $hojaActual = $objPHPExcel->getsheet(0);
					$i = 3; // Fila en la que va a empezar a leer
					$cant = 0;
?>
					<a href="../administrador/configuracion.php">
						<h1>Regresar</h1>
					</a>
			<?php
					$fin_ficha = "";
					$nivel_formacion = "";
					$estado_aprendiz = "";
					$apoyo_socioeconomico = "";
					$estado_apoyo = "";
					$inicio_apoyo = "";
					$fin_apoyo = "";
					$numero_resolucion_apoyo = "";
					$nombre_novedad_suspension = "";
					$motivo_suspension = "";
					$fecha_novedad_suspension = "";
					$nombre_registro_suspension = "";
					$resolucion_novedad_suspension = "";
					$nombre_novedad_reactivacion = "";
					$motivo_reactivacion = "";
					$fecha_novedad_reactivacion = "";
					$nombre_registro_reactivacion = "";
					$resolucion_novedad_reactivacion = "";
					$nombre_novedad_cancelacion = "";
					$motivo_cancelacion = "";
					$fecha_novedad_cancelacion = "";
					$nombre_registro_cancelacion = "";
					$resolucion_novedad_cancelacion = "";

					while ($sheet->getCell("A" . $i)->getValue() != "") {
						$tipo_documento = $sheet->getCell("B" . $i)->getValue();
						$tipo_documento = trim($tipo_documento);
						// $tipo_documento = "hola";
						$numero_documento = $sheet->getCell("C" . $i)->getValue();
						$numero_documento = trim($numero_documento);
						$nombres_apellidos = $sheet->getCell("D" . $i)->getValue();
						$nombres_apellidos = trim($nombres_apellidos);
						$ficha = $sheet->getCell("E" . $i)->getValue();
						$ficha = trim($ficha);
						$programa_formacion = $sheet->getCell("F" . $i)->getValue();
						$programa_formacion = trim($programa_formacion);
						$inicio_ficha = $sheet->getCell("G" . $i)->getValue();
						$inicio_ficha = $date->excelToDateTimeObject($inicio_ficha)->format('Y-m-d');
						$fin_ficha = $sheet->getCell("H" . $i)->getValue();
						$fin_ficha = $date->excelToDateTimeObject($fin_ficha)->format('Y-m-d');
						$nivel_formacion = $sheet->getCell("I" . $i)->getValue();
						$nivel_formacion = trim($nivel_formacion);
						$estado_aprendiz = $sheet->getCell("J" . $i)->getValue();
						$estado_aprendiz = trim($estado_aprendiz);
						$apoyo_socioeconomico = $sheet->getCell("K" . $i)->getValue();
						$apoyo_socioeconomico = trim($apoyo_socioeconomico);
						$estado_apoyo = $sheet->getCell("L" . $i)->getValue();
						$estado_apoyo = trim($estado_apoyo);
						$inicio_apoyo = $sheet->getCell("M" . $i)->getValue();
						$inicio_apoyo = $date->excelToDateTimeObject($inicio_apoyo)->format('Y-m-d');
						$fin_apoyo = $sheet->getCell("N" . $i)->getValue();
						$fin_apoyo = $date->excelToDateTimeObject($fin_apoyo)->format('Y-m-d');
						/* Valores vacios en excel, no los voy a tomar en cuenta */
						$numero_resolucion_apoyo = $sheet->getCell("O" . $i)->getValue();
						$numero_resolucion_apoyo = trim($numero_resolucion_apoyo);
						$nombre_novedad_suspension = $sheet->getCell("P" . $i)->getValue();
						$nombre_novedad_suspension = trim($nombre_novedad_suspension);
						$motivo_suspension = $sheet->getCell("Q" . $i)->getValue();
						$motivo_suspension = trim($motivo_suspension);
						$fecha_novedad_suspension = $sheet->getCell("R" . $i)->getValue();
						$fecha_novedad_suspension = $date->excelToDateTimeObject($fecha_novedad_suspension)->format('Y-m-d');
						// $fecha_novedad_suspension = trim($fecha_novedad_suspension);
						// if ($fecha_novedad_suspension == "") {
						//     $fecha_novedad_suspension = null;
						// } else {
						//     $fecha_novedad_suspension = Date::excelToDateTimeObject($fecha_novedad_suspension)->format('Y-m-d');
						// }
						$nombre_registro_suspension = $sheet->getCell("S" . $i)->getValue();
						$nombre_registro_suspension = trim($nombre_registro_suspension);
						$resolucion_novedad_suspension = $sheet->getCell("T" . $i)->getValue();
						$resolucion_novedad_suspension = trim($resolucion_novedad_suspension);
						$nombre_novedad_reactivacion = $sheet->getCell("U" . $i)->getValue();
						$nombre_novedad_reactivacion = trim($nombre_novedad_reactivacion);
						$motivo_reactivacion = $sheet->getCell("V" . $i)->getValue();
						$motivo_reactivacion = trim($motivo_reactivacion);
						$fecha_novedad_reactivacion = $sheet->getCell("W" . $i)->getValue();
						$fecha_novedad_reactivacion = $date->excelToDateTimeObject($fecha_novedad_reactivacion)->format('Y-m-d');
						// $fecha_novedad_reactivacion = trim($fecha_novedad_reactivacion);
						// if ($fecha_novedad_reactivacion == "") {
						//     $fecha_novedad_reactivacion = null;
						// } else {
						//     $fecha_novedad_reactivacion = Date::excelToDateTimeObject($fecha_novedad_reactivacion)->format('Y-m-d');
						// }
						$nombre_registro_reactivacion = $sheet->getCell("X" . $i)->getValue();
						$nombre_registro_reactivacion = trim($nombre_registro_reactivacion);
						$resolucion_novedad_reactivacion = $sheet->getCell("Y" . $i)->getValue();
						$resolucion_novedad_reactivacion = trim($resolucion_novedad_reactivacion);
						/* Valores vacios en excel, no los voy a tomar en cuenta */
						$nombre_novedad_cancelacion = $sheet->getCell("Z" . $i)->getValue();
						$nombre_novedad_cancelacion = trim($nombre_novedad_cancelacion);
						$motivo_cancelacion = $sheet->getCell("AA" . $i)->getValue();
						$motivo_cancelacion = trim($motivo_cancelacion);
						$fecha_novedad_cancelacion = $sheet->getCell("AB" . $i)->getValue();
						$fecha_novedad_cancelacion = $date->excelToDateTimeObject($fecha_novedad_cancelacion)->format('Y-m-d');
						$nombre_registro_cancelacion = $sheet->getCell("AC" . $i)->getValue();
						$nombre_registro_cancelacion = trim($nombre_registro_cancelacion);
						$resolucion_novedad_cancelacion = $sheet->getCell("AD" . $i)->getValue();
						$resolucion_novedad_cancelacion = trim($resolucion_novedad_cancelacion);
						//Valor máximo
						$codigo = $mis_apoyos->maxApoyos();
						//Subir los datos a la BD
						$sql = "INSERT INTO apoyos_socioeconomicos (codigo, tipo_documento, numero_documento, nombres_apellidos, ficha, programa_formacion, inicio_ficha, fin_ficha, nivel_formacion, estado_aprendiz, apoyo_socioeconomico, estado_apoyo, inicio_apoyo, fin_apoyo, numero_resolucion_apoyo, nombre_novedad_suspension, motivo_suspension, fecha_novedad_suspension, nombre_registro_suspension, resolucion_novedad_suspension, nombre_novedad_reactivacion, motivo_reactivacion, fecha_novedad_reactivacion, nombre_registro_reactivacion, resolucion_novedad_reactivacion, nombre_novedad_cancelacion, motivo_cancelacion, fecha_novedad_cancelacion, nombre_registro_cancelacion, resolucion_novedad_cancelacion) 
                            VALUE (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
						$regap = $conexion->prepare($sql);
						$regap->bindParam(1, $codigo);
						$regap->bindParam(2, $tipo_documento);
						$regap->bindParam(3, $numero_documento);
						$regap->bindParam(4, $nombres_apellidos);
						$regap->bindParam(5, $ficha);
						$regap->bindParam(6, $programa_formacion);
						$regap->bindParam(7, $inicio_ficha);
						$regap->bindParam(8, $fin_ficha);
						$regap->bindParam(9, $nivel_formacion);
						$regap->bindParam(10, $estado_aprendiz);
						$regap->bindParam(11, $apoyo_socioeconomico);
						$regap->bindParam(12, $estado_apoyo);
						$regap->bindParam(13, $inicio_apoyo);
						$regap->bindParam(14, $fin_apoyo);
						$regap->bindParam(15, $numero_resolucion_apoyo);
						$regap->bindParam(16, $nombre_novedad_suspension);
						$regap->bindParam(17, $motivo_suspension);
						$regap->bindParam(18, $fecha_novedad_suspension);
						$regap->bindParam(19, $nombre_registro_suspension);
						$regap->bindParam(20, $resolucion_novedad_suspension);
						$regap->bindParam(21, $nombre_novedad_reactivacion);
						$regap->bindParam(22, $motivo_reactivacion);
						$regap->bindParam(23, $fecha_novedad_reactivacion);
						$regap->bindParam(24, $nombre_registro_reactivacion);
						$regap->bindParam(25, $resolucion_novedad_reactivacion);
						$regap->bindParam(26, $nombre_novedad_cancelacion);
						$regap->bindParam(27, $motivo_cancelacion);
						$regap->bindParam(28, $fecha_novedad_cancelacion);
						$regap->bindParam(29, $nombre_registro_cancelacion);
						$regap->bindParam(30, $resolucion_novedad_cancelacion);
						if ($regap->execute() === TRUE) {
							$cant++;
							echo "El dato " . $codigo . " se ha registrado correctamente.<br>";
						} else {
							echo "ERROR, el dato " . $codigo . " NO se ha registrado.<br>";
						}
						$i++;
					}
				}
			}
			?>
			<a href="../administrador/configuracion.php">
				<h1>Regresar</h1>
			</a>
<?php
		} else {
			echo "Error... No se pudieron eliminar los archivos.";
		}
	} else {
		/* 
		* TODO: Codigo incompleto
		*
		*
		*
		*
		*/
		
		# code...
		//Vaciar la tabla de destino de los datos
		$sql = "DELETE FROM coordinaciones";
		$del = $conexion->prepare($sql);
		if ($del->execute() == TRUE) {
			// Variables del formulario
			$archivo = $_FILES['excel']['name'];
			// Validadmos si llega un archivo
			if (strpos($archivo, " ")) {
				$archivo = str_replace(" ", "_", $archivo);
			}
			$tipo = $_FILES['excel']['type'];
			$destino = "arcexcel/" . $archivo;
			// $destinos = "arcexcels/" . $archivo;
			if (copy($_FILES['excel']['tmp_name'], $destino)) {
				if (file_exists("arcexcel/" . $archivo)) {
					$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load("arcexcel/" . $archivo);
					$date = new \PhpOffice\PhpSpreadsheet\Shared\Date();
					$sheet = $spreadsheet->getSheet(0);
					// $objPHPExcel = IOFactory::load("arcexcel/" . $archivo);
					//Cuenta el total de hojas que tiene el archivo.
					// $totalhojas = $objPHPExcel->getSheetCount();
					// $hojaActual = $objPHPExcel->getsheet(0);
					$i = 3; // Fila en la que va a empezar a leer
					$cant = 0;
?>
					<a href="../administrador/configuracion.php">
						<h1>Regresar</h1>
					</a>
			<?php
					$fin_ficha = "";
					$nivel_formacion = "";
					$estado_aprendiz = "";
					$apoyo_socioeconomico = "";
					$estado_apoyo = "";
					$inicio_apoyo = "";
					$fin_apoyo = "";
					$numero_resolucion_apoyo = "";
					$nombre_novedad_suspension = "";
					$motivo_suspension = "";
					$fecha_novedad_suspension = "";
					$nombre_registro_suspension = "";
					$resolucion_novedad_suspension = "";
					$nombre_novedad_reactivacion = "";
					$motivo_reactivacion = "";
					$fecha_novedad_reactivacion = "";
					$nombre_registro_reactivacion = "";
					$resolucion_novedad_reactivacion = "";
					$nombre_novedad_cancelacion = "";
					$motivo_cancelacion = "";
					$fecha_novedad_cancelacion = "";
					$nombre_registro_cancelacion = "";
					$resolucion_novedad_cancelacion = "";

					while ($sheet->getCell("A" . $i)->getValue() != "") {
						$tipo_documento = $sheet->getCell("B" . $i)->getValue();
						$tipo_documento = trim($tipo_documento);
						// $tipo_documento = "hola";
						$numero_documento = $sheet->getCell("C" . $i)->getValue();
						$numero_documento = trim($numero_documento);
						$nombres_apellidos = $sheet->getCell("D" . $i)->getValue();
						$nombres_apellidos = trim($nombres_apellidos);
						$ficha = $sheet->getCell("E" . $i)->getValue();
						$ficha = trim($ficha);
						$programa_formacion = $sheet->getCell("F" . $i)->getValue();
						$programa_formacion = trim($programa_formacion);
						$inicio_ficha = $sheet->getCell("G" . $i)->getValue();
						$inicio_ficha = $date->excelToDateTimeObject($inicio_ficha)->format('Y-m-d');
						$fin_ficha = $sheet->getCell("H" . $i)->getValue();
						$fin_ficha = $date->excelToDateTimeObject($fin_ficha)->format('Y-m-d');
						$nivel_formacion = $sheet->getCell("I" . $i)->getValue();
						$nivel_formacion = trim($nivel_formacion);
						$estado_aprendiz = $sheet->getCell("J" . $i)->getValue();
						$estado_aprendiz = trim($estado_aprendiz);
						$apoyo_socioeconomico = $sheet->getCell("K" . $i)->getValue();
						$apoyo_socioeconomico = trim($apoyo_socioeconomico);
						$estado_apoyo = $sheet->getCell("L" . $i)->getValue();
						$estado_apoyo = trim($estado_apoyo);
						$inicio_apoyo = $sheet->getCell("M" . $i)->getValue();
						$inicio_apoyo = $date->excelToDateTimeObject($inicio_apoyo)->format('Y-m-d');
						$fin_apoyo = $sheet->getCell("N" . $i)->getValue();
						$fin_apoyo = $date->excelToDateTimeObject($fin_apoyo)->format('Y-m-d');
						/* Valores vacios en excel, no los voy a tomar en cuenta */
						// $numero_resolucion_apoyo = $sheet->getCell("O" . $i)->getValue();
						// $numero_resolucion_apoyo = trim($numero_resolucion_apoyo);
						// $nombre_novedad_suspension = $sheet->getCell("P" . $i)->getValue();
						// $nombre_novedad_suspension = trim($nombre_novedad_suspension);
						// $motivo_suspension = $sheet->getCell("Q" . $i)->getValue();
						// $motivo_suspension = trim($motivo_suspension);
						// $fecha_novedad_suspension = $sheet->getCell("R" . $i)->getValue();
						// $fecha_novedad_suspension = trim($fecha_novedad_suspension);
						// if ($fecha_novedad_suspension == "") {
						//     $fecha_novedad_suspension = null;
						// } else {
						//     $fecha_novedad_suspension = Date::excelToDateTimeObject($fecha_novedad_suspension)->format('Y-m-d');
						// }
						// $nombre_registro_suspension = $sheet->getCell("S" . $i)->getValue();
						// $nombre_registro_suspension = trim($nombre_registro_suspension);
						// $resolucion_novedad_suspension = $sheet->getCell("T" . $i)->getValue();
						// $resolucion_novedad_suspension = trim($resolucion_novedad_suspension);
						// $nombre_novedad_reactivacion = $sheet->getCell("U" . $i)->getValue();
						// $nombre_novedad_reactivacion = trim($nombre_novedad_reactivacion);
						// $motivo_reactivacion = $sheet->getCell("V" . $i)->getValue();
						// $motivo_reactivacion = trim($motivo_reactivacion);
						// $fecha_novedad_reactivacion = $sheet->getCell("W" . $i)->getValue();
						// $fecha_novedad_reactivacion = trim($fecha_novedad_reactivacion);
						// if ($fecha_novedad_reactivacion == "") {
						//     $fecha_novedad_reactivacion = null;
						// } else {
						//     $fecha_novedad_reactivacion = Date::excelToDateTimeObject($fecha_novedad_reactivacion)->format('Y-m-d');
						// }
						// $nombre_registro_reactivacion = $sheet->getCell("X" . $i)->getValue();
						// $nombre_registro_reactivacion = trim($nombre_registro_reactivacion);
						// $resolucion_novedad_reactivacion = $sheet->getCell("Y" . $i)->getValue();
						// $resolucion_novedad_reactivacion = trim($resolucion_novedad_reactivacion);
						/* Valores vacios en excel, no los voy a tomar en cuenta */
						$nombre_novedad_cancelacion = $sheet->getCell("Z" . $i)->getValue();
						$nombre_novedad_cancelacion = trim($nombre_novedad_cancelacion);
						$motivo_cancelacion = $sheet->getCell("AA" . $i)->getValue();
						$motivo_cancelacion = trim($motivo_cancelacion);
						$fecha_novedad_cancelacion = $sheet->getCell("AB" . $i)->getValue();
						$fecha_novedad_cancelacion = $date->excelToDateTimeObject($fecha_novedad_cancelacion)->format('Y-m-d');
						$nombre_registro_cancelacion = $sheet->getCell("AC" . $i)->getValue();
						$nombre_registro_cancelacion = trim($nombre_registro_cancelacion);
						$resolucion_novedad_cancelacion = $sheet->getCell("AD" . $i)->getValue();
						$resolucion_novedad_cancelacion = trim($resolucion_novedad_cancelacion);
						//Valor máximo
						$codigo = $mis_apoyos->maxApoyos();
						//Subir los datos a la BD
						$sql = "INSERT INTO apoyos_socioeconomicos (codigo, tipo_documento, numero_documento, nombres_apellidos, ficha, programa_formacion, inicio_ficha, fin_ficha, nivel_formacion, estado_aprendiz, apoyo_socioeconomico, estado_apoyo, inicio_apoyo, fin_apoyo, numero_resolucion_apoyo, nombre_novedad_suspension, motivo_suspension, fecha_novedad_suspension, nombre_registro_suspension, resolucion_novedad_suspension, nombre_novedad_reactivacion, motivo_reactivacion, fecha_novedad_reactivacion, nombre_registro_reactivacion, resolucion_novedad_reactivacion, nombre_novedad_cancelacion, motivo_cancelacion, fecha_novedad_cancelacion, nombre_registro_cancelacion, resolucion_novedad_cancelacion) 
                            VALUE (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
						$regap = $conexion->prepare($sql);
						$regap->bindParam(1, $codigo);
						$regap->bindParam(2, $tipo_documento);
						$regap->bindParam(3, $numero_documento);
						$regap->bindParam(4, $nombres_apellidos);
						$regap->bindParam(5, $ficha);
						$regap->bindParam(6, $programa_formacion);
						$regap->bindParam(7, $inicio_ficha);
						$regap->bindParam(8, $fin_ficha);
						$regap->bindParam(9, $nivel_formacion);
						$regap->bindParam(10, $estado_aprendiz);
						$regap->bindParam(11, $apoyo_socioeconomico);
						$regap->bindParam(12, $estado_apoyo);
						$regap->bindParam(13, $inicio_apoyo);
						$regap->bindParam(14, $fin_apoyo);
						$regap->bindParam(15, $numero_resolucion_apoyo);
						$regap->bindParam(16, $nombre_novedad_suspension);
						$regap->bindParam(17, $motivo_suspension);
						$regap->bindParam(18, $fecha_novedad_suspension);
						$regap->bindParam(19, $nombre_registro_suspension);
						$regap->bindParam(20, $resolucion_novedad_suspension);
						$regap->bindParam(21, $nombre_novedad_reactivacion);
						$regap->bindParam(22, $motivo_reactivacion);
						$regap->bindParam(23, $fecha_novedad_reactivacion);
						$regap->bindParam(24, $nombre_registro_reactivacion);
						$regap->bindParam(25, $resolucion_novedad_reactivacion);
						$regap->bindParam(26, $nombre_novedad_cancelacion);
						$regap->bindParam(27, $motivo_cancelacion);
						$regap->bindParam(28, $fecha_novedad_cancelacion);
						$regap->bindParam(29, $nombre_registro_cancelacion);
						$regap->bindParam(30, $resolucion_novedad_cancelacion);
						if ($regap->execute() === TRUE) {
							$cant++;
							echo "El dato " . $codigo . " se ha registrado correctamente.<br>";
						} else {
							echo "ERROR, el dato " . $codigo . " NO se ha registrado.<br>";
						}
						$i++;
					}
				}
			}
			?>
			<a href="../administrador/configuracion.php">
				<h1>Regresar</h1>
			</a>
<?php
		} else {
			echo "Error... No se pudieron eliminar los archivos.";
		}
	}
}
