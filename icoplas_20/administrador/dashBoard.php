<?php
require_once '../modelo/val-admin.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Icolplast_20</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link href="../librerias/indexDashBoard.css" rel="stylesheet" type="text/css" />
    <link rel="icon" href="../imagenes/logo_icolplast1.ico">
</head>

<body>
    
    <div class="d-flex">
        <!-- Inicio titulos de la pagina-->
        <div id="sidebar-container" class="bg-primary">
            <div class="logo">
                <img id="logo" src="../imagenes/logo_icolplast1.png" alt="Logo Icoplast">
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
            
                <section class="py-3">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-9">
                                <h1 class="font-weight-bold mb-0">Bienvenido <?php echo $nombre . " " . $apellido ?></h1>
                                <p class="lead text-muted">Icolplast_La_20</p>
                                <i class="fa-regular fa-bug"></i>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

</body>

<script>
    function mostrarOcultar(event) {
        event.stopPropagation();
        var navbarCollapse = document.getElementById("navbarSupportedContent");
        if (navbarCollapse.style.display === "none") {
            navbarCollapse.style.display = "block"; // Si está oculto, mostrarlo
        } else {
            navbarCollapse.style.display = "none"; // Si está visible, ocultarlo
        }
    }
</script>

</html>