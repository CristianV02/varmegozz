<?php
class misRoles
{
    function viewRol($id_rol)
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $arreglo = array();
        $consulta = "SELECT id_rol,
                            rol
                    FROM rol
                    WHERE id_rol = :id_rol";
        $modules = $conexion->prepare($consulta);
        $modules->bindParam(":id_rol", $id_rol);
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

    function viewRoles()
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $arreglo = array();
        $consulta = "SELECT id_rol,
                            rol
                    FROM rol
                    ORDER BY id_rol ASC";
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
}
