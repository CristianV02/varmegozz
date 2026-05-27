<?php
session_start();
require_once 'datos-usuarios.php';
$mi_usuario = new misUsuarios();
if ($_SESSION) {
    $numero_documentou = $_SESSION['numero_documento'];
    $nombre_user = $_SESSION['nombre'];
    $user_user = $_SESSION['usuario'];
    $email_user = $_SESSION['email'];
    $rol_user = $_SESSION['rol_id'];
    /** Información del usuario */
    $usuario = $mi_usuario->viewUsuario($numero_documentou);
    /** Valida si el usuario de la sesión corresponde **/
    if ($numero_documentou != $usuario[0]['numero_documento'] || ($rol_user != 3)) {
        session_destroy();
        echo '<script language = javascript>
        self.location = "../index.php"
        </script>';
    }
} else {
    echo '<script language = javascript>
    alert("Por favor revisar la información del usuario.")
    self.location = "../index.php"
    </script>';
}
