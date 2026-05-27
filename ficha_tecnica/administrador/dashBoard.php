<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../modelo/val-admin.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha Técnica - Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link href="../librerias/indexDashBoard.css" rel="stylesheet" type="text/css" />
</head>

<body>

    <div class="dashboard-wrapper">
        <aside id="sidebar-container">
            <div class="logo-wrapper">
                <img id="logo" src="../imagenes/PC.jpg" alt="Logo Icoplast">
            </div>
            <nav class="menu">
                <a href="dashBoard.php" class="menu-item active"><i class="bi bi-grid-1x2-fill"></i><span>DashBoard</span></a>
                <a href="user.php" class="menu-item"><i class="bi bi-people-fill"></i><span>User</span></a>
                <a href="tipo-documento.php" class="menu-item"><i class="bi bi-file-earmark-text-fill"></i><span>Tipo Documento</span></a>
                <a href="ficha_tecnica.php" class="menu-item"><i class="bi bi-bag-fill"></i><span>Ficha Técnica</span></a>
            </nav>
        </aside>

        <div id="content-wrapper">
            <nav class="navbar navbar-expand-lg dashboard-navbar">
                <div class="container-fluid px-4">
                    <button class="menu-toggle-btn d-lg-none" type="button" onclick="toggleSidebar()">
                        <i class="bi bi-list"></i>
                    </button>

                    <div class="ms-auto d-flex align-items-center">
                        <div class="user-profile">
                            <a class="profile-link" href="../modelo/salir.php">
                                <img src="../imagenes/avatar.png" alt="User Avatar" class="avatar">
                                <div class="user-info-text">
                                    <span class="user-name"><?php echo $nombre . " " . $apellido ?></span>
                                    <span class="logout-label">Cerrar Sesión</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </nav>

            <main class="content-body">
                <div class="container-fluid px-4">
                    <div class="welcome-card mb-4">
                        <div class="row align-items-center">
                            <div class="col-md-7 welcome-text-col">
                                <span class="badge-welcome">Panel de Administración</span>
                                <h1 class="welcome-title">Bienvenido de vuelta, <?php echo $nombre . " " . $apellido ?>!</h1>
                                <p class="welcome-subtitle">Gestiona tus fichas técnicas, usuarios y configuraciones del sistema desde un solo lugar.</p>
                                <span class="brand-tag">Varmegoz</span>
                            </div>
                            <div class="col-md-5 text-center welcome-img-col">
                                <div class="brand-images-grid">
                                    <img src="../imagenes/varmegoz.png" alt="Varmegoz" class="brand-img-primary">
                                    <img src="../imagenes/logo_santi.jpg" alt="Santi" class="brand-img-secondary">
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </main>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar-container');
            sidebar.classList.toggle('active');
        }
    </script>
</body>

</html>