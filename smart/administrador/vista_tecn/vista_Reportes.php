<?php
date_default_timezone_set("America/Bogota");
require_once '../../modelo/val-admin.php';
require '../../modelo/datos-Reportes.php';
require '../../modelo/datos-reporte-mecanismo.php';
require '../../modelo/datos-reporte-sustancias.php';
require '../../modelo/datos-reporte-hallazgo.php';
$mis_Reportes = new misReportes;
$misReporteMecanismo = new misReporteMecanismo;
$misReporteSustancias = new misReporteSustancias;
$misReporteHallazgo = new misReporteHallazgo;
$maxReportes = $mis_Reportes->maxReporte();
?>
<div class="d-flex">
    <!-- Inicio titulos de la pagina-->
    <div id="sidebar-container" class="bg-primary">
        <div class="logo">
            <img id="logo" src="../imagenes/logo-jaziz_sf.png" alt="Logo Jaziz Biológico">
        </div>
        <div class="menu">
            <a href="reporte.php" class="d-block text-light p-3"><i class="bi bi-file-earmark-text-fill me-2 lead"></i>Reportes</a>
        </div>
    </div>


    <!-- END PAGE HEAD-->
    <!-- INICIO DEL CONTENIDO -->

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
                                <a href="reporte.php" class="d-block text-dark p-3"><i class="bi bi-file-earmark-text-fill me-2 lead"></i>Reportes</a>
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

                <!-- Tabla de información -->
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                            <th>
                                <div class="text-center">Código</div>
                            </th>
                            <th>
                                <div class="text-center">Tipo Documento</div>
                            </th>
                            <th>
                                <div class="text-center">Usuario</div>
                            </th>
                            <th>
                                <div class="text-center">Nombre</div>
                            </th>
                            <th>
                                <div class="text-center">Fecha de Inicio</div>
                            </th>
                            <th>
                                <div class="text-center">Hora de Inicio</div>
                            </th>
                            <th>
                                <div class="text-center">Fecha Fin</div>
                            </th>
                            <th>
                                <div class="text-center">Hora Fin</div>
                            </th>
                            <th>
                                <div class="text-center">Cantidad Mecanismo</div>
                            </th>
                            <th>
                                <div class="text-center">Cantidad de Sustancias</a></div>

                            </th>
                            <th>
                                <div class="text-center">Cantidad de Hallazgos</div>
                            </th>
                            <th>
                                <div class="text-center">Ver PFD</div>
                            </th>
                        </thead>
                        <tbody>
                            <?php
                            $res = $mis_Reportes->viewReportes();
                            foreach ($res as $data) {
                                // Rol del usuario
                                // Datos
                                //Cantidad de mecanismos por reporte
                                $miReporteMecanismo = $misReporteMecanismo->countReporteMecanismo($data['codigo']);
                                $miReporteSustancias = $misReporteSustancias->countReporteSustancia($data['codigo']);
                                $miReporteHallazgo = $misReporteHallazgo->countReporteHallazgo($data['codigo']);

                                $datos = $data['codigo'] . "||" .
                                    $data['tipo_doc'] . "||" .
                                    $data['usuario'] . "||" .
                                    $data['nombre_apellido'] . "||" .
                                    $data['fecha_de_inicio'] . "||" .
                                    $data['hora_de_inicio'] . "||" .
                                    $data['fecha_fin'] . "||" .
                                    $data['hora_fin'] . "||" .
                                    $miReporteMecanismo . "||" .
                                    $miReporteSustancias . "||" .
                                    $miReporteHallazgo . "||" .
                                    $data['ver_pdf'];
                            ?>
                                <tr>
                                    <td>
                                        <div class="text-center">

                                            <label>
                                                <input type="radio" name="reporte" value=<?php echo $data['codigo'] ?> />
                                                <?php echo $data['codigo']; ?>
                                            </label>

                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['tipo_doc']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['usuario']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['nombre_apellido']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['fecha_de_inicio']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['hora_de_inicio']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['fecha_fin']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['hora_fin']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <a href="./reporte-mecanismo.php?codigo=<?php echo $data['codigo']; ?>">
                                                <?php echo $miReporteMecanismo; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <a href="./reporte-sustancias.php?codigo=<?php echo $data['codigo']; ?>">
                                                <?php echo $miReporteSustancias; ?>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <a href="./reporte-hallazgo.php?codigo=<?php echo $data['codigo']; ?>">
                                                <?php echo $miReporteHallazgo; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <?php
                                        if (true) {
                                        ?>
                                            <div class="text-center">
                                                <a type="button" target="_blank" href='../fpdf-dev/smartPDF.php?codigo=<?php echo $data['codigo']; ?>'>
                                                    <img src="../imagenes/logo-pdf.png">
                                                </a>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <!-- <td>
                            <div class="text-center">
                                <button class="btn btn-primary glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicionReportes" onclick="agregarformReportes('<?php echo  $datos ?>')"></button>
                            </div>
                        </td> -->
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- Botones de funciones -->
                <div style="margin-top: 4rem;">
                    <div class="btn btn-success">
                        <?php
                        $query = http_build_query(array(
                            'reporte'      => $maxReportes
                        ));
                        ?>
                        <a href="Crear-reporte.php?<?php echo $query; ?>" style="color: white; text-decoration: none">
                            Crear Reporte
                        </a>

                    </div>
                    <button class="btn btn-success" onclick="modificarReporte()">
                        Modificar Reporte
                    </button>
                </div>
                <br />
                </br>
                </br>
                </br>
                </br>
            </div>
        </div>

    </div>

</div>
<!-- Bootstrap JS  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });

    const modificarReporte = () => {

        const radioButtons = document.querySelectorAll('input[name="reporte"]');

        let valorSeleccionado = "";

        radioButtons.forEach(radioButton => {
            if (radioButton.checked) {
                valorSeleccionado = radioButton.value;
                return;
            }
        });

        if (valorSeleccionado !== "") {
            console.log(valorSeleccionado);
            window.location.replace(`./Modificar-reporte.php?reporte=${valorSeleccionado}`);
        } else {
            alert("Por favor, selecciona un reporte antes de continuar.");
        }
    }
    
</script>