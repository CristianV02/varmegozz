<?php
// require_once '../modelo/val-admin.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Icolplast</title>

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
        <h1>Usuarios</h1>
        <div class="row">
            <div class="col-sm-3">
                <a href="usuarios.php">
                    <div class="thumbnail">
                        <div class="caption">
                            <p class="text-center">Usuarios</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <h1>Tipo Documento</h1>
        <div class="row">
            <div class="col-sm-3">
                <a href="tipo-documento.php">
                    <div class="thumbnail">
                        <div class="caption">
                            <div>
                                <p class="text-center">Tipo documento</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <h1>Ventas</h1>
        <div class="row">
            <div class="col-sm-3">
                <a href="ventas.php">
                    <div class="thumbnail">
                        <div class="caption">
                            <div>
                                <p class="text-center">Ventas</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <h1>Productos</h1>
        <div class="row">
            <div class="col-sm-3">
                <a href="productos.php">
                    <div class="thumbnail">
                        <div class="caption">
                            <div>
                                <p class="text-center">productos</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div> 
</div>
    <?php
    include 'librerias-js.php';
    ?>
</body>

</html>