<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha Tecnica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
    <link href="./librerias/miestilo1.css" rel="stylesheet" type="text/css" />
    <!-- <link rel="icon" href="./imagenes/logo-jaziz_sf.ico"> -->


</head>

<body>
    <div class="bannerTop">
        <img src="./imagenes/PC.jpg" class="tpimg" />
    </div>
    <!-- <div class="formcenter"> -->
    <div class="row">
        <div class="col col-sm-4"></div>
        <div class="col col-sm-4 formcenter">
            <h1>Inicio de sesión</h1>
            <form class="text-color mt-3" id="signup" action="modelo/login.php" method="POST">
                <label>Identificacion :</label> <br>
                <input name="usuario" id="usuario" type="text" placeholder="Usuario*" required>
                <br>
                <label class="mt-1">Contraseña :</label> <br>
                <input name="contrasena" id="contrasena" type="password" placeholder="**********" required>
                <br>
                <br>
                <input type="submit" value="Ingresar">
            </form>
        </div>
        <div class="col col-sm-4"></div>


        <script type="text/javascript">
            function alertar(texto) {
                alert(texto);
            }
        </script>
        <script src="librerias/js/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="librerias/js/bootstrap.min.js" type="text/javascript"></script>
</body>

</html>