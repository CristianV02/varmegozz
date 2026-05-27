<?php
class misReporteSustancias
{
    function viewReporteSustancias()
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $arreglo = array();
        $consulta = "SELECT codigo,
                            usuario,
                            sustancias,
                            laboratorio,
                            nivel_riesgo,
                            cantidad,
                            mediciones,
                            fecha_vencimiento,
                            registro_sanitario,
                            cod_reporte
                    FROM reporte_sustancias
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
    // Entrega el reporte de mecanismos según la identificación del usuario
    function viewReporteSustanciaId($usuario)
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $arreglo = array();
        $consulta = "SELECT * FROM reporte_sustancias WHERE usuario = :usuario";
        $modules = $conexion->prepare($consulta);
        $modules->bindParam(":usuario", $usuario);
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
    function viewReporteSustancia($codigo)
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $arreglo = array();
        $consulta = "SELECT * FROM reporte_sustancias WHERE cod_reporte = :cod_reporte";
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
    function countReporteSustancia($cod_reporte)
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $total = 0;
        $consulta = "SELECT count(cod_reporte) as cant FROM reporte_sustancias WHERE cod_reporte =:cod_reporte";
        $modules = $conexion->prepare($consulta);
        $modules->bindParam(":cod_reporte", $cod_reporte);
        $modules->execute();
        $data = $modules->fetch(PDO::FETCH_ASSOC);
        $total = $data['cant'];
        return $total;
    }
    function maxReporteSustancia()
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $consecutivo = 0;
        $sqlcon = "SELECT max(codigo) as maximo FROM reporte_sustancias";
        $rescon = $conexion->prepare($sqlcon);
        $rescon->execute();
        $rowcon = $rescon->fetch(PDO::FETCH_ASSOC);
        $consecutivo = $rowcon['maximo'];
        $consecutivo++;
        return $consecutivo;
    }
}
