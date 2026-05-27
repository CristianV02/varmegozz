<?php

class misInforme
{

    function viewInformes()
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $arreglo = array();
        $consulta = "SELECT codigo,
                            marca,
                            referencia,
                            disco_duro,
                            memoria_ram,
                            tarjeta_de_video,
                            monitor,
                            nombre_board,
                            puertos_audio_voz,
                            chip_set_motherboard,
                            modelo,
                            microprocesador,
                            capacidad,
                            tipo_capacidad,
                            unid_cd_dvd,
                            teclado,
                            puerto_usb,
                            ranuras_para_memorias_ram,
                            tipo_de_bios,
                            lector_de_tarjeta,
                            ranura_pci,
                            aceleradora,
                            placa_de_red,
                            version_de_bios,
                            observaciones,
                            realizo,
                            recibio
                    FROM informe
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
    function viewInforme($codigo)
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $arreglo = array();
        $consulta = "SELECT *FROM informe WHERE codigo = :codigo";
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
    function countInforme($codigo)
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $total = 0;
        $consulta = "SELECT count(codigo) as cant FROM informe WHERE codigo =:codigo";
        $modules = $conexion->prepare($consulta);
        $modules->bindParam(":codigo", $codigo);
        $modules->execute();
        $data = $modules->fetch(PDO::FETCH_ASSOC);
        $total = $data['cant'];
        return $total;
    }
}
