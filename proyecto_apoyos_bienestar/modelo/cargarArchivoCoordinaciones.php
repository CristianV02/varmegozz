<?php
date_default_timezone_set("America/Bogota");
require '../vendor/autoload.php';
require_once 'conexion.php';
require 'datos-coordinaciones.php';
// Instancias
$conexion = new Conexion();
$mis_coordinaciones = new misCoordinaciones();

use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\IOFactory;


extract($_POST);
if ($action == "upload") {
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
        if (copy($_FILES['excel']['tmp_name'], $destino)) {
            if (file_exists("arcexcel/" . $archivo)) {
                $objPHPExcel = PHPExcel_IOFactory::load("arcexcel/" . $archivo);
                // $objPHPExcel = IOFactory::load("arcexcel/" . $archivo);
                //Cuenta el total de hojas que tiene el archivo.
                $totalhojas = $objPHPExcel->getSheetCount();

                $hojaActual = $objPHPExcel->getsheet(0);
                $i = 2; // Fila en la que va a empezar a leer
                $cant = 0;
?>
                <a href="../administrador/configuracion.php">
                    <h1>Regresar</h1>
                </a>
        <?php
                while ($objPHPExcel->getActiveSheet()->getCell("A" . $i)->getValue() != "") {
                    $cod_coordinaciones = $objPHPExcel->getActiveSheet()->getCell("A" . $i)->getValue();
                    $cod_coordinaciones = trim($cod_coordinaciones);
                    $coordinador = $objPHPExcel->getActiveSheet()->getCell("B" . $i)->getValue();
                    $coordinador = trim($coordinador);
                    $ficha = $objPHPExcel->getActiveSheet()->getCell("C" . $i)->getValue();
                    $ficha = trim($ficha);
                    $programa_formacion = $objPHPExcel->getActiveSheet()->getCell("D" . $i)->getValue();
                    $programa_formacion = trim($programa_formacion);
                    $instructor = $objPHPExcel->getActiveSheet()->getCell("E" . $i)->getValue();
                    $instructor = trim($instructor);
                    $anho = $objPHPExcel->getActiveSheet()->getCell("F" . $i)->getValue();
                    $anho = trim($anho);
                    $lider_vocero = $objPHPExcel->getActiveSheet()->getCell("G" . $i)->getValue();
                    $lider_vocero = trim($lider_vocero);
                    $celular = $objPHPExcel->getActiveSheet()->getCell("H" . $i)->getValue();
                    $celular = trim($celular);
                    $correo = $objPHPExcel->getActiveSheet()->getCell("I" . $i)->getValue();
                    $correo = trim($correo);
                    //Valor máximo
                    $cod_coordinaciones = $mis_coordinaciones->maxCoordinaciones();
                    //Subir los datos a la BD
                    $sql = "INSERT INTO coordinaciones (cod_coordinaciones, coordinador, ficha, programa_formacion, instructor, anho, lider_vocero, celular, correo) 
                            VALUE (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                    $regap = $conexion->prepare($sql);
                    $regap->bindParam(1, $cod_coordinaciones);
                    $regap->bindParam(2, $coordinador);
                    $regap->bindParam(3, $ficha);
                    $regap->bindParam(4, $programa_formacion);
                    $regap->bindParam(5, $instructor);
                    $regap->bindParam(6, $anho);
                    $regap->bindParam(7, $lider_vocero);
                    $regap->bindParam(8, $celular);
                    $regap->bindParam(9, $correo);
                    if ($regap->execute() === TRUE) {
                        $cant++;
                        echo "El dato " . $cod_coordinaciones . " se ha registrado correctamente.<br>";
                    } else {
                        echo "ERROR, el dato " . $cod_coordinaciones . " NO se ha registrado.<br>";
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
