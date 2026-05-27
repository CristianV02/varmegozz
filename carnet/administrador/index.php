<?php
// Importes
require_once '../modelo/val-admin.php';
require_once '../modelo/datos-usuarios.php';
require_once '../modelo/datos-solicitud.php';
// Instancias
$misusuarios = new misUsuarios();
$mis_solicitud = new misSolicitud();
$cant_usuarios = 1;
$cant_solicitud = $mis_solicitud->countSolictud();

// Variables por perfil de usuario
if ($id_rol == 1) {
    $tipo_usuario = "Administrador";
    $cant_usuarios = $misusuarios->countUsuarios();
} elseif ($id_rol == 2) {
    $tipo_usuario = "Sistema";
} elseif ($id_rol == 3) {
    $tipo_usuario = "Admisiones";
} elseif ($id_rol == 4) {
    $tipo_usuario = "Jefe sistema";
} elseif ($id_rol == 5) {
    $tipo_usuario = "Jefe admisiones";
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carnet</title>
    <?php
    include 'librerias-css.php';
    ?>
    <style>
        .img-thumbnail {
            border: 0px solid #ddd;
        }
    </style>

</head>

<body>
    <?php
    $claseContainer = "container";
    include 'header.php';
    ?>
    <div class="container">
        <?php
        include 'menu.php';
        ?>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <a href="index.php" onclick="return validarEnlace()">Inicio</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span class="active">Panel principal</span>
                <i class="fa fa-circle"></i>
            </li>
        </ul>
        <h3 class="text-right"><strong><?php echo $tipo_usuario; ?>:</strong> <?php echo $nombres_apellidos; ?></h3>

        <h1>Solicitud</h1>
        <div class="row">
            <div class="col-sm-3">
                <a href="solicitud.php">
                    <div class="thumbnail">
                        <div class="caption">
                            <div>
                                <p><?php echo $cant_solicitud; ?></p>
                                <p>Solicitud</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <!-- <h1>Datos Solicitud</h1>
        <div class="row">
            <div class="col-sm-3">
                <a href="datos-solicitud.php">
                    <div class="thumbnail">
                        <div class="caption">
                            <div>
                                <p>Datos Solicitud</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div> -->
        <h1>Usuarios</h1>
        <div class="row">
            <div class="col-sm-3">
                <a href="usuarios.php">
                    <div class="thumbnail">
                        <div class="caption">
                            <p><?php echo $cant_usuarios; ?></p>
                            <p>Usuarios</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <?php
        // Se valida que sea el administrados(1)
        if ($id_rol == 1) {
        ?>
            <h1>Rol</h1>
            <div class="row">
                <div class="col-sm-3">
                    <a href="rol.php">
                        <div class="thumbnail">
                            <div class="caption">
                                <div>
                                    <p class="text-center">Rol</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        <?php
        }
        ?>
        <?php
        // Se valida que sea el administrados(1)
        if ($id_rol == 1) {
        ?>
            <h1>Estado</h1>
            <div class="row">
                <div class="col-sm-3">
                    <a href="estado.php">
                        <div class="thumbnail">
                            <div class="caption">
                                <div>
                                    <p class="text-center">Estado</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        <?php
        }
        ?>
        <?php
        // Se valida que sea el administrados(1)
        if ($id_rol == 1) {
        ?>
            <h1>Auditoria</h1>
            <div class="row">
                <div class="col-sm-3">
                    <a href="auditoria.php">
                        <div class="thumbnail">
                            <div class="caption">
                                <div>
                                    <p class="text-center">Auditoria</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
    </div>
    <?php
    include 'librerias-js.php';
    ?>
</body>

</html>