<?php
session_start();

function redirigirIndex()
{
    if (!headers_sent()) {
        header('Location: ../index.php');
    } else {
        echo '<script>window.location.href = "../index.php";</script>';
    }
    exit;
}

// Si no hay sesión de usuario válida, redirigimos inmediatamente.
if (empty($_SESSION['codigo']) || empty($_SESSION['identificacion'])) {
    session_destroy();
    redirigirIndex();
}

require_once 'datos-usuarios.php';
$mis_usuarios = new misUsuarios();

$codigo = $_SESSION['codigo'];
$tipo_id = $_SESSION['tipo_id'] ?? null;
$identificacion = $_SESSION['identificacion'];
$nombre = $_SESSION['nombres'] ?? '';
$apellido = $_SESSION['apellidos'] ?? '';
$usuario = $_SESSION['usuario'] ?? '';
$rol = $_SESSION['rol'] ?? '';

/** Información del usuario */
$mi_usuario = $mis_usuarios->viewUsuario($codigo);

if (empty($mi_usuario) || $identificacion != $mi_usuario[0]['identificacion']) {
    session_destroy();
    header('Location: ../index.php');
    exit;
}



