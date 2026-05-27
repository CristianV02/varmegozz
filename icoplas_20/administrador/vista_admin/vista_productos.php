<?php
require_once '../../modelo/val-admin.php';
require_once '../../modelo/datos_producto.php';
$mis_Producto = new misProductos();
?>
<div class="d-flex">
    <!-- Inicio titulos de la pagina-->
    <div id="sidebar-container" class="bg-primary">
        <div class="logo">
            <img id="logo" src="../imagenes/Logo_Icotplast.png" alt="Logo Icoplast">
        </div>
        <div class="menu">
                <a href="dashBoard.php" class="d-block text-light p-3"><i class="bi bi-people-fill me-2 lead"></i>DashBoard</a>
                <a href="usuarios.php" class="d-block text-light p-3"><i class="bi bi-people-fill me-2 lead"></i>Usuarios</a>
                <a href="tipo-documento.php" class="d-block text-light p-3"><i class="bi bi-file-earmark-text-fill me-2 lead"></i>Tipo Documento</a>
                <a href="productos.php" class="d-block text-light p-3"><i class="bi bi-bag me-2 lead"></i>Productos</a>
                <a href="ventas.php" class="d-block text-light p-3"><i class="bi bi-cart4 me-2 lead"></i>Ventas</a>
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
                                <a href="usuarios.php" class="d-block text-dark p-3"><i class="bi bi-people-fill me-2 lead"></i>Usuarios</a>
                                <a href="tipo-documento.php" class="d-block text-dark p-3"><i class="bi bi-file-earmark-text-fill me-2 lead"></i>Tipo Documento</a>
                                <a href="productos.php" class="d-block text-dark p-3"><i class="bi bi-bag me-2 lead"></i>Productos</a>
                                <a href="ventas.php" class="d-block text-dark p-3"><i class="bi bi-bag me-2 lead"></i>Ventas</a>
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
                <h3>Productos</h3>
            </div>
            <!-- INICIO DEL CONTENIDO -->
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered">
                    <thead>
                        <th>
                            <div class="text-center">Codigo</div>
                        </th>
                        <th>
                            <div class="text-center">Id <br /> Producto</div>
                        </th>
                        <th>
                            <div class="text-center">Nombre de <br /> Producto</div>
                        </th>
                        <th>
                            <div class="text-center">Precio de <br /> Producto</div>
                        </th>
                        <th>
                            <div class="text-center">Marca de <br /> Producto</div>
                        </th>
                        <th>
                            <div class="text-center">Editar</div>
                        </th>
                    </thead>
                    <tbody>
                        <?php
                        $res = $mis_Producto->viewProductos();
                        foreach ($res as $data) {
                            // Datos
                            $datos = $data['codigo'] . "||" .
                                $data['id_producto'] . "||" .
                                $data['nombre_producto'] . "||" .
                                $data['precio_producto'] . "||" .
                                $data['marca_producto'];
                        ?>
                            <tr>
                                <td>
                                    <div class="text-center">
                                        <?php echo $data['codigo']; ?></div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <?php echo $data['id_producto']; ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <?php echo $data['nombre_producto']; ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <?php echo $data['precio_producto']; ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <?php echo $data['marca_producto']; ?>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn btn-primary bi bi-pencil-fill" data-bs-toggle="modal" data-bs-target="#modalEdicionProducto" onclick="agregarformProducto('<?php echo  $datos ?>')"></button>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <br />
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalNuevoProducto">Crear productos</button>
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