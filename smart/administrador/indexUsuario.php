<?php
date_default_timezone_set("America/Bogota");
require_once '../modelo/val-admin.php';
require_once '../modelo/datos-Reportes.php';
require '../modelo/datos-reporte-mecanismo.php';
require '../modelo/datos-empresa.php';
$mis_Reportes = new misReportes;
$misReporteMecanismo = new misReporteMecanismo;
$misEmpresas = new misEmpresas;
$cantidadVisitas = $mis_Reportes->viewCantidadVisitas($identificacion);
$misEstablecimientos = $misEmpresas->viewEmpresaDocumento($identificacion);

//Variables
$meses = [
    'Enero',
    'Febrero',
    'Marzo',
    'Abril',
    'Mayo',
    'Junio',
    'Julio',
    'Agosto',
    'Septiembre',
    'Octubre',
    'Noviembre',
    'Diciembre'
];

//Sumatoría de la cantidad de mecanismos que se han instalado en el cliente
$res = $mis_Reportes->viewReporteIdentificacion($identificacion);
$totalMecanismos = 0;
foreach ($res as $data) {
    $totalMecanismos = $misReporteMecanismo->countReporteMecanismo($data['codigo']);
}

if ($rol != "usuario") {
    echo '<script language = javascript>
    alert("Por favor verifique la información registrada.");
    self.location = "../index.php"
    </script>';
    // header("Location: ../administrador/index.php");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jaziz Biológico</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <?php
    include 'librerias-css1.php';
    ?>
</head>

<body>
    <!-- Modal para descaragr informe -->
    <?php
    include './modales/modalInformes.php';
    ?>
    <div class="d-flex">
        <div id="sidebar-container" class="bg-primary">
            <div class="logo">
                <img id="logo" src="../imagenes/logo-jaziz_sf.png" alt="Logo Jaziz Biológico">
            </div>
            <div class="menu">
                <a href="indexUsuario.php" class="d-block text-light p-3"><i class="bi bi-ui-checks-grid me-2 lead"></i></>DashBoard</a>
                <a href="reporte.php" class="d-block text-light p-3"><i class="bi bi-file-earmark-text-fill me-2 lead"></i>Reportes</a>
                <a href="reporte-mecanismo.php" class="d-block text-light p-3"><i class="bi bi-gear-fill me-2 lead"></i>Reportes Mecanismo</a>
                <a href="docUsuarios.php" class="d-block text-light p-3"><i class="bi bi-file-earmark-pdf-fill me-2 lead"></i>Documentos de Usuarios</a>
                <a href="usuarios.php" class="d-block text-light p-3"><i class="bi bi-people-fill me-2 lead"></i>Usuarios</a>
                <a href="empresa.php" class="d-block text-light p-3"><i class="bi bi-buildings-fill me-2 lead"></i>Tipo de establecimiento</a>
            </div>
        </div>
        <div class="container-fluid d-block">
            <div class="w-100">
                <nav class="navbar navbar-expand-lg border-bottom">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" onclick="mostrarOcultar(event)">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0" id="navbar-nav-icons">
                                <li class="nav-item dropdown">
                                    <a href="indexUsuario.php" class="d-block text-dark p-3""><i class=" bi bi-ui-checks-grid me-2 lead"></i>DashBoard</a>
                                    <a href="reporte.php" class="d-block text-dark p-3"><i class="bi bi-file-earmark-text-fill me-2 lead"></i>Reportes</a>
                                    <a href="reporte-mecanismo.php" class="d-block text-dark p-3"><i class="bi bi-gear-fill me-2 lead"></i>Reportes Mecanismo</a>
                                    <a href="docUsuarios.php" class="d-block text-dark p-3"><i class="bi bi-file-earmark-pdf-fill me-2 lead"></i>Documentos de Usuarios</a>
                                    <a href="usuarios.php" class="d-block text-dark p-3"><i class="bi bi-people-fill me-2 lead"></i>Usuarios</a>
                                    <a href="empresa.php" class="d-block text-dark p-3"><i class="bi bi-buildings-fill me-2 lead"></i>Tipo de establecimiento</a>
                                </li>
                            </ul>
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="../modelo/salir.php" role="button" aria-expanded="false">
                                        <img src="../imagenes/avatar.png" alt="imagen de usuario" class="img-fluid rounded-circle me-2 avatar"><span class="nombreUsuario"><?php echo $nombre . " " . $apellido ?></span> <span class="btn-cerrarsesion">(Cerrar Sesión)</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="content">
                    <section class="py-3">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-9">
                                    <h1 class="font-weight-bold mb-0">Bienvenido <?php echo $nombre . " " . $apellido ?></h1>
                                    <p class="lead text-muted">Revisa la última información</p>
                                </div>
                                <div class="col-lg-3 d-flex">
                                    <button type="button" class="btn btn-primary w-100 align-self-center" data-bs-toggle="modal" data-bs-target="#modalInforme">
                                        Descargar informe
                                    </button>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="bg-mix">
                        <div class="container">
                            <div class="card rounded-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-6 d-flex stat my-3">
                                            <div class="mx-auto">
                                                <h6 class="text-muted"></h6>
                                                <h3 class="font-weight-bold"></h3>
                                                <h6 class="text-sucess"></h6>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 d-flex stat my-3">
                                            <div class="mx-auto">
                                                <h6 class="text-muted">Cantidad de visitas</h6>
                                                <h3 class="font-weight-bold"><?php echo $cantidadVisitas ?> Total</h3>
                                                <!-- <h6 class="text-sucess"><i class="bi bi-caret-up-square-fill"></i>50.50%</h6> -->
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 d-flex stat my-3">
                                            <div class="mx-auto">
                                                <h6 class="text-muted">Cantidad de mecanísmos</h6>
                                                <h3 class="font-weight-bold"><?php echo $totalMecanismos ?> Total</h3>
                                                <!-- <h6 class="text-sucess"><i class="bi bi-caret-up-square-fill"></i>50.50%</h6> -->
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 d-flex stat my-3">
                                            <div class="mx-auto">
                                                <h6 class="text-muted"></h6>
                                                <h3 class="font-weight-bold"></h3>
                                                <h6 class="text-sucess"></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="bg-grey">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 my-3">
                                    <div class="card rounded-0">
                                        <div class="card-header bg-light">
                                            <div class="row align-items-center">
                                                <div class="col col-sm-3">
                                                    <h6 class="font-weight-bold mb-0 ">Nivel de infestación</h6>
                                                </div>
                                                <!-- Filtro de establecimiento -->
                                                <div class="col col-sm-4 d-flex justify-content-end">
                                                    <label for="selectEmpresa">Establecimiento:</label>
                                                    <select id="selectEmpresa">
                                                        <?php
                                                        foreach ($misEstablecimientos as $data) {
                                                        ?>
                                                            <option value="<?php echo $data['nombre_empresa'] ?>"><?php echo $data['nombre_empresa'] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <!-- Filtro de Mes -->
                                                <div class="col col-sm-3 d-flex justify-content-end">
                                                    <label for="selectMonth">Mes:</label>
                                                    <select id="selectMonth">
                                                        <?php
                                                        foreach ($meses as $key => $monthName) {
                                                            $month = $key + 1;
                                                            echo "<option value=\"$month\">$monthName</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <!-- Filtro de Año -->
                                                <div class="col col-sm-2 d-flex justify-content-end">
                                                    <label for="selectYear">Año:</label>
                                                    <select id="selectYear">
                                                        <!-- Generar opciones del año actual hasta 2020 -->
                                                        <?php
                                                        $currentYear = date('Y');
                                                        for ($year = $currentYear; $year >= 2020; $year--) {
                                                            echo "<option value=\"$year\">$year</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div>
                                                <canvas id="tratamientos"></canvas>
                                            </div>
                                            <div style="content-visibility: hidden;">
                                                <canvas id="tratamientos1"></canvas>
                                                <canvas id="tratamientos2"></canvas>
                                                <canvas id="tratamientos3"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 my-3">
                                    <div class="card rounded-0">
                                        <div class="card-header bg-light">
                                            <div class="row align-items-center">
                                                <div class="col col-sm-3">
                                                    <h6 class="font-weight-bold mb-0 ">Sustancias</h6>
                                                </div>
                                                <!-- Filtro de establecimiento -->
                                                <div class="col col-sm-4 d-flex justify-content-end">
                                                    <label for="selectEmpresaSustancia">Establecimiento:</label>
                                                    <select id="selectEmpresaSustancia">
                                                        <?php
                                                        foreach ($misEstablecimientos as $data) {
                                                        ?>
                                                            <option value="<?php echo $data['nombre_empresa'] ?>"><?php echo $data['nombre_empresa'] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <!-- Filtro de Mes -->
                                                <div class="col col-sm-3 d-flex justify-content-end">
                                                    <label for="selectMonthSustancia">Mes:</label>
                                                    <select id="selectMonthSustancia">
                                                        <?php
                                                        foreach ($meses as $key => $monthName) {
                                                            $month = $key + 1;
                                                            echo "<option value=\"$month\">$monthName</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <!-- Filtro de Año -->
                                                <div class="col col-sm-2 d-flex justify-content-end">
                                                    <label for="selectYearSustancia">Año:</label>
                                                    <select id="selectYearSustancia">
                                                        <!-- Generar opciones del año actual hasta 2020 -->
                                                        <?php
                                                        $currentYear = date('Y');
                                                        for ($year = $currentYear; $year >= 2020; $year--) {
                                                            echo "<option value=\"$year\">$year</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div>
                                                <canvas id="sustancias"></canvas>
                                            </div>
                                            <div style="content-visibility: hidden;">
                                                <canvas id="sustancias1"></canvas>
                                                <canvas id="sustancias2"></canvas>
                                                <canvas id="sustancias3"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <!-- Bootstrap JS  -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
        <!-- Gráficas -->
        <script src="../controlador/funcionesIndexUsuario.js"></script>
        <?php
        include 'librerias-js.php';
        ?>
        <script type="text/javascript">
            $(document).ready(function() {
                console.log("Ya cargó");
                var identificacion = <?php echo $identificacion; ?>;

                // function actualizarGrafica() {
                // }
                $('#generarReporte').click(function() {
                    generarReporte(identificacion);
                });
                $("#selectEmpresa, #selectMonth, #selectYear").on("change", function() {
                    var establecimiento = $("#selectEmpresa").val();
                    var mes = $("#selectMonth").val();
                    var anio = $("#selectYear").val();
                    cargarTratamientos(identificacion, establecimiento, mes, anio);

                });

                $("#selectEmpresaSustancia, #selectMonthSustancia, #selectYearSustancia").on("change", function() {
                    var establecimiento = $("#selectEmpresaSustancia").val();
                    var mes = $("#selectMonthSustancia").val();
                    var anio = $("#selectYearSustancia").val();
                    cargarSustancias(identificacion, establecimiento, mes, anio);

                });
                // Cargar la gráfica inicialmente
                // actualizarGrafica();
            });
        </script>
</body>

</html>