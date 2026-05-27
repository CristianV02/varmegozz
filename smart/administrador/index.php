<?php
require_once '../modelo/val-admin.php';

if ($rol != "administrador") {
    header("Location: ../administrador/indexUsuario.php");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jaziz Biológico</title>
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
        <!-- <div class="row"> -->

        <?php
        include 'menu.php';
        ?>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <a href="index.php">Inicio</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span class="active">Panel Principal</span>
                <i class="fa fa-circle"></i>
            </li>
        </ul>
        <div class="col col-lg-2"></div>
        <!-- Se trabaja el contendio dentro de este div para centrarlo -->
        <div class="col col-lg-10">
            <h2>Reportes</h2>
            <div class="row">
                <div class="col-sm-3">
                    <a href="reporte.php">
                        <div class="thumbnail">
                            <div class="caption">
                                <div>
                                    <p class="text-center">Reportes</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Se ocultan para dar un mejor orden -->
                <div class="col-sm-3 hidden">
                    <a href="reporte-sustancias.php">
                        <div class="thumbnail">
                            <div class="caption">
                                <div>
                                    <p class="text-center">Reportes Sustancias</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-3">
                    <a href="reporte-mecanismo.php">
                        <div class="thumbnail">
                            <div class="caption">
                                <div>
                                    <p class="text-center">Reportes Mecanismo</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-3">
                    <a href="docUsuarios.php">
                        <div class="thumbnail">
                            <div class="caption">
                                <p class="text-center">Archivos de Usuarios</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3 hidden">
                    <a href="reporte-tratamiento.php">
                        <div class="thumbnail">
                            <div class="caption">
                                <div>
                                    <p class="text-center">Reportes de Tratamiento</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-3 hidden">
                    <a href="reporte-hallazgo.php">
                        <div class="thumbnail">
                            <div class="caption">
                                <div>
                                    <p class="text-center">Reportes de Hallazgo</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <h2>Usuarios y Empresa</h2>
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
                <div class="col-sm-3">
                    <a href="empresa.php">
                        <div class="thumbnail">
                            <div class="caption">
                                <p class="text-center">Tipo de establecimiento</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-3">
                    <a href="tipo-documento.php">
                        <div class="thumbnail">
                            <div class="caption">
                                <div>
                                    <p class="text-center">Tipo Documento</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <h2>Mecanismo</h2>
            <div class="row">
                <div class="col-sm-3">
                    <a href="mecanismo.php">
                        <div class="thumbnail">
                            <div class="caption">
                                <p class="text-center">Mecanismo</p>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Se oculta hasta que se agregre la funcionalidad -->
                <div class="col-sm-3">
                    <a href="nombre_mecanismo.php">
                        <div class="thumbnail">
                            <div class="caption">
                                <p class="text-center">Nombre Mecanismo</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-3">
                    <a href="inventario-mecanismo.php">
                        <div class="thumbnail">
                            <div class="caption">
                                <p class="text-center">Inventario Mecanismo</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <h2>Sustancias</h2>
            <div class="row">
                <div class="col-sm-3">
                    <a href="Sustancias.php">
                        <div class="thumbnail">
                            <div class="caption">
                                <p class="text-center">Sustancias</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-3">
                    <a href="laboratorio.php">
                        <div class="thumbnail">
                            <div class="caption">
                                <p class="text-center">Laboratorios</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-3">
                    <a href="cantidad.php">
                        <div class="thumbnail">
                            <div class="caption">
                                <p class="text-center">Cantidad</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <h2>Tipo De Plagas</h2>
            <div class="row">
                <div class="col-sm-3">
                    <a href="tipo-plagas.php">
                        <div class="thumbnail">
                            <div class="caption">
                                <p class="text-center">Tipo Plagas</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-3">
                    <a href="tratamiento.php">
                        <div class="thumbnail">
                            <div class="caption">
                                <p class="text-center">Tratamiento</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-3">
                    <a href="nivel-infestacion.php">
                        <div class="thumbnail">
                            <div class="caption">
                                <div>
                                    <p class="text-center">Nivel Infestación</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>