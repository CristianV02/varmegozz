<?php
// require_once '../modelo/val-bienestar.php';
require_once '../exreader/Classes/PHPExcel/IOFactory.php';
require '../modelo/conexion.php';
// require '../modelo/datos-fichas.php';
// require '../modelo/dtgen.php';
// Instancias
$conexion = new Conexion();
// $mis_fichas = new misFichas();
// $datos = new datosDtgen();
extract($_POST);
if ($action == "upload") {
    $coor = $_POST['coordinacion'];
    $jorn = $_POST['jornada'];
    $ubic = $_POST['ubicacion'];
    $tpform = $_POST['tpformacion'];
    $archivo = $_FILES['excel']['name'];
    if (strpos($archivo, " ")) {
        $archivo = str_replace(" ", "_", $archivo);
    }
    $tipo = $_FILES['excel']['type'];
    $destino = "arcexcel/" . $archivo;
    if (copy($_FILES['excel']['tmp_name'], $destino)) {
        if (file_exists("arcexcel/" . $archivo)) {
            $objPHPExcel = PHPExcel_IOFactory::load("arcexcel/" . $archivo);
            $objPHPExcel->setActiveSheetIndex(0);
            $i = 6; // Fila en la que va a empezar a leer
            $fic = $objPHPExcel->getActiveSheet()->getCell("C2")->getValue();
            $fic = trim($fic);
            $pie = explode('-', $fic);
            $ficha = trim($pie[0]);
            $nomfic = trim($pie[1]);
            // Verificar si ya está registrado el programa
            $resFicha = $mis_fichas->viewFicha($ficha);
            if (count($resFicha) > 0) {
                echo "La ficha " . $ficha . " ya está creada.<br>";
            } else {
                $sql1 = "INSERT INTO programa (ficha, nombre, tpformacion, ubicacion, jornada, coordinacion) 
                         VALUES (?, ?, ?, ?, ?, ?)";
                $reg = $conexion->prepare($sql1);
                $reg->bindParam(1, $ficha);
                $reg->bindParam(2, $nomfic);
                $reg->bindParam(3, $tpform);
                $reg->bindParam(4, $ubic);
                $reg->bindParam(5, $jorn);
                $reg->bindParam(6, $coor);
                if ($reg->execute() === TRUE) {
                    echo "La ficha " . $ficha . " se ha registrado correctamente.<br>";
                } else {
                    echo "<br/>";
                    echo "\nPDO::errorInfo():\n";
                    print_r($reg->errorInfo());
                    echo "<br/>";
                    echo "ERROR, la ficha " . $ficha . " NO se ha registrado.<br>";
                }
            }
            $cant = 0;
            while ($objPHPExcel->getActiveSheet()->getCell("B" . $i)->getValue() != "") {
                $tpdoc = $objPHPExcel->getActiveSheet()->getCell("A" . $i)->getValue();
                $tpdoc = trim($tpdoc);
                $id = $objPHPExcel->getActiveSheet()->getCell("B" . $i)->getValue();
                $id = trim($id);
                $nom = $objPHPExcel->getActiveSheet()->getCell("C" . $i)->getValue();
                $nom = trim($nom);
                $ape = $objPHPExcel->getActiveSheet()->getCell("D" . $i)->getValue();
                $ape = trim($ape);
                $nombre = $nom . " " . $ape;
                $telf = $objPHPExcel->getActiveSheet()->getCell("E" . $i)->getValue();
                $telf = trim($telf);
                $cor = $objPHPExcel->getActiveSheet()->getCell("F" . $i)->getValue();
                $cor = trim($cor);
                $estap = $objPHPExcel->getActiveSheet()->getCell("G" . $i)->getValue();
                $estap = trim($estap);
                $rol = 3;
                $estado = 2;
                // Generar clave aleatoria
                $alea = $datos->genRanStr();
                // Validar si el estado del APRENDIZ es EN FORMACIÓN o INDUCCION
                if ($estap == "EN FORMACION" || $estap == "INDUCCION") {
                    $sql2 = "INSERT INTO aprendiz (tipo_doc, identificacion, nombre, ficha, rol, estado, estadoap, celular, correo, aleatorio) 
                             VALUE (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                    $regap = $conexion->prepare($sql2);
                    $regap->bindParam(1, $tpdoc);
                    $regap->bindParam(2, $id);
                    $regap->bindParam(3, $nombre);
                    $regap->bindParam(4, $ficha);
                    $regap->bindParam(5, $rol);
                    $regap->bindParam(6, $estado);
                    $regap->bindParam(7, $estap);
                    $regap->bindParam(8, $telf);
                    $regap->bindParam(9, $cor);
                    $regap->bindParam(10, $alea);
                    if ($regap->execute() === TRUE) {
                        $cant++;
                        echo "El aprendiz " . $id . " se ha registrado correctamente.<br>";
                    } else {
                        echo "ERROR, el aprendiz " . $id . " NO se ha registrado.<br>";
                    }
                }
                $i++;
            }
            echo "Se registraron: " . $cant . " aprendices.<br>";
        } else {
            echo '<script language = javascript>
                alert("El archivo no existe.")
                self.location = "cargaraprendicescesar.php"
                </script>';
        }
    } else {
        echo '<script language = javascript>
            alert("No sea podido cargar el archivo en el servidor.")
            self.location = "cargaraprendicescesar.php"
            </script>';
    }
}
