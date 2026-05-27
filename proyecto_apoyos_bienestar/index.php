<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apoyos Socioeconómicos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
    <link href="./librerias/miestilo1.css" rel="stylesheet" type="text/css" />


</head>

<body>
    <div class="container">
        <!-- INICIO HEADER -->
        <header>
            <div class="row">
                <div class="col-sm-3 header_logo">
                    <img class="imagen_logo" src="./imagenes/Logo-Bienestar_2023.png" alt="Logo SENA" width="auto" />
                </div>
                <div class="col-sm-6"></div>
                <div class="col-sm-3 header_mintic">
                    <img src="./imagenes/Logo-Mintrabajo_2023.png" alt=" LogoMinisterio de trabajo">
                </div>
            </div>
        </header>
        <!-- FIN HEADER -->
        <!-- Inicio Línea horizontal -->
        <hr style="border:0px; border-top: 5px double #999999;" />
        <!-- Fin Línea horizontal -->
        <!-- INICIO FORMULARIO PARA LOGEO DE LAS PERSONAS -->
        <div class="row">
            <div class="col-sm-12 text-center mt-5">
                <h1>Centro de Formación para el Desarrollo Rural y Minero - CEDRUM<br /></h1>
                <h2 class="titulo_app">Seguimiento y consulta de aprendices con apoyos Socioeconómicos</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3"></div>
            <div id="inicio" class="col-sm-6 mt-5">
                <form id="signup" action="modelo/login.php" method="POST">
                    <!--Titulos-->
                    <div class="header">
                        <h3 class="sesion text-center">Iniciar sesión</h3>
                        <!-- <h5 class="sesion text-center">Utilice su correo Sena</h5> -->
                    </div>
                    <!--Inputs-->
                    <div class="insert text-center">
                        <!--Input1-->
                        <div class="input-group mb-3 w-50 m-auto">
                            <span class="input-group-text">
                                <img class="icono_usuario" src="./imagenes/Login_2023.png" alt="Icono_Usuario" width="17rem" height="22.5rem">
                            </span>
                            <input class="form-control" type="text" name="usuario" id="usuario" placeholder="Usuario*" required>
                        </div>
                        <!--Input2-->
                        <div class="input-group mb-3 w-50 m-auto">
                            <span class="input-group-text">
                                <img class="icono_candado" src="./imagenes/candado2023.png" alt="Icono_Candado" width="17rem" height="20.5rem">
                            </span>
                            <input class="form-control" type="password" name="contrasena" id="contrasena" placeholder="**********" required>
                        </div>
                    </div>
                    <!--Boton-->
                    <div class="col-sm-5 mb-3 w-50 m-auto text-center">
                        <button class="btn btn-primary" type="submit" id="submitButton">Ingresar</button>
                    </div>
                    <!-- <a href="" onclick=""><h5 class="sesion text-center">Recuperar contraseña</h5></a> -->
                    <div class="text-center row">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-5">
                            <button type="button" class="btn btn-link" onclick="alertar('Para RECUPERAR la contraseña, favor comunicarse con el administrador del sistema. \n\nJhon Alexander Bacca \nCel: 3123161730 \nCorreo: jbacca@sena.edu.co');">
                                Recuperar contraseña
                            </button>
                        </div>
                        <div class="col-sm-5">
                            <button type="button" class="btn btn-link" onclick="alertar('Para REGISTRARSE, favor comunicarse con el administrador del sistema. \n\nJhon Alexander Bacca \nCel: 3123161730 \nCorreo: jbacca@sena.edu.co');">
                                Registrarse
                            </button>
                        </div>
                        <div class="col-sm-1"></div>
                    </div>
                </form>
            </div>
            <div class="col-sm-3"></div>
        </div>
        <!-- FIN FORMULARIO PARA LOGEO DE LAS PERSONAS -->
    </div>

    <!--Footer-->
    <footer>
        <span>Desarrollado: Tecnoparque Nodo Cúcuta</span>
        <span> - CEDRUM</span>
    </footer>
    <script type="text/javascript">
        function alertar(texto) {
            alert(texto);
        }
    </script>
    <script src="librerias/js/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script src="librerias/js/bootstrap.min.js" type="text/javascript"></script>
</body>

</html>