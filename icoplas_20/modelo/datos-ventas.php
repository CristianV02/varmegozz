<?php

class misVentas
{

    function viewVentas()
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $arreglo = array();
        $consulta = "SELECT codigo,
                            id_producto,
                            nombre_producto,
                            precio_total,
                            unidades,
                            nombre_comprador
                    FROM ventas
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

    function viewVenta($codigo)
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $arreglo = array();
        $consulta = "SELECT *FROM ventas WHERE codigo = :codigo";
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

    function viewProductoDocumento($identificacion)
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $arreglo = array();
        $consulta = "SELECT codigo,
                            id_producto,
                            precios,
                            unidades,
                            marca,
                            nombre_comprador
                    FROM producto
                    WHERE identificacion = :identificacion";
        $modules = $conexion->prepare($consulta);
        $modules->bindParam(":identificacion", $identificacion);
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

    function countProoductos()
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $total = 0;
        $consulta = "SELECT count(codigo) as cant FROM productos ";
        $modules = $conexion->prepare($consulta);
        $modules->execute();
        $data = $modules->fetch(PDO::FETCH_ASSOC);
        $total = $data['cant'];
        return $total;
    }
}
