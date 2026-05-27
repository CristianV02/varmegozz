<?php
session_start();
require_once 'datos-usuarios.php';
$mis_usuarios = new misUsuarios();
if ($_SESSION) {
    $cod_usuario = $_SESSION['cod_usuario'];
    $identificacion = $_SESSION['numero_documento'];
    $nombres = $_SESSION['nombre'];
    $usuario = $_SESSION['usuario'];
    $email = $_SESSION['email'];
    $rol_id = $_SESSION['rol_id'];
    /** Información del usuario */
    $mi_usuario = $mis_usuarios->viewUsuario($cod_usuario);
    /** Valida si el usuario de la sesión corresponde  **/
    if ($identificacion != $mi_usuario[0]['numero_documento']) {
        session_destroy();
        echo '<script language = javascript>
        alert("Por favor revisar la información del usuario....")
        self.location = "../index.php"
        </script>';
    }
} else {
    echo '<script language = javascript>
    alert("Por favor revisar la información del usuario. ")
    self.location = "../index.php"
    </script>';
}
