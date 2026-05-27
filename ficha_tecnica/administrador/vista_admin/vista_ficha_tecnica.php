<?php
require_once '../../modelo/val-admin.php';
require_once '../../modelo/datos-ficha-tecnica.php';
require_once '../../modelo/datos-informe.php';
// Instancias
$mis_FichaTecnica = new misFichaTecnica();
$mis_Informe = new misInforme();
$maxFichaTecnicas = $mis_FichaTecnica->maxFichaTecnica();

?>
<div class="d-flex">
    <!-- Inicio titulos de la pagina-->
    <div id="sidebar-container" class="bg-primary">
        <div class="logo">
            <img id="logo" src="../imagenes/mantenimiento.png" alt="Logo Icoplast">
        </div>
        <div class="menu">
            <a href="dashBoard.php" class="d-block text-light p-3"><i class="bi bi-people-fill me-2 lead"></i>DashBoard</a>
            <a href="user.php" class="d-block text-light p-3"><i class="bi bi-people-fill me-2 lead"></i>User</a>
            <a href="tipo-documento.php" class="d-block text-light p-3"><i class="bi bi-file-earmark-text-fill me-2 lead"></i>Tipo Documento</a>
            <a href="ficha_tecnica.php" class="d-block text-light p-3"><i class="bi bi-bag me-2 lead"></i>Ficha Tecnica</a>
        </div>
    </div>

    <!-- END PAGE HEAD-->
    <!-- INICIO DEL CONTENIDO -->
     
    <div class="container-fluid d-block">
        <div class="w-100">
            <nav class="navbar navbar-expand-lg border-bottom">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
                        onclick="mostrarOcultar(event)">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0"
                            id="navbar-nav-icons">
                            <li class="nav-item dropdown">
                                <a href="dashBoard.php" class="d-block text-dark p-3"><i class="bi bi-people-fill me-2 lead"></i>DashBoard</a>
                                <a href="user.php" class="d-block text-dark p-3"><i class="bi bi-people-fill me-2 lead"></i>User</a>
                                <a href="tipo-documento.php" class="d-block text-dark p-3"><i class="bi bi-file-earmark-text-fill me-2 lead"></i>Tipo Documento</a>
                                <a href="ficha_tecnica.php" class="d-block text-dark p-3"><i class="bi bi-bag me-2 lead"></i>FIcha Tecnica</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="../modelo/salir.php" role="button" aria-expanded="false">
                                    <img src="../imagenes/avatar.png" alt="imagen de usuario" class="img-fluid rounded-circle me-2 avatar">
                                    <?php echo $nombre . " " . $apellido ?> <span class="btn-cerrarsesion">(Cerrar Sesión)</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="text">
                <h3>FIcha Tecnica</h3>
            </div>
            <!-- INICIO DEL CONTENIDO -->
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered">
                    <thead>
                        <th>
                            <div class="text-center">Codigo</div>
                        </th>
                        <th>
                            <div class="text-center">Nombre Propietario</div>
                        </th>
                        <th>
                            <div class="text-center">Identificación</div>
                        </th>
                        <th>
                            <div class="text-center">Telefono</div>
                        </th>
                        <th>
                            <div class="text-center">Informe</div>
                        </th>

                    </thead>
                    <tbody>
                        <?php
                        $res = $mis_FichaTecnica->viewFichaTecnicas();
                        foreach ($res as $data) {
                            $miInforme = $mis_Informe->countInforme($data['codigo']);
                            // Datos
                            $datos = $data['codigo'] . "||" .
                                $data['nombre_propietario'] . "||" .
                                $data['identificacion'] . "||" .
                                $data['telefono'] . "||" .
                                $data['datos_compu'];
                        ?>
                            <tr>
                                <td>
                                    <div class="text-center">
                                        <?php echo $data['codigo']; ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <?php echo $data['nombre_propietario']; ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <?php echo $data['identificacion']; ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <?php echo $data['telefono']; ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <a href="./informe.php?codigo=<?php echo $data['codigo']; ?>">
                                            <?php echo $miInforme; ?>
                                    </div>
                                </td>
                                <!-- <td>
                                    <button class="btn btn-primary bi bi-pencil-fill" data-bs-toggle="modal" data-bs-target="#modalEdicionFichaTecnica" onclick="agregarformfichaTecnica('<?php echo  $datos ?>')"></button>
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
                        'ficha_tecnica'      => $maxFichaTecnicas
                    ));
                    ?>
                    <a href="Crear-ficha_tecnica.php?<?php echo $query; ?>" style="color: white; text-decoration: none">
                        Crear Ficha Tecnica
                    </a>

                </div>
            </div>
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