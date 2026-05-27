<?php
date_default_timezone_set("America/Bogota");
require_once '../modelo/val-admin.php';
if (isset($_GET["id"]) && isset($_GET["estado"])) {
    $id = $_GET["id"];
    $estado = $_GET["estado"];
    if ($estado == 1) {
        $estadoAlerta = "ACTIVO";
    } elseif ($estado == 0) {
        $estadoAlerta = "DESACTIVADO";
    } else {
        echo '<script language = javascript>
        alert("Por favor verifique la información registrada.");
        </script>';
        return;
    }
}
// echo date("Y-m-d");
// echo "<br>" . date("H:i:s");
echo "<br>" . $estadoAlerta;
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos</title>
</head>

<body id="body">

    <?php
    include './librerias-js.php';
    ?>
    <script src="../controlador/funciones-recibirDatos.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            actualizarDatoMecanismo("<?php echo $id ?>", "<?php echo $estadoAlerta ?>");
        });
    </script>
</body>

</html>