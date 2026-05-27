<?php

class misCoordinaciones
{
    function viewCoordinaciones()
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $arreglo = array();
        $consulta = "SELECT * FROM coordinaciones ORDER BY cod_coordinaciones ASC";
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

    function viewCoordinacion($cod_coordinaciones)
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $arreglo = array();
        $consulta = "SELECT * FROM coordinaciones WHERE cod_coordinaciones = :cod_coordinaciones";
        $modules = $conexion->prepare($consulta);
        $modules->bindParam(":cod_coordinaciones", $cod_coordinaciones);
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

    function countCoordinaciones()
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $total = 0;
        $consulta = "SELECT count(cod_coordinaciones) as cant FROM coordinaciones";
        $modules = $conexion->prepare($consulta);
        $modules->execute();
        $data = $modules->fetch(PDO::FETCH_ASSOC);
        $total = $data['cant'];
        return $total;
    }
    function maxCoordinaciones()
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $consecutivo = 0;
        $sqlcon = "SELECT max(cod_coordinaciones) as maximo FROM coordinaciones";
        $rescon = $conexion->prepare($sqlcon);
        $rescon->execute();
        $rowcon = $rescon->fetch(PDO::FETCH_ASSOC);
        $consecutivo = $rowcon['maximo'];
        $consecutivo++;
        return $consecutivo;
    }
}
