<?php

class misReportes
{
    function viewReportes()
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $arreglo = array();
        $consulta = "SELECT codigo,
                            tipo_doc,
                            usuario,
                            nombre_apellido,
                            nombre_empresa,
                            fecha_de_inicio,
                            hora_de_inicio,
                            fecha_fin,
                            hora_fin,
                            cantidad_mecanismo,
                            cantidad_de_sustancia,
                            cantidad_de_hallazgo,
                            elaborado_por,
                            ver_pdf
                            FROM reportes
                            ORDER BY codigo DESC";
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

    function viewReporteUsuario($codigo)
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $arreglo = array();
        $consulta = "SELECT * FROM reportes WHERE codigo = :codigo";
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

    //Trae los reportes por el número de identificación del usuario
    function viewReporteIdentificacion($usuario)
    {
        require_once 'conexion.php';
        $conexion = new Conexion();

        // Modificar la consulta para incluir ORDER BY en orden descendente
        $consulta = "SELECT * FROM reportes WHERE usuario = :usuario ORDER BY fecha_de_inicio DESC"; // Ordenar por la columna 'id' en orden descendente
        $modules = $conexion->prepare($consulta);
        $modules->bindParam(":usuario", $usuario);
        $modules->execute();

        $arreglo = array();
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


    //Trae la cantidad visitas según la fecha de inicio del reporte, que esta no esté repetida.
    function viewCantidadVisitas($usuario)
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $arreglo = array();
        $consulta = "SELECT DISTINCT fecha_de_inicio FROM reportes WHERE usuario = :usuario";
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
        return $total;
    }

    // Tipos de plagas y nivel de infestación por mes para un usuario determinado
    function viewPlagasInfestacion($usuario)
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $arreglo = array();
        $consulta = "SELECT
                            r.codigo,
                            rt.tipo_plagas,
                            rt.nivel_infestacion
                        FROM
                            reportes r
                        JOIN
                            reporte_tratamiento rt ON r.codigo = rt.cod_reporte
                        WHERE r.usuario = :usuario
                        AND MONTH(r.fecha_de_inicio) = 11
                        AND YEAR(r.fecha_de_inicio) = 2023";
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

    //Devuelve los reportes por mes y año seleccionado de los tratamientos utilizados
    function viewReporteMesAnioTratamiento($identificacion, $establecimiento, $mes, $anio)
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $arreglo = array();
        $consulta = "SELECT rt.tipo_plagas,
                            rt.nivel_infestacion
                        FROM
                            reportes r
                        JOIN
                            reporte_tratamiento rt ON r.codigo = rt.cod_reporte
                        WHERE r.usuario =:identificacion
                        AND r.nombre_empresa =:establecimiento
                        AND MONTH(fecha_de_inicio) =:mes
                        AND YEAR(fecha_de_inicio) =:anio";
        $modules = $conexion->prepare($consulta);
        $modules->bindParam(":identificacion", $identificacion);
        $modules->bindParam(":establecimiento", $establecimiento);
        $modules->bindParam(":mes", $mes);
        $modules->bindParam(":anio", $anio);
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

    //Devuelve los reportes por mes y año seleccionado de las sustancias utilizadas
    function viewReporteMesAnioSustancia($identificacion, $establecimiento, $mes, $anio)
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $arreglo = array();
        $consulta = "SELECT s.nombre,
        rs.cantidad
        FROM
        reportes r
        JOIN
            reporte_sustancias rs ON r.codigo = rs.cod_reporte
        JOIN
            sustancias s ON rs.sustancias = s.codigo
            WHERE r.usuario =:identificacion
            AND r.nombre_empresa =:establecimiento
            AND MONTH(r.fecha_de_inicio) =:mes
            AND YEAR(r.fecha_de_inicio) =:anio";
        $modules = $conexion->prepare($consulta);
        $modules->bindParam(":identificacion", $identificacion);
        $modules->bindParam(":establecimiento", $establecimiento);
        $modules->bindParam(":mes", $mes);
        $modules->bindParam(":anio", $anio);
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

    public function maxReporte()
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $sqlcon = "SELECT max(codigo) as maximo FROM reportes";
        $rescon = $conexion->prepare($sqlcon);
        $rescon->execute();
        $rowcon = $rescon->fetch(PDO::FETCH_ASSOC);
        $consecutivo = $rowcon['maximo'];
        return ++$consecutivo;
    }
}
//Llama a la clase para tener los datos de los reportes según el mes y el año.
if (isset($_POST['mes']) && isset($_POST['anio'])) {
    $sustancias = $_POST['sustancias'];
    $tratamiento = $_POST['tratamiento'];
    $identificacion = $_POST['identificacion'];
    $establecimiento = $_POST['establecimiento'];
    $mes = $_POST['mes'];
    $anio = $_POST['anio'];
    $misReportes = new misReportes();
    if ($tratamiento == 1 && $sustancias == 0) {
        $reportesMes = $misReportes->viewReporteMesAnioTratamiento($identificacion, $establecimiento, $mes, $anio);
    } elseif ($tratamiento == 0 && $sustancias == 1) {
        $reportesMes = $misReportes->viewReporteMesAnioSustancia($identificacion, $establecimiento, $mes, $anio);
    } else {
        echo "Error...";
    }
    echo json_encode($reportesMes); // Devolver los datos en formato JSON
}
