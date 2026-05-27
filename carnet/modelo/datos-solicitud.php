<?php

class misSolicitud
{

    function viewSolicitudes()
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $arreglo = array();
        $consulta = "SELECT id_solicitud,
                            fecha_de_solicitud,
                            estado,
                            nombres,
                            tipo_usuario,
                            cargo,
                            id_usuario,
                            id_programa,
                            tipo,
                            realizado_por,
                            fecha_realizado,
                            recibido_por_admisiones,
                            fecha_de_admisiones,
                            entregado
                    FROM solicitud
                    ORDER BY id_solicitud ASC";
        $modules = $conexion->prepare($consulta);
        $modules->execute();
        $total = $modules->rowCount();
        if ($total > 0) {
            $i = 0;
            while ($data = $modules->fetch(PDO::FETCH_ASSOC)) {
                $arreglo[$i] = $data;
                $i++;
            }
        }
        return $arreglo;
    }

    function viewSolicitud($id_solicitud)
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $arreglo = array();
        $consulta = "SELECT *FROM solicitud WHERE id_solicitud = :id_solicitud";
        $modules = $conexion->prepare($consulta);
        $modules->bindParam(":id_solicitud", $id_solicitud);
        $modules->execute();
        $total = $modules->rowCount();
        if ($total > 0) {
            $i = 0;
            while ($data = $modules->fetch(PDO::FETCH_ASSOC)) {
                $arreglo[$i] = $data;
                $i++;
            }
        }
        return $arreglo;
    }
    function viewSolicitudUsuario($id_usuario)
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $arreglo = array();
        $consulta = "SELECT * FROM solicitud WHERE id_usuario = :id_usuario";
        $modules = $conexion->prepare($consulta);
        $modules->bindParam(":id_usuario", $id_usuario);
        $modules->execute();
        $total = $modules->rowCount();
        if ($total > 0) {
            $i = 0;
            while ($data = $modules->fetch(PDO::FETCH_ASSOC)) {
                $arreglo[$i] = $data;
                $i++;
            }
        }
        return $arreglo;
    }
    function viewSolicitud_identificacion($id_usuario)
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $arreglo = array();
        $consulta = "SELECT id_solicitud,
                            fecha_de_solicitud,
                            estado,
                            nombres,
                            tipo_usuario,
                            cargo,
                            id_usuario,
                            id_programa ,
                            observaciones ,
                            referencia ,
                            tipo,
                            estado_de_pago,
                            fotos,
                            cod_estudiante,
                            correo_institucional,
                            año_de_grado,
                            cantidad,
                            numero_recibo,
                            realizado_por,
                            fecha_realizado,
                            recibido_por_admisiones,
                            fecha_de_admisiones,
                            entregado                            
                    FROM solicitud
                    WHERE id_usuario = :id_usuario";
        $modules = $conexion->prepare($consulta);
        $modules->bindParam(":id_usuario", $id_usuario);
        $modules->execute();
        $total = $modules->rowCount();
        if ($total > 0) {
            $i = 0;
            while ($data = $modules->fetch(PDO::FETCH_ASSOC)) {
                $arreglo[$i] = $data;
                $i++;
            }
        }
        return $arreglo;
    }
    function countSolictud()
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $total = 0;
        $consulta = "SELECT count(id_solicitud) as cant FROM solicitud ";
        $modules = $conexion->prepare($consulta);
        $modules->execute();
        $data = $modules->fetch(PDO::FETCH_ASSOC);
        $total = $data['cant'];
        return $total;
    }
    
    public function maxSolicitud()
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $sqlcon = "SELECT max(id_solicitud) as maximo FROM solicitud";
        $rescon = $conexion->prepare($sqlcon);
        $rescon->execute();
        $rowcon = $rescon->fetch(PDO::FETCH_ASSOC);
        $consecutivo = $rowcon['maximo'];
        return ++$consecutivo;

        
    }
}
