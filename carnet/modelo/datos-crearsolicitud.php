<?php

class misCrearSolicitud
{

    function viewCrearSolicitud()
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $arreglo = array();
        $consulta = "SELECT cedula,
                            programa,
                            facultad,
                            nombres,
                            correounilibre
                    FROM crearsolicitud
                    ORDER BY cedula ASC";
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

    function viewEstudiante($cedula)
    {
        require_once 'conexion1.php';
        $conexion = new Conexion();
        $arreglo = array();
        $consulta = "SELECT *FROM estudiante WHERE cedula = :cedula";
        $modules = $conexion->prepare($consulta);
        $modules->bindParam(":cedula", $cedula);
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
    function viewUsuariosSistema()
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $arreglo = array();
        $consulta = "SELECT id_usuario,
                            nombres_apellidos,
                            usuario,
                            contrasena,
                            id_rol
                    FROM usuario
                    WHERE id_rol = 'sistema'
                    ORDER BY id_usuario ASC";
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
    function viewUsuariosAdmisiones()
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $arreglo = array();
        $consulta = "SELECT id_usuario,
                            nombres_apellidos,
                            usuario,
                            contrasena,
                            id_rol
                    FROM usuario
                    WHERE id_rol = 'admisiones'
                    ORDER BY id_usuario ASC";
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
    function countUsuarios()
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $total = 0;
        $consulta = "SELECT count(codigo) as cant FROM usuario ";
        $modules = $conexion->prepare($consulta);
        $modules->execute();
        $data = $modules->fetch(PDO::FETCH_ASSOC);
        $total = $data['cant'];
        return $total;
    }
}
