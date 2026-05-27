<?php
require_once '../modelo/val-admin.php';
require '../modelo/datos-ficha-tecnica.php';

// Captura de parámetros GET de forma segura
$dato = isset($_GET['datos']) ? intval($_GET['datos']) : 0;
$ficha_tecnica = isset($_GET['ficha_tecnica']) ? $_GET['ficha_tecnica'] : "";

$mis_FichaTecnica = new misFichaTecnica;
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configurar Ficha Técnica | Panel Admin</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    
    <?php
    include 'librerias-css.php'; // Usa tus librerias-css estandarizadas con el CSS único
    ?>
</head>

<body id="body">

    <div class="dashboard-wrapper">
        <aside id="sidebar-container">
            <div class="logo-wrapper">
                <img id="logo" src="../imagenes/PC.jpg" alt="Logo Icoplast">
            </div>
            <nav class="menu">
                <a href="dashBoard.php" class="menu-item"><i class="bi bi-grid-1x2-fill"></i><span>DashBoard</span></a>
                <a href="user.php" class="menu-item"><i class="bi bi-people-fill"></i><span>User</span></a>
                <a href="tipo-documento.php" class="menu-item"><i class="bi bi-file-earmark-text-fill"></i><span>Tipo Documento</span></a>
                <a href="ficha_tecnica.php" class="menu-item active"><i class="bi bi-bag-fill"></i><span>Ficha Técnica</span></a>
            </nav>
        </aside>

        <div id="content-wrapper">
            
            <nav class="navbar dashboard-navbar px-4">
                <div class="container-fluid">
                    <h5 class="m-0 font-weight-bold text-muted d-none d-sm-block">
                        Fichas Técnicas / <span style="color: var(--text-main);">Configuración</span>
                    </h5>
                    
                    <div class="user-profile">
                        <a class="profile-link" href="../modelo/salir.php">
                            <img src="../imagenes/avatar.png" alt="User Avatar" class="avatar">
                            <div class="user-info-text">
                                <span class="user-name"><?php echo $nombre . " " . $apellido; ?></span>
                                <span class="btn-cerrarsesion">Cerrar Sesión</span>
                            </div>
                        </a>
                    </div>
                </div>
            </nav>

            <main class="content-body px-4">
                <div class="card p-4 shadow-sm border-0 bg-white rounded-3">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h2 class="h4 font-weight-bold m-0" style="color: #0f172a;">Estructura de la Ficha</h2>
                            <small class="text-muted">Código/Ref: <?php echo htmlspecialchars($ficha_tecnica); ?></small>
                        </div>
                        <a href="ficha_tecnica.php" class="btn btn-sm btn-outline-secondary">
                            <i class="bi bi-arrow-left me-1"></i> Volver al listado
                        </a>
                    </div>
                    
                    <div id="tablaCrearFichaTecnica" class="table-responsive"></div>
                </div>
            </main>

        </div>
    </div>

    <?php
    include './modales/modalCrearFichaTecnica.php';
    ?>

    <script src="../controlador/funciones-CrearFichaTecnica.js"></script>
    <?php
    include 'librerias-js.php';
    ?>
    
    <script type="text/javascript">
        $(document).ready(function() {
            // Extracción segura de parámetros de la URL
            var params = window.location.search;
            var fichatecnica_param = new URLSearchParams(params);
            var ficha_tecnica = fichatecnica_param.get('ficha_tecnica');
            var dato = <?php echo $dato; ?>;

            // Carga asíncrona enviando la variable correspondiente al backend
            $('#tablaCrearFichaTecnica').load(`./vista_admin/vista_Crear-ficha_tecnica.php?ficha_tecnica=${ficha_tecnica}`);

            /* --- LISTENERS PARA EVENTOS DE FORMULARIOS / MODALES --- */
            $('#agregarNuevoFichaTecnica').click(function() {
                agregardatosFichaTecnica();
            });
            
            $('#agregarNuevoUsuario').click(function() {
                agregardatosUsuario();
            });
            
            $('#agregarNuevoInforme').click(function() {
                agregardatosInforme();
            });
        });
    </script>
</body>

</html>