<?php
// Importes
require_once '../modelo/val-admin.php';
if ($rol_id == 1) {
    $tipo_usuario = "Administrador";
    $ir_configuracion = "configuracion.php";
} elseif ($rol_id == 2) {
    $tipo_usuario = "Coordinador";
    $ir_configuracion = "usuarios.php";
} elseif ($rol_id == 3) {
    $tipo_usuario = "Instructor";
    $ir_configuracion = "configuracion.php";
} elseif ($rol_id == 4) {
    $tipo_usuario = "Gestor de Apoyos";
    $ir_configuracion = "configuracion.php";
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal - Apoyos SocioEconómicos</title>
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
        <!-- BEGIN PAGE HEAD-->

        <!-- END PAGE HEAD-->
        <!-- BEGIN PAGE BREADCRUMB -->
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <a href="index.php">Inicio</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span class="active">Panel principal</span>
                <i class="fa fa-circle"></i>
            </li>
        </ul>
        <!-- END PAGE BREADCRUMB -->
        <!-- BEGIN PAGE BASE CONTENT -->
        <h3 class="text-right"><strong><?php echo $tipo_usuario; ?>:</strong> <?php echo $nombres; ?></h3>
        </br>
        </br>
        <!-- <h1>Apoyos SocioEconómicos</h1> -->
        </br>
        </br>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-2">
                <a href="busqueda.php">
                    <div>
                        <img src="../imagenes/busqueda_2023.png" alt="búsqueda" class="img-thumbnail" id="img-busqueda">
                        <p class="text-center">Realizar busqueda</p>
                    </div>
                </a>
            </div>
            <div class="col-sm-2"></div>
            <?php
            // Se valida que sea el administrados(1) o coordinador (2) o gestor de apoyos (4)
            if ($rol_id == 1 || $rol_id == 2 || $rol_id == 4) {
            ?>
                <div class="col-sm-2">
                    <a href="busqueda_coordinaciones.php">
                        <div>
                            <img src="../imagenes/Coordinaciones_2023.png" alt="reportes" class="img-thumbnail">
                            <p class="text-center">Coordinaciones</p>
                        </div>
                    </a>
                </div>
                <div class="col-sm-3"></div>
        </div>
        </br>
        </br>
        </br>
        </br>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-2">
                <a href="reportes.php">
                    <div>
                        <img src="../imagenes/Reportes_2023.png" alt="reportes" class="img-thumbnail">
                        <p class="text-center">Reportes</p>
                    </div>
                </a>
            </div>
            <div class="col-sm-2"></div>
        <?php
            }
        ?>
        <div class="col-sm-2">
            <a href=<?php echo $ir_configuracion; ?>>
                <div>
                    <img src="../imagenes/Configuración_2023.png" alt="configuración" class="img-thumbnail">
                    <p class="text-center">Configuración</p>
                </div>
            </a>
        </div>
        <div class="col-sm-3"></div>

        </div>
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