<?php

class misDocente
{

    function viewDocentes()
    {
        require_once 'conexion1.php';
        $conexion = new Conexion1();
        $arreglo = array();
        $consulta = "SELECT cedula,
                            periodo,
                            nombres
                    FROM docente
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

    function viewDocente($cedula)
    {
        require_once 'conexion1.php';
        $conexion = new Conexion1();
        $arreglo = array();
        $consulta = "SELECT *FROM docente WHERE cedula = :cedula";
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
