<?php
date_default_timezone_set("America/Bogota");
require_once './conexion.php';
require_once './enviarEmail.php';
require_once './datos-reporte-mecanismo.php';
$conexion = new Conexion();
$mis_envios = new misEnvios();
$misReporteMecanismo = new misReporteMecanismo;

if (isset($_GET["id"]) && isset($_GET["estado"])) {
    $id = $_GET["id"];
    $estado = $_GET["estado"];
    if ($estado == 1) {
        $estadoAlerta = "ACTIVO";
    } elseif ($estado == 0) {
        $estadoAlerta = "DESACTIVADO";
    } else {
        echo '<script language = javascript>
        alert("Por favor verifique la información registrada.");
        </script>';
        return;
    }
}
if (isset($_GET["id"]) && isset($_GET["estado"])) {
    $id = $_GET["id"];
    $estado = $_GET["estado"];
    if ($estado == 1) {
        $estadoBateria = "ALTA";
    } elseif ($estado == 0) {
        $estadoBateria = "BAJA";
    } else {
        echo '<script language = javascript>
        alert("Por favor verifique la información registrada.");
        </script>';
        return;
    }
}

if (isset($_GET['accion'])) {
    $accion = $_GET['accion'];
    if ($accion == 'registrar') {
        $cod_reporte = $_POST['cod_reporte'];
        $identificacion_cliente = $_POST['identificacion_cliente'];
        $id = $_POST['id'];
        $nombre_mecanismo = $_POST['nombre_mecanismo'];
        $ubicacion = $_POST['ubicacion'];
        $observacion = $_POST['observacion'];
        if (isset($_GET['estadoalerta'])) {
            $estadoalerta = $_POST['estadoalerta'];
        } else {
            $estadoalerta = "DESACTIVADO";
        }
        if (isset($_GET['estadoalerta'])) {
            $estadobateria = $_POST['estadobateria'];
        } else {
            $estadobateria = "ALTA";
        }

        $sql = "INSERT INTO reporte_mecanismo (cod_reporte, identificacion_cliente, id, nombre_mecanismo, ubicacion, observacion, estadoalerta, estadobateria)
				VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $reg = $conexion->prepare($sql);
        $reg->bindParam(1, $cod_reporte);
        $reg->bindParam(2, $identificacion_cliente);
        $reg->bindParam(3, $id);
        $reg->bindParam(4, $nombre_mecanismo);
        $reg->bindParam(5, $ubicacion);
        $reg->bindParam(6, $observacion);
        $reg->bindParam(7, $estadoalerta);
        $reg->bindParam(8, $estadobateria);

        if ($reg->execute()) {
            echo 1;
            //Se actualiza el estado de asignación del mecanismo
            $id_inve = $id;
            if ($id_inve == 0) {
                echo 4;
            } else {
                $sql = "UPDATE inve_mecanismo SET
                                esta_asignado= 1
                        WHERE id_inve = :id_inve;";

                $reg = $conexion->prepare($sql);
                $reg->bindParam(':id_inve', $id_inve);
                if ($reg->execute()) {
                    echo 2;
                } else {
                    echo 0;
                }
            }
        } else {
            echo 0;
        }
    } elseif ($accion == 'modificar') {
        $codigo = $_POST['codigo'];
        $identificacion_cliente = $_POST['identificacion_cliente'];
        $id = $_POST['id'];
        $nombre_mecanismo = $_POST['nombre_mecanismo'];
        $ubicacion = $_POST['ubicacion'];
        $observacion = $_POST['observacion'];
        $estadoalerta = $_POST['estadoalerta'];
        $estadobateria = $_POST['estadobateria'];

        $sql = "UPDATE reporte_mecanismo SET
					   identificacion_cliente=:identificacion_cliente,
					   id=:id,
					   nombre_mecanismo=:nombre_mecanismo,
                       ubicacion=:ubicacion,
                       observacion=:observacion,
                       estadoalerta=:estadoalerta,
                       estadobateria=:estadobateria
				WHERE codigo = :codigo;";

        $reg = $conexion->prepare($sql);
        $reg->bindParam(':codigo', $codigo);
        $reg->bindParam(":identificacion_cliente", $identificacion_cliente);
        $reg->bindParam(":id", $id);
        $reg->bindParam(":nombre_mecanismo", $nombre_mecanismo);
        $reg->bindParam(":ubicacion", $ubicacion);
        $reg->bindParam(":observacion", $observacion);
        $reg->bindParam(":estadoalerta", $estadoalerta);
        $reg->bindParam(":estadobateria", $estadobateria);

        if ($reg->execute()) {
            echo 1;
        } else {
            echo 0;
        }
    } elseif ($accion == 'actualizar') {
        $id = $_GET['id'];
        $estadoalerta = $_GET['estado'];
        if (isset($_GET["id"]) && isset($_GET["estado"])) {
            $id = $_GET["id"];
            $estado = $_GET["estado"];
            if ($estado == 1) {
                $estadoalerta = "ACTIVO";
            } elseif ($estado == 0) {
                $estadoalerta = "DESACTIVADO";
            } else {
                echo '<script language = javascript>
                alert("Por favor verifique la informacion registrada.");
                </script>';
                return;
            }
        }
        $sql = "UPDATE reporte_mecanismo SET
                       estadoalerta=:estadoalerta
				WHERE id = :id;";

        $reg = $conexion->prepare($sql);
        $reg->bindParam(":id", $id);
        $reg->bindParam(":estadoalerta", $estadoalerta);

        if ($reg->execute()) {
            echo 1;
            $envio = $mis_envios->enviarCorreoAdministrador();
            $envio = $mis_envios->enviarCorreoTecnicos();
            $id_cliente = $misReporteMecanismo->viewReporteMecanismoId($id);
            $envio = $mis_envios->enviarCorreoUsuario($id_cliente[0]['identificacion_cliente']);
            // caryeli1331@gmail.com
        } else {
            echo 0;
        }
    } elseif ($accion == 'bateria') {
        $id = $_GET['id'];
        $estadobateria = $_GET['estado'];
        if (isset($_GET["id"]) && isset($_GET["estado"])) {
            $id = $_GET["id"];
            $estado = $_GET["estado"];
            if ($estado == 1) {
                $estadobateria = "ALTA";
            } elseif ($estado == 0) {
                $estadobateria = "BAJA";
            } else {
                echo '<script language = javascript>
                alert("Por favor verifique la información registrada.");
                </script>';
                return;
            }
        }
        $sql = "UPDATE reporte_mecanismo SET
                       estadobateria=:estadobateria
				WHERE id = :id;";

        $reg = $conexion->prepare($sql);
        $reg->bindParam(":id", $id);
        $reg->bindParam(":estadobateria", $estadobateria);

        if ($reg->execute()) {
            echo 1;
            $envio = $mis_envios->enviarCorreoAdministrador();
            $envio = $mis_envios->enviarCorreoTecnicos();
            $envio = $mis_envios->enviarCorreoUsuario($identificacion_cliente);
        } else {
            echo 0;
        }
    } elseif ($accion == 'eliminar') {
        $codigo = $_POST['codigo'];
        $sql = "DELETE FROM reporte_mecanismo WHERE codigo = :codigo;";
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
