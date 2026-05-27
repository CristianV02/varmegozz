<?php
if (isset($_GET['reporte']) && isset($_GET['cod']) ) {
    $reporte = $_GET['reporte'];
    $cod = $_GET['cod'];
    echo "impresión= " . $reporte . " - " . $cod;
} else {
    $reporte = "";
    $cod = "";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Firma Documento</title>
    <link rel="stylesheet" href="../librerias/firma-js/estilo.css">
</head>

<body>
    <br><br>
    <p>Por favor, agregar la firma de la persona que elabora el reporte No. <?php echo $reporte; ?></p>
    <p>Firmar a continuación:</p>
    <canvas id="canvas"></canvas>
    <br>
    <button id="btnLimpiar">Limpiar</button>
    <button id="btnEnviar" onclick="enviarFirma('<?php echo  $reporte ?>', '<?php echo  $cod ?>')">Enviar</button>
    <br>
    <?php
    include './librerias-js.php';
    ?>
    <script src="../controlador/funcionesFirmaAdmin.js"></script>
</body>

</html>