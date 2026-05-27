<?php
class misPrograma
{
    function viewProgramas()
    {
        require_once 'conexion1.php';
        $conexion = new Conexion1();
        $arreglo = array();
        $consulta = "SELECT id,
                            nombre,
                            facultad
                    FROM programa
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

    function viewPrograma($id)

    {
        require_once 'conexion.php';
        $conexion = new Conexion1();
        $arreglo = array();
        $consulta = "SELECT FROM programa WHERE id = :id";
        $modules = $conexion->prepare($consulta);
        $modules->bindParam(":id", $id);
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
