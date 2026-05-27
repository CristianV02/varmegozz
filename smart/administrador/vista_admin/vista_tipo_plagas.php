<?php
require_once '../../modelo/val-admin.php';
require_once '../../modelo/datos-tipos-plagas.php';
$mis_Tipo_plagas = new misTipo_plagas();
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
                                <a href="tipo_plagas.php">
                                    <div class="thumbnail btn-activo">
                                        <div class="caption">
                                            <div>
                                                <p class="text-center">Tipo Plagas</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-2">
                                <a href="tratamiento.php">
                                    <div class="thumbnail btn-accion">
                                        <div class="caption">
                                            <div>
                                                <p class="text-center">Tratamiento</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-2">
                                <a href="nivel-infestacion.php">
                                    <div class="thumbnail btn-accion">
                                        <div class="caption">
                                            <p class="text-center">Nivel Infestacion</p>
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
                                <div class="text-center">Tratamiento</div>
                            </th>
                            <th>
                                <div class="text-center">Tipo de plaga</div>
                            </th>
                            <th>
                                <div class="text-center">Editar</div>
                            </th>
                        </thead>
                        <tbody>
                            <?php
                            $res = $mis_Tipo_plagas->viewTipo_plagas();
                            foreach ($res as $data) {
                                // Datos
                                $datos = $data['codigo'] . "||" .
                                    $data['tratamiento'] . "||" .
                                    $data['tipo_plaga'];
                            ?>
                                <tr>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['codigo']; ?></div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['tratamiento']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['tipo_plaga']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <button class="btn btn-primary bi bi-pencil-fill" data-bs-toggle="modal" data-bs-target="#modalEdicionTipo_plagas" onclick="agregarformTipoplaga('<?php echo  $datos ?>')"></button>
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
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalNuevoTipo_plagas">Crear registro</button>
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