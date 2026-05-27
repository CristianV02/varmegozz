<?php
require_once '../../modelo/val-admin.php';
require_once '../../modelo/datos-usuarios.php';
require_once '../../modelo/datos-docUsuarios.php';
require '../../modelo/datos-rol.php';
// Instancias
$misusuarios = new misUsuarios();
$misDocUsuarios = new misDocUsuarios();
$misroles = new misRoles();

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
                            <div class="text-center">Nombre del Documento</div>
                        </th>
                        <th>
                            <div class="text-center">Descripción</div>
                        </th>
                        <th>
                            <div class="text-center">Archivo</div>
                        </th>

                        <?php
                        if ($rol != "usuario") {
                        ?>
                            <th>
                                <div class="text-center">Visible por</div>
                            </th>
                            <th>
                                <div class="text-center">Cargar archivo</div>
                            </th>

                            <th>
                                <div class="text-center">Editar</div>
                            </th>
                        <?php
                        }
                        ?>
                    </thead>
                    <tbody>
                        <?php
                        $cant = 1;
                        if ($rol == "usuario") {
                            $res = $misDocUsuarios->viewDocUsuarioId($identificacion);
                        } else {
                            echo '<script language = javascript>
                        alert("Por favor revisar la información del usuario....")
                        self.location = "../indexUsuario.php"
                        </script>';
                        }
                        foreach ($res as $data) {
                            // Rol del usuario
                            $cant_usuarios = 1;
                            // $rol = $misroles->viewRol($data['rol']);
                            // Datos
                            $datos = $data['codigo'] . "||" .
                                $data['nombre'] . "||" .
                                $data['descripcion'] . "||" .
                                $data['archivo'] . "||" .
                                $data['id_cliente'];
                            if ($data['id_cliente'] != 0) {
                                $mi_usuario = $misusuarios->viewUsuarioDocumento($data['id_cliente']);
                                $visiblePor = $mi_usuario[0]['nombre'] . " " . $mi_usuario[0]['apellido'];
                            } else {
                                $visiblePor = "Todos";
                            }
                        ?>
                            <tr>
                                <td>
                                    <div class="text-center">
                                        <?php echo $cant; ?></div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <?php echo $data['nombre']; ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <?php echo $data['descripcion']; ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <a target="_blank" href="../documentos_usuarios/<?php echo $data['archivo']; ?>"><?php echo $data['archivo']; ?></a>
                                    </div>
                                </td>

                                <?php
                                if ($rol != "usuario") {
                                ?>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $visiblePor; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center"><a href="./cargarArchivoUsuario.php?codigo=<?php echo $data['codigo']; ?>">Cargar archivo</a></div>
                                    </td>

                                    <td>
                                        <div class="text-center">
                                            <button class="btn btn-primary bi bi-pencil-fill" data-toggle="modal" data-target="#modalEdicionDocUsuario" onclick="agregarformDocUsuario('<?php echo  $datos ?>')"></button>
                                        </div>
                                    </td>
                                <?php
                                }
                                ?>
                            </tr>
                        <?php
                            $cant++;
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