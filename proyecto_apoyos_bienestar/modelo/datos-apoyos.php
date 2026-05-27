<?php

class misApoyos
{

    function viewApoyos()
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $arreglo = array();
        $consulta = "SELECT codigo,
                            tipo_documento,
                            numero_documento,
                            nombres_apellidos,
                            ficha,
                            programa_formacion,
                            inicio_ficha,
                            fin_ficha,
                            nivel_formacion,
                            estado_aprendiz,
                            apoyo_socioeconomico,
                            estado_apoyo,
                            inicio_apoyo,
                            fin_apoyo,
                            numero_resolucion_apoyo,
                            nombre_novedad_suspension,
                            motivo_suspension,
                            fecha_novedad_suspension,
                            nombre_registro_suspension,
                            resolucion_novedad_suspension,
                            nombre_novedad_reactivacion,
                            motivo_reactivacion,
                            fecha_novedad_reactivacion,
                            nombre_registro_reactivacion,
                            resolucion_novedad_reactivacion,
                            nombre_novedad_cancelacion,
                            motivo_cancelacion,
                            fecha_novedad_cancelacion,
                            nombre_registro_cancelacion,
                            resolucion_novedad_cancelacion
                    FROM apoyos_socioeconomicos
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

    function viewApoyo($codigo)
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $arreglo = array();
        $consulta = "SELECT codigo,
                            tipo_documento,
                            numero_documento,
                            nombres_apellidos,
                            ficha,
                            programa_formacion,
                            inicio_ficha,
                            fin_ficha,
                            nivel_formacion,
                            estado_aprendiz,
                            apoyo_socioeconomico,
                            estado_apoyo,
                            inicio_apoyo,
                            fin_apoyo,
                            numero_resolucion_apoyo,
                            nombre_novedad_suspension,
                            motivo_suspension,
                            fecha_novedad_suspension,
                            nombre_registro_suspension,
                            resolucion_novedad_suspension,
                            nombre_novedad_reactivacion,
                            motivo_reactivacion,
                            fecha_novedad_reactivacion,
                            nombre_registro_reactivacion,
                            resolucion_novedad_reactivacion,
                            nombre_novedad_cancelacion,
                            motivo_cancelacion,
                            fecha_novedad_cancelacion,
                            nombre_registro_cancelacion,
                            resolucion_novedad_cancelacion
                    FROM apoyos_socioeconomicos
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

    function viewApoyo_identificacion($numero_documento)
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $arreglo = array();
        $consulta = "SELECT codigo,
                            tipo_documento,
                            numero_documento,
                            nombres_apellidos,
                            ficha,
                            programa_formacion,
                            inicio_ficha,
                            fin_ficha,
                            nivel_formacion,
                            estado_aprendiz,
                            apoyo_socioeconomico,
                            estado_apoyo,
                            inicio_apoyo,
                            fin_apoyo,
                            numero_resolucion_apoyo,
                            nombre_novedad_suspension,
                            motivo_suspension,
                            fecha_novedad_suspension,
                            nombre_registro_suspension,
                            resolucion_novedad_suspension,
                            nombre_novedad_reactivacion,
                            motivo_reactivacion,
                            fecha_novedad_reactivacion,
                            nombre_registro_reactivacion,
                            resolucion_novedad_reactivacion,
                            nombre_novedad_cancelacion,
                            motivo_cancelacion,
                            fecha_novedad_cancelacion,
                            nombre_registro_cancelacion,
                            resolucion_novedad_cancelacion
                    FROM apoyos_socioeconomicos
                    WHERE numero_documento = :numero_documento";
        $modules = $conexion->prepare($consulta);
        $modules->bindParam(":numero_documento", $numero_documento);
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

    function viewApoyo_ficha($ficha)
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $arreglo = array();
        $consulta = "SELECT codigo,
                            tipo_documento,
                            numero_documento,
                            nombres_apellidos,
                            ficha,
                            programa_formacion,
                            inicio_ficha,
                            fin_ficha,
                            nivel_formacion,
                            estado_aprendiz,
                            apoyo_socioeconomico,
                            estado_apoyo,
                            inicio_apoyo,
                            fin_apoyo,
                            numero_resolucion_apoyo,
                            nombre_novedad_suspension,
                            motivo_suspension,
                            fecha_novedad_suspension,
                            nombre_registro_suspension,
                            resolucion_novedad_suspension,
                            nombre_novedad_reactivacion,
                            motivo_reactivacion,
                            fecha_novedad_reactivacion,
                            nombre_registro_reactivacion,
                            resolucion_novedad_reactivacion,
                            nombre_novedad_cancelacion,
                            motivo_cancelacion,
                            fecha_novedad_cancelacion,
                            nombre_registro_cancelacion,
                            resolucion_novedad_cancelacion
                    FROM apoyos_socioeconomicos
                    WHERE ficha = :ficha";
        $modules = $conexion->prepare($consulta);
        $modules->bindParam(":ficha", $ficha);
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

    function countApoyos_aprendiz($numero_documento)
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $total = 0;
        $consulta = "SELECT count(numero_documento) as cant 
                    FROM apoyos_socioeconomicos 
                    WHERE numero_documento = :numero_documento";
        $modules = $conexion->prepare($consulta);
        $modules->bindParam(":numero_documento", $numero_documento);
        $modules->execute();
        $data = $modules->fetch(PDO::FETCH_ASSOC);
        $total = $data['cant'];
        return $total;
    }

    function countApoyos()
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $total = 0;
        $consulta = "SELECT count(codigo) as cant FROM apoyos_socioeconomicos ";
        $modules = $conexion->prepare($consulta);
        $modules->execute();
        $data = $modules->fetch(PDO::FETCH_ASSOC);
        $total = $data['cant'];
        return $total;
    }

    function maxApoyos()
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $consecutivo = 0;
        $sqlcon = "SELECT max(codigo) as maximo FROM apoyos_socioeconomicos";
        $rescon = $conexion->prepare($sqlcon);
        $rescon->execute();
        $rowcon = $rescon->fetch(PDO::FETCH_ASSOC);
        $consecutivo = $rowcon['maximo'];
        $consecutivo++;
        return $consecutivo;
    }

}
