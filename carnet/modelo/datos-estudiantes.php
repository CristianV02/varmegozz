<?php

class misEstudiante
{

    function viewEstudiantes()
    {
        require_once 'conexion1.php';
        $conexion = new Conexion1();
        $arreglo = array();
        $consulta = "SELECT cedula,
                            tipoid,
                            nombres,
                            programa,
                            semestre,
                            modalidad,
                            periodo,
                            telefono,
                            correopersonal,
                            correounilibre
                    FROM estudiante
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
        $conexion = new Conexion1();
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
    function viewEstudiante_identificacion($cedula)
    {
        require_once 'conexion1.php';
        $conexion = new Conexion1();
        $arreglo = array();
        $consulta = "SELECT cedula,
                            tipoid,
                            nombres,
                            programa,
                            semestre,
                            modalidad,
                            periodo,
                            telefono,
                            correopersonal,
                            correounilibre                            
                    FROM estudiantes
                    WHERE cedula = :cedula";
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
