<?php

class misUsuarios
{

    function viewUsuarios()
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $arreglo = array();
        $consulta = "SELECT codigo,
                            tipo_id,
                            identificacion,
                            nombres,
                            apellidos,
                            usuario,
                            contrasena,
                            rol
                    FROM usuarios
                    ORDER BY codigo ASC";
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

    function viewUsuario($codigo)
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $arreglo = array();
        $consulta = "SELECT *FROM usuarios WHERE codigo = :codigo";
        $modules = $conexion->prepare($consulta);
        $modules->bindParam(":codigo", $codigo);
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

    function viewUsuarioDocumento($identificacion)
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $arreglo = array();
        $consulta = "SELECT codigo,
                            tipo_id,
                            identificacion,
                            nombre,
                            apellido,
                            usuario,
                            contrasena,
                            rol
                    FROM usuarios
                    WHERE identificacion = :identificacion";
        $modules = $conexion->prepare($consulta);
        $modules->bindParam(":identificacion", $identificacion);
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
