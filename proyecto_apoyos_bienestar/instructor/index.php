<?php
require_once '../modelo/val-instructor.php';
// require_once '../modelo/datos-asesores.php';
// require_once '../modelo/datos-clientes.php';
// require_once '../modelo/datos-agendamiento.php';
// require_once '../modelo/datos-sedes.php';
// require_once '../modelo/datos-tipoUsuarios.php';
// $asesores = new misAsesores();
// $clientes = new misClientes();
// $agendamientos = new misAgendamientos();
// $mistpusu = new misTipoUsarios();
// $sedes = new misSedes();
// Cantidad
// $cant_clientes = $clientes->countClientes();
// $agenda_pendiente = $agendamientos->countAgendaSedePend($sedeu);
// $agenda_atendidos = $agendamientos->countAgendaSedeAten($sedeu);
// $agenda_cancel = $agendamientos->countAgendaSedeCancel($sedeu);
// $tp_usuario = $mistpusu->viewTipoUsuario($tpusuariou);
// Variables
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instructor</title>
    <?php
    include 'librerias.php';
    ?>
</head>

<body>
    <!--Inicio menu-->
    <?php
    include 'menu.php';
    ?>
    <!--Fin menu-->
    <div class="container">
        <!-- INICIO HEADER -->
        <header>
            <div class="row">
                <div class="col-sm-3 header_logo">
                    <img class="imagen_logo" src="../imagenes/aprendiz.png" alt="Logo SENA" width="auto" />
                </div>
                <div class="col-sm-6"></div>
                <div class="col-sm-3 header_mintic">
                    <img src="../imagenes/Logo-Mintrabajo-s72.png" alt=" LogoMinisterio de trabajo">
                </div>
            </div>
        </header>
        <!-- FIN HEADER -->
        <!-- Inicio Línea horizontal -->
        <hr style="border:0px; border-top: 5px double #999999;" />
        <!-- Fin Línea horizontal -->
        <!-- BEGIN PAGE BREADCRUMB -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Instructor Búsqueda</li>
            </ol>
        </nav>
        <!-- END PAGE BREADCRUMB -->
        <!-- BEGIN PAGE BASE CONTENT -->
        <div class="row">
            <div class="col-sm-12 text-center mt-5">
                <h1 class="titulo_app">Seguimiento y consulta de aprendices con apoyos Socioeconómicos</h1>
            </div>
        </div>
        <form id="signup" action="
        modelo/login.php" method="POST">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <div class="form-group mt-3 text-center w-50 m-auto">
                        <label for="tipoBusqueda" class="form-label">
                            <h5><strong> Selecciona el tipo de búsqueda: </strong></h5>
                        </label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class="bi bi-search" width="17rem" height="22.5rem"></i>
                            </span>
                            <input class="form-control" list="tipoBusqueda" id="valorBusqueda" placeholder="Tipo de búsqueda" />
                        </div>
                        <datalist id="tipoBusqueda" name="selector">
                            <option value="Número de Documento"></option>
                            <option value="Número de Ficha"></option>
                        </datalist>
                    </div>
                    <div class="input-group mb-3 w-50 m-auto">
                        <span class="input-group-text">
                            <i class="bi bi-hash" width="17rem" height="22.5rem"></i>
                        </span>
                        <input class="form-control" type="text" name="datoBusqueda" id="datoBusqueda" placeholder="Digíte el dato a buscar" required>
                    </div>
                    <div class="form-group text-center w-50 m-auto">
                        <label for="tipoBusqueda" class="form-label">
                            <h5> Selecciona el mes y año de búsqueda:</h5>
                        </label>
                        <input type="month" id="mes" name="mes" class="form-date__input" required>
                    </div>
                    <div class="text-center mt-3">
                        <button class="btn btn-primary" type="submit" id="btnBusqueda">Buscar</button>
                    </div>
                </div>
            </div>
        </form>
        <div class="col-sm-3"></div>
    </div>
    <!-- END PAGE BASE CONTENT -->

    </div>
    <!--Footer-->
    <footer>
        <!-- <div class="col-sm-12 text-center"> -->
        <span>Desarrollado: Tecnoparque Nodo Cúcuta</span>
        <span> - CEDRUM</span>
        <!-- </div> -->
    </footer>
    <?php
    // include 'footer.php';
    include 'librerias_js.php';
    ?>
    <script type="text/javascript">
        $(document).ready(function() {
            // Llamar la función para calcular los valores

        });
    </script>
</body>

</html>