<?php
require_once '../../modelo/val-admin.php';
require_once '../../modelo/datos-usuarios.php';
require_once '../../modelo/datos-reporte-hallazgo.php';
$mis_Usuarios = new misUsuarios();
$mis_ReporteHallazgo = new misReporteHallazgo();
if(isset($_GET['codigo'])){
    $cod_reporte = $_GET['codigo'];
} else{
    $cod_reporte = "";
}
?>
<div class="d-flex">
    <!-- Inicio titulos de la pagina-->
    <div id="sidebar-container" class="bg-primary">
        <div class="logo">
            <img id="logo" src="../imagenes/logo-jaziz_sf.png" alt="Logo Jaziz Biológico">
        </div>
        <div class="menu">
            <a href="reporte.php" class="d-block text-light p-3"><i class="bi bi-file-earmark-text-fill me-2 lead"></i>Reportes</a>
            <a href="usuarios.php" class="d-block text-light p-3"><i class="bi bi-people-fill me-2 lead"></i>Usuarios y empresa</a>
            <a href="mecanismo.php" class="d-block text-light p-3"><i class="bi bi-gear-fill me-2 lead"></i>Mecanismos</a>
            <a href="sustancias.php" class="d-block text-light p-3"><i class="bi bi-droplet-half me-2 lead"></i>Sustancias</a>
            <a href="tipo_plagas.php" class="d-block text-light p-3"><i class="bi bi-bug-fill me-2 lead"></i>Tipo de plagas</a>
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
                                <a href="usuarios.php" class="d-block text-dark p-3"><i class="bi bi-people-fill me-2 lead"></i>Usuarios y empresa</a>
                                <a href="mecanismo.php" class="d-block text-dark p-3"><i class="bi bi-gear-fill me-2 lead"></i>Mecanismos</a>
                                <a href="sustancias.php" class="d-block text-dark p-3"><i class="bi bi-droplet-half me-2 lead"></i>Sustancias</a>
                                <a href="tipo_plagas.php" class="d-block text-dark p-3"><i class="bi bi-bug-fill me-2 lead"></i>Tipo de plagas</a>
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
                <!-- Botones superiores - BREADCRUM -->
                <section class="py-3">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-2">
                                <a href="reporte.php">
                                    <div class="thumbnail btn-activo">
                                        <div class="caption">
                                            <div>
                                                <p class="text-center">Reportes</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-2">
                                <a href="reporte-mecanismo.php">
                                    <div class="thumbnail btn-accion">
                                        <div class="caption">
                                            <div>
                                                <p class="text-center">Reportes Mecanismo</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-2">
                                <a href="docUsuarios.php">
                                    <div class="thumbnail btn-accion">
                                        <div class="caption">
                                            <p class="text-center">Archivos de Usuarios</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-3"></div>
                        </div>
                    </div>
                </section>
                <!-- INICIO DEL CONTENIDO -->
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                            <th>
                                <div class="text-center">Código</div>
                            </th>
                            <th>
                                <div class="text-center">Usuario</div>
                            </th>
                            <th>
                                <div class="text-center">Nombre</div>
                            </th>
                            <th>
                                <div class="text-center">Hallazgo</div>
                            </th>
                            <th>
                                <div class="text-center">Código Reporte</div>
                            </th>
                            <th>
                                <div class="text-center">Foto1</div>
                            </th>
                            <th>
                                <div class="text-center">Oportunidad de Mejora 1</div>
                            </th>
                            <th>
                                <div class="text-center">Foto2</div>
                            </th>
                            <th>
                                <div class="text-center">Oportunidad de Mejora 2</div>
                            </th>
                            <th>
                                <div class="text-center">Foto3</div>
                            </th>
                            <th>
                                <div class="text-center">Oportunidad de Mejora 3</div>
                            </th>
                            <th>
                                <div class="text-center">Foto4</div>
                            </th>
                            <th>
                                <div class="text-center">Oportunidad de Mejora 4</div>
                            </th>
                        </thead>
                        <tbody>
                            <?php
                            $res = $mis_ReporteHallazgo->viewReporteHallazgo($cod_reporte);
                            foreach ($res as $data) {
                                // Datos
                                $datos = $data['codigo'] . "||" .
                                    $data['usuario'] . "||" .
                                    $data['hallazgo'] . "||" .
                                    $data['cod_reporte'] . "||" .
                                    $data['foto1'] . "||" .
                                    $data['oportunidad_1'] . "||" .
                                    $data['foto2'] . "||" .
                                    $data['oportunidad_2'] . "||" .
                                    $data['foto3'] . "||" .
                                    $data['oportunidad_3'] . "||" .
                                    $data['foto4'] . "||" .
                                    $data['oportunidad_4'];

                                $mi_usuario = $mis_Usuarios->viewUsuarioDocumento($data['usuario']);

                            ?>
                                <tr>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['codigo']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['usuario']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $mi_usuario[0]['nombre'] . " " . $mi_usuario[0]['apellido']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['hallazgo']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['cod_reporte']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['foto1']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['oportunidad_1']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['foto2']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['oportunidad_2']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['foto3']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['oportunidad_3']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['foto4']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['oportunidad_4']; ?>
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
                <br />
                <br />
                <br />
                <br />
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>