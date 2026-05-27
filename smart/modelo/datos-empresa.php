<?php

class misEmpresas
{

    function viewEmpresas()
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $arreglo = array();
        $consulta = "SELECT codigo,
                            NITRUT,
                            numero,
                            nombre_empresa,
                            direccion,
                            identificacion,
                            nombre_usuario,
                            telefono,
                            correo,
                            cargo
                    FROM tipo_establecimiento
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
    function viewEmpresa($codigo)
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $arreglo = array();
        $consulta = "SELECT * FROM tipo_establecimiento WHERE codigo = :codigo";
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

    function viewEmpresaDocumento($identificacion)
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $arreglo = array();
        $consulta = "SELECT codigo,
                            NITRUT,
                            numero,
                            nombre_empresa,
                            direccion,
                            identificacion,
                            nombre_usuario,
                            telefono,
                            correo,
                            cargo
                    FROM tipo_establecimiento
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
    function viewEmpresaDocumento1($NITRUT)
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $arreglo = array();
        $consulta = "SELECT codigo,
                            NITRUT,
                            numero,
                            nombre_empresa,
                            direccion,
                            identificacion,
                            nombre_usuario,
                            telefono,
                            correo,
                            cargo
                    FROM tipo_establecimiento
                    WHERE numero = :numero";
        $modules = $conexion->prepare($consulta);
        $modules->bindParam(":numero", $NITRUT);
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

    function countEmpresa()
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $total = 0;
        $consulta = "SELECT count(codigo) as cant FROM tipo_establecimiento ";
        $modules = $conexion->prepare($consulta);
        $modules->execute();
        $data = $modules->fetch(PDO::FETCH_ASSOC);
        $total = $data['cant'];
        return $total;
    }
    function maxEmpresa()
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $consecutivo = 0;
        $sqlcon = "SELECT max(codigo) as maximo FROM tipo_establecimiento";
        $rescon = $conexion->prepare($sqlcon);
        $rescon->execute();
        $rowcon = $rescon->fetch(PDO::FETCH_ASSOC);
        $consecutivo = $rowcon['maximo'];
        $consecutivo++;
        return $consecutivo;
    }
}

//Llama a la clase para tener las empresas según el usuario seleccionado.
if (isset($_POST['identificacion'])) {
    $identificacion = $_POST['identificacion'];
    $misEmpresas = new misEmpresas();
    $empresa = $misEmpresas->viewEmpresaDocumento($identificacion);
    echo json_encode($empresa); // Devolver los datos en formato JSON
}
