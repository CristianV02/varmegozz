<?php
session_start();
require_once 'datos-usuarios.php';
$mis_usuarios = new misUsuarios();
if ($_SESSION) {
    $id = $_SESSION['id'];
    $identificacion = $_SESSION['id_usuario'];
    $nombres_apellidos = $_SESSION['nombres_apellidos'];
    $usuario = $_SESSION['usuario'];
    $id_rol = $_SESSION['id_rol'];
    /** Información del usuario */
    $mi_usuario = $mis_usuarios->viewUsuario($id);
    /** Valida si el usuario de la sesión corresponde  **/
    if ($identificacion != $mi_usuario[0]['id_usuario']) {
        session_destroy();
        echo '<script language = javascript>
        alert("Por favor revisar la información del usuario1....")
        self.location = "../index.php"
        </script>';
    }
} else {
    echo '<script language = javascript>
    alert("Por favor revisar la información del usuario2. ")
    self.location = "../index.php"
    </script>';
}



