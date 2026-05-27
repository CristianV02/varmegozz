<?php
class misReporteHallazgo
{
    function viewReporteHallazgos()
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $arreglo = array();
        $consulta = "SELECT codigo,
                            usuario,
                            hallazgo,
                            cod_reporte,
                            foto1,
                            oportunidad_1,
                            foto2,
                            oportunidad_2,
                            foto3,
                            oportunidad_3,
                            foto4,
                            oportunidad_4
                    FROM reporte_hallazgo
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

    function viewReporteHallazgo($codigo)
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $arreglo = array();
        $consulta = "SELECT * FROM reporte_hallazgo WHERE cod_reporte = :cod_reporte";
        $modules = $conexion->prepare($consulta);
        $modules->bindParam(":cod_reporte", $codigo);
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
    function viewCodHallazgo($codigo)
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $arreglo = array();
        $consulta = "SELECT * FROM reporte_hallazgo WHERE codigo = :codigo";
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
    function countReporteHallazgo($cod_reporte)
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $total = 0;
        $consulta = "SELECT count(cod_reporte) as cant FROM reporte_hallazgo WHERE cod_reporte =:cod_reporte";
        $modules = $conexion->prepare($consulta);
        $modules->bindParam(":cod_reporte", $cod_reporte);
        $modules->execute();
        $data = $modules->fetch(PDO::FETCH_ASSOC);
        $total = $data['cant'];
        return $total;
    }
    function maxReporteHallazgo()
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $consecutivo = 0;
        $sqlcon = "SELECT max(codigo) as maximo FROM reporte__hallazgo";
        $rescon = $conexion->prepare($sqlcon);
        $rescon->execute();
        $rowcon = $rescon->fetch(PDO::FETCH_ASSOC);
        $consecutivo = $rowcon['maximo'];
        $consecutivo++;
        return $consecutivo;
    }
}
