<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>carnet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
    <link href="./librerias/miestilo1.css" rel="stylesheet" type="text/css" />


</head>

<body>
    <div class="bannerTop">
        <img src="./imagenes/universidad-libre1.jpg" class="tpimg" />
    </div>
    <div class="formcenter">
        <h2>UNIVERSIDAD LIBRE SECCIONAL <br>
            CÚCUTA GESTIÓN CARNET</h2>
        <form class="text-color" id="signup" action="modelo/login.php" method="POST">
            <label>Identificacion :</label> <br>
            <input name="usuario" id="usuario" type="text" placeholder="Usuario*" required>
            <br>
            <br>
            <label>Contraseña :</label> <br>
            <input name="contrasena" id="contrasena" type="password" placeholder="**********" required>
            <br>
            <br>
            <input type="submit" name value="Ingresar">
        </form>
    </div>
</body>

</html>