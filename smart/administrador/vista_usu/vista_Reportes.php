<?php
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
    <div id="sidebar-container" class="bg-primary">
        <div class="logo">
            <img id="logo" src="../imagenes/logo-jaziz_sf.png" alt="Logo Jaziz Biológico">
        </div>
        <div class="menu">
            <a href="indexUsuario.php" class="d-block text-light p-3"><i class="bi bi-file-earmark-text-fill me-2 lead"></i>DashBoard</a>
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
            <!-- INICIO DEL CONTENIDO -->
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
                            <div class="text-center">Nombre del establecimiento</div>
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
                        <th>
                            <div class="text-center">Ver PFD</div>
                        </th>
                    </thead>
                    <tbody>
                        <?php
                        //Se confirma que sea un usuario y se cargan los reportes de ese usuario
                        if ($rol == "usuario") {
                            $res = $mis_Reportes->viewReporteIdentificacion($identificacion);
                        } else {
                            echo '<script language = javascript>
                        alert("Por favor revisar la información del usuario....")
                        self.location = "../indexUsuario.php"
                        </script>';
                        }
                        $cant = 1;
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
                                $data['nombre_empresa'] . "||" .
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
                                            <?php echo $cant ?>
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
                                        <?php echo $data['nombre_empresa']; ?>
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
                                        $cant++;
                                    }
                                    ?>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <a href="firmaAdmin.php?reporte=<?php echo $data['codigo']; ?>&cod=2" class="btn btn-success">
                                            Firmar reporte
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <br />
            </br>
            </br>
            </br>
            </br>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>