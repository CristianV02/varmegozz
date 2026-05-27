<?php

class misTipo_plagas
{

    function viewTipo_plagas()
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $arreglo = array();
        $consulta = "SELECT codigo,
                            tratamiento,
                            tipo_plaga
                    FROM tipo_plagas
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

    function viewTipo_plaga($codigo)
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $arreglo = array();
        $consulta = "SELECT codigo,
                            tratamiendo,
                            tipo_de_plaga
                    FROM tipo_plagas
                    WHERE codigo = :codigo";
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
    function viewTipoPlaga($tratamiento)
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $arreglo = array();
        $consulta = "SELECT * FROM tipo_plagas WHERE tratamiento = :tratamiento";
        $modules = $conexion->prepare($consulta);
        $modules->bindParam(":tratamiento", $tratamiento);
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


    function maxTipo_plaga()
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $consecutivo = 0;
        $sqlcon = "SELECT max(codigo) as maximo FROM tipo_plagas";
        $rescon = $conexion->prepare($sqlcon);
        $rescon->execute();
        $rowcon = $rescon->fetch(PDO::FETCH_ASSOC);
        $consecutivo = $rowcon['maximo'];
        $consecutivo++;
        return $consecutivo;
    }
    
}
//Llama a la clase para tener los tipo de plagas según el tratamiento seleccionado.

if (isset($_POST['tratamiento'])) {
    $tratamiento = $_POST['tratamiento'];
    $misTipoPlagas = new misTipo_plagas();
    $tipoplagas = $misTipoPlagas->viewTipoPlaga($tratamiento);
    echo json_encode($tipoplagas); // Devolver los datos en formato JSON
}

