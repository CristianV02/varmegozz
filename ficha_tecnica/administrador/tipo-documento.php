<?php
require_once '../modelo/val-admin.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tipos de Documento | Panel Admin</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    
    <?php
    include 'librerias-css.php'; // Aquí se incluye tu CSS unificado que controla tamaños y limpia duplicados
    ?>
    <script src="../controlador/funciones-tipo-documento.js"></script>
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
                <a href="tipo-documento.php" class="menu-item active"><i class="bi bi-file-earmark-text-fill"></i><span>Tipo Documento</span></a>
                <a href="ficha_tecnica.php" class="menu-item"><i class="bi bi-bag-fill"></i><span>Ficha Técnica</span></a>
            </nav>
        </aside>

        <div id="content-wrapper">
            
            <nav class="navbar dashboard-navbar px-4">
                <div class="container-fluid">
                    <h5 class="m-0 font-weight-bold text-muted d-none d-sm-block">Configuraciones</h5>
                    
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
                        <h2 class="h4 font-weight-bold m-0" style="color: #0f172a;">Listado de Tipos de Documento</h2>
                        </div>
                    
                    <div id="tablaDocumento" class="table-responsive"></div>
                </div>
            </main>

        </div>
    </div>

    <?php
    include './modales/modalTipoDocumento.php';
    ?>

    <?php
    include 'librerias-js1.php';
    ?>
    
    <script type="text/javascript">
        $(document).ready(function() {
            // Carga asíncrona de la vista de tipo documento
            $('#tablaDocumento').load('./vista_admin/vista_tipo_documento.php');

            // Listeners de eventos para el CRUD de documentos
            $('#agregarNuevoDocumento').click(function() {
                agregarDatosDocumento();
            });

            $('#actualizaDatosDocumento').click(function() {
                modificarDocumento();
            });

            $('#eliminarDatosDocumento').click(function() {
                preguntarSiNoDocumento();
            });
        });
    </script>
</body>

</html>