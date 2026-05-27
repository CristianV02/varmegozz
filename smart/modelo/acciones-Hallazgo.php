<?php
date_default_timezone_set("America/Bogota");
require_once 'conexion.php';
$conexion = new Conexion();
if (isset($_GET['accion'])) {
    $accion = $_GET['accion'];
    if ($accion == 'registrar') {
        $donde_se_encuentra = $_POST['donde_se_encuentra'];
        $descripcion = $_POST['descripcion'];
        $mejora = $_POST['mejora'];
        $fotos = $_POST['fotos'];
        $identificaciones_cliente = $_POST['identificaciones_cliente'];

        $sql = "INSERT INTO hallazgos (donde_se_encuentra, descripcion, mejora, fotos, identificaciones_cliente) 
				VALUES (?, ?, ?, ?, ?)";

        $reg = $conexion->prepare($sql);
        $reg->bindParam(1, $donde_se_encuentra);
        $reg->bindParam(2, $descripcion);
        $reg->bindParam(3, $mejora);
        $reg->bindParam(4, $fotos);
        $reg->bindParam(5, $identificaciones_cliente);

        if ($reg->execute() == TRUE) {
            echo 1;
        } else {
            echo 0;
        }
    } else if ($accion == 'modificar') {
        $codigo = $_POST['codigo'];
        $donde_se_encuentra = $_POST['donde_se_encuentra'];
        $descripcion = $_POST['descripcion'];
        $mejora = $_POST['mejora'];
        $fotos = $_POST['fotos'];
        $identificaciones_cliente = $_POST['identificaciones_cliente'];

        $sql = "UPDATE hallazgos SET 
					   donde_se_encuentra=:donde_se_encuentra,
					   descripcion=:descripcion,
					   mejora=:mejora,
                       fotos=:fotos,
                       identificaciones_cliente=:identificaciones_cliente
				WHERE codigo =:codigo;";

        $reg = $conexion->prepare($sql);
        $reg->bindParam(':codigo', $codigo);
        $reg->bindParam(':donde_se_encuentra', $donde_se_encuentra);
        $reg->bindParam(":descripcion", $descripcion);
        $reg->bindParam(":mejora", $mejora);
        $reg->bindParam(":fotos", $fotos);
        $reg->bindParam(":identificaciones_cliente", $identificaciones_cliente);

        if ($reg->execute() == TRUE) {
            echo 1;
        } else {
            echo 0;
        }
    } else if ($accion == 'eliminar') {
        $codigo = $_POST['codigo'];
        $sql = "DELETE FROM hallazgos WHERE codigo = :codigo;";
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
