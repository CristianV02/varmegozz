<?php
// Importes
require_once '../modelo/val-admin.php';
require_once '../modelo/datos-usuarios.php';
require '../modelo/datos-coordinaciones.php';
require '../modelo/datos-apoyos.php';
require '../modelo/datos-documento.php';
// Instancias
$misusuarios = new misUsuarios();
$miCoordinaciones = new misCoordinaciones();
$miapoyos = new misApoyos();
$mis_documentos = new misDocumentos();
$cant_usuarios = 1;
$cant_Coordinaciones = $miCoordinaciones->countCoordinaciones();
$cant_Apoyos = $miapoyos->countApoyos();
$cant_documento = $mis_documentos->countDocumento();
// Variables por perfil de usuario
if ($rol_id == 1) {
    $tipo_usuario = "Administrador";
    $cant_usuarios = $misusuarios->countUsuarios();
} elseif ($rol_id == 2) {
    $tipo_usuario = "Coordinador";
} elseif ($rol_id == 3) {
    $tipo_usuario = "Instructor";
} elseif ($rol_id == 4) {
    $tipo_usuario = "Gestor de Apoyos";
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración</title>
    <?php
    include 'librerias-css.php';
    ?>
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
        <!-- BEGIN PAGE HEAD-->

        <!-- END PAGE HEAD-->
        <!-- BEGIN PAGE BREADCRUMB -->
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <a href="index.php">Inicio</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span class="active">Configuración</span>
                <i class="fa fa-circle"></i>
            </li>
        </ul>
        <!-- END PAGE BREADCRUMB -->
        <!-- BEGIN PAGE BASE CONTENT -->
        <h3 class="text-right"><strong><?php echo $tipo_usuario; ?>:</strong> <?php echo $nombres; ?></h3>
        <?php
        // Se valida que sea el administrados(1) o gestor de apoyos (4)
        if ($rol_id == 1 || $rol_id == 4) {
        ?>
            <h1>Apoyos SocioEconómicos</h1>
            <div class="row">
                <div class="col-sm-3">
                    <a href="apoyos.php">
                        <div class="thumbnail">
                            <div class="caption">
                                <p><?php echo $cant_Apoyos; ?></p>
                                <p>Datos de Apoyos SocioEconómicos</p>
                            </div>
                        </div>
                    </a>
                </div>
                <?php
                if ($rol_id == 1) {
                ?>
                    <div class="col-sm-3">
                        <a href="cargar_archivo.php">
                            <div class="thumbnail">
                                <div class="caption">
                                    <p><?php echo "</br>"; ?></p>
                                    <p>Cargar Archivo</p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php
                }
                ?>
            </div>
        <?php
        }
        ?>
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
        // Se valida que sea el administrados(1) o gestor de apoyos (4)
        if ($rol_id == 1 || $rol_id == 3 || $rol_id == 4) {
        ?>
            <h1>Coordinaciones</h1>
            <div class="row">
                <div class="col-sm-3">
                    <a href="coordinaciones.php">
                        <div class="thumbnail">
                            <div class="caption">
                                <p><?php echo $cant_Coordinaciones; ?></p>
                                <p>Coordinaciones</p>
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
    <!--Footer-->
    <footer>
        <span>Desarrollado: Tecnoparque Nodo Cúcuta</span>
        <span> - CEDRUM</span>
    </footer>
    <?php
    include 'librerias-js.php';
    ?>
</body>

</html>