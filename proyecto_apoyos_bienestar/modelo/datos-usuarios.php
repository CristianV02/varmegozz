<?php

class misUsuarios
{

    function viewUsuarios()
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $arreglo = array();
        $consulta = "SELECT cod_usuario,
                            tipo_documento,
                            numero_documento,
                            nombre,
                            usuario,
                            contrasena,
                            email,
                            rol_id
                    FROM usuarios
                    ORDER BY cod_usuario ASC";
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

    function viewUsuario($cod_usuario)
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $arreglo = array();
        $consulta = "SELECT cod_usuario,
                            tipo_documento,
                            numero_documento,
                            nombre,
                            usuario,
                            contrasena,
                            email,
                            rol_id
                    FROM usuarios
                    WHERE cod_usuario = :cod_usuario";
        $modules = $conexion->prepare($consulta);
        $modules->bindParam(":cod_usuario", $cod_usuario);
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

    function viewUsuarioDocumento($numero_documento)
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $arreglo = array();
        $consulta = "SELECT cod_usuario,
                            tipo_documento,
                            numero_documento,
                            nombre,
                            usuario,
                            contrasena,
                            email,
                            rol_id
                    FROM usuarios
                    WHERE numero_documento = :numero_documento";
        $modules = $conexion->prepare($consulta);
        $modules->bindParam(":numero_documento", $numero_documento);
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
        $consulta = "SELECT count(cod_usuario) as cant FROM usuarios ";
        $modules = $conexion->prepare($consulta);
        $modules->execute();
        $data = $modules->fetch(PDO::FETCH_ASSOC);
        $total = $data['cant'];
        return $total;
    }
}
