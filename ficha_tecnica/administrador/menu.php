<?php
require_once '../modelo/val-admin.php';
?>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <img src="" alt="" />
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="reporte.php">Inicio</a></li>
            <li><a href="#"> <strong><?php echo $rol . ": " ; ?></strong><?php echo $nombre . " " . $apellido; ?></a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right"></ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="../modelo/salir.php"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
        </ul>
    </div>
</nav>