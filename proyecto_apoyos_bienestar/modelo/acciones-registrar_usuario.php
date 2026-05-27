<?php
session_start();
date_default_timezone_set("America/Bogota");
require_once("conexion.php");
$conn = new Conexion();

$tipo_documento=$_POST['tipo_documento'];
$numero_documento=$_POST['numero_documento'];
$nombre=$_POST['nombre'];
$usuario=$_POST['email'];
$contrasena=$_POST['numero_documento'];
$email=$_POST['email'];
$rol_id=$_POST['rol_id'];

$consulta = "SELECT * FROM productores WHERE identificacion = '".$idp."'";
$sentencia = $conn->prepare($consulta);
$sentencia->execute();
$total = $sentencia->rowCount();

$sql = "SELECT MAX(cod) AS tot FROM solicitud";
$sent = $conn->prepare($sql);
$sent->execute();
$data = $sent->fetch(PDO::FETCH_ASSOC);
$codsol = $data['tot'];
$codsol++;

if($total > 0) {
    $fila = $sentencia->fetch(PDO::FETCH_ASSOC);
    $sql = "INSERT INTO solicitud (cod, identificacion, contacto, productor, problema, fecha, usuario, estado) VALUES (?,?,?,?,?,?,?,?)";
    $insertar = $conn->prepare($sql);
    $insertar->bindParam(1, $codsol);
    $insertar->bindParam(2, $idp);
    $insertar->bindParam(3, $contacto);
    $insertar->bindParam(4, $fila['razon_social']);
    $insertar->bindParam(5, $problema);
    $insertar->bindParam(6, $fecha);
    $insertar->bindParam(7, $idu);
    $insertar->bindParam(8, $estado);
    if ($insertar->execute() === TRUE) {
        echo '<script language = javascript> 
        alert("La solicitud se registró correctamente.")
        self.location="../index.php?num='.$cod.'" 
        </script>';
    }
    else {
        echo "Error updating record: " . $conn->error;
        echo '<script language = javascript> 
        alert("ERROR... al registrar la solicitud.") 
        window.history.back()
        </script>';
    }
}
else{
    $conprod = "SELECT MAX(cod) AS tot FROM productor";
    $sentprod = $conn->prepare($conprod);
    $sentprod->execute();
    $data = $sentprod->fetch(PDO::FETCH_ASSOC);
    $codprod = $data['tot'];
    $codprod++;

    $sqlpro = "INSERT INTO productor (cod, identificacion, usuario, contrasena, contacto, razon_social, ubicacion, telefono, segmento)
                VALUES ('".$codprod."', '".$idp."', '".$idp."', '".$idp."', '".$contacto."', '".$razon_social."', '".$ubicacion."', '".$telefono."', '".$segmento."')";
    $sqlsol = "INSERT INTO solicitud (cod, identificacion, contacto, productor, problema, fecha, usuario, estado)
                VALUES ('".$codsol."', '".$idp."', '".$contacto."', '".$razon_social."', '".$problema."', '".$fecha."', '".$idu."', '".$estado."')";

    $productor = $conn->prepare($sqlpro);
    $solicitud = $conn->prepare($sqlsol);

    if ($productor->execute() === TRUE) {
        if ($solicitud->execute() === true) {
            echo '<script language = javascript> 
            alert("La solicitud se registró correctamente.")
            self.location="../index.php?num='.$cod.'" 
            </script>';
        }
        else{
            echo "Error updating record: " . $conn->error;
            echo '<script language = javascript> 
            alert("ERROR... al registrar la solicitud.") 
            window.history.back()
            </script>';
        }
    }
    else {
        echo "Error actualizar el registro: " . $conn->error;
        echo '<script language = javascript> 
        alert("ERROR... al registrar el productor.") 
        window.history.back()
        </script>';
    }
}
$conn=null;