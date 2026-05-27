<?php
session_start();
require_once 'datos-usuarios.php';
$mis_usuarios = new misUsuarios();
if ($_SESSION) {
    $codigo = $_SESSION['codigo'];
    $tipo_id = $_SESSION['tipo_id'];
    $identificacion = $_SESSION['identificacion'];
    $nombre = $_SESSION['nombres'];
    $apellido = $_SESSION['apellidos'];
    $usuario = $_SESSION['usuario'];
    $rol = $_SESSION['rol'];
    /** Información del usuario */
    $mi_usuario = $mis_usuarios->viewUsuario($codigo);
    /** Valida si el usuario de la sesión corresponde  **/
    if ($identificacion != $mi_usuario[0]['identificacion']) {
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



