<?php

class misFacultad
{

    function viewFacultades()
    {
        require_once 'conexion1.php';
        $conexion = new Conexion1();
        $arreglo = array();
        $consulta = "SELECT id,
                            nombre
                    FROM facultad
                    ORDER BY id ASC";
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

    function viewFacultad($cod_facultad)

    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $arreglo = array();
        $consulta = "SELECT FROM facuultad WHERE cod_facultad = :cod_facultad";
        $modules = $conexion->prepare($consulta);
        $modules->bindParam(":cod_facultad", $cod_facultad);
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
}
