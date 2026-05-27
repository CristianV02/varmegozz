<!-- 
El archivo llamarlo datos-clases

    **************************
    * Variables a reemplazar *
    **************************
    
nombre de la clase = misClases
función, en plural, para ver todos los datos de la BD = viewClases
función, en singular, para ver un dato de la BD = viewClase
función para la cantidad de datos de la BD = countClases
nombre de la tabla = nombre_tabla
agregar todas las columnas de la BD en las funciones.
Borrar cuando esté modificado todo e ir a /administrador/clases.php
-->

<?php

class misClases
{

    function viewClases()
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $arreglo = array();
        // agregar todas las columnas de la BD.
        $consulta = "SELECT codigo,
                            tipo_documento,
                            numero_documento,
                            nombre,
                            usuario,
                            contrasena,
                            email,
                            telefono,
                            ciudad,
                            regional_cod,
                            centro_formacion_cod,
                            direccion_sede,
                            cargo,
                            area,
                            rol_id
                    FROM nombre_tabla
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

    function viewClase($codigo)
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $arreglo = array();
        $consulta = "SELECT codigo,
                            tipo_documento,
                            numero_documento,
                            nombre,
                            usuario,
                            contrasena,
                            email,
                            telefono,
                            ciudad,
                            regional_cod,
                            centro_formacion_cod,
                            direccion_sede,
                            cargo,
                            area,
                            rol_id
                    FROM nombre_tabla
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

    function countClases()
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $total = 0;
        $consulta = "SELECT count(codigo) as cant FROM nombre_tabla";
        $modules = $conexion->prepare($consulta);
        $modules->execute();
        $data = $modules->fetch(PDO::FETCH_ASSOC);
        $total = $data['cant'];
        return $total;
    }
}
