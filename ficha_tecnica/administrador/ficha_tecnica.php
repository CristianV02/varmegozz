<?php
require_once '../modelo/val-admin.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Fichas Técnicas | Panel Admin</title>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

	<?php
	include 'librerias-css.php'; // Incluye tu archivo CSS unificado con el escudo anti-duplicados
	?>
	<script src="../controlador/funciones-FichaTecnica.js"></script>

	<style>
		.btn-action-primary {
			background-color: var(--accent-color, #3b82f6);
			color: #ffffff !important;
			font-weight: 500;
			padding: 8px 16px;
			border-radius: 8px;
			transition: all 0.3s ease;
			border: none;
			display: inline-flex;
			align-items: center;
			gap: 8px;
			box-shadow: 0 4px 12px rgba(59, 130, 246, 0.2);
		}

		.btn-action-primary:hover {
			background-color: #2563eb;
			transform: translateY(-1px);
			box-shadow: 0 6px 16px rgba(59, 130, 246, 0.3);
		}
	</style>
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
					<h5 class="m-0 font-weight-bold text-muted d-none d-sm-block">Operaciones</h5>

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
				<style>
					/* Desvanece el menú intruso y el avatar gigante que vienen de la vista asíncrona */
					#tablaFichaTecnica ul,
					#tablaFichaTecnica li,
					#tablaFichaTecnica .navbar-nav,
					#tablaFichaTecnica img[src*="avatar.png"],
					#tablaFichaTecnica .btn-cerrarsesion,
					#tablaFichaTecnica .user-profile {
						display: none !important;
					}
				</style>

				<div class="card p-4 shadow-sm border-0 bg-white rounded-3">

					<div class="d-flex justify-content-between align-items-center mb-4">
						<h2 class="h4 font-weight-bold m-0" style="color: #0f172a;">Módulo de Fichas Técnicas</h2>

						<a href="Crear_ficha_tecnica.php" class="btn-action-primary">
							<i class="bi bi-plus-circle-fill"></i>
							<span>Crear o Editar Ficha Técnica</span>
						</a>
					</div>

					<div id="tablaFichaTecnica" class="table-responsive"></div>
				</div>
			</main>
		</div>
	</div>

	<?php
	// include './modales/modalFichaTecnica.php';
	?>

	<?php
	include './librerias-js1.php';
	?>

	<script type="text/javascript">
		$(document).ready(function() {
			// Carga asíncrona de la vista de fichas técnicas
			$('#tablaFichaTecnica').load('./vista_admin/vista_ficha_tecnica.php');

			// Listeners de eventos para el CRUD de fichas técnicas
			$('#agregarNuevoFichaTecnica').click(function() {
				agregardatosFichaTecnica();
			});

			/* Si tu botón original para agregar un registro directo iba a disparar un modal de Bootstrap, 
			   puedes mapearlo aquí, pero la redirección directa por el atributo 'href' suele ser 
			   la mejor práctica para flujos complejos de creación. */
			$('#actualizaDatosFichaTecnica').click(function() {
				modificarFichaTecnica();
			});

			$('#eliminarDatosFichaTecnica').click(function() {
				preguntarSiNoFichaTecnica();
			});
		});
	</script>
</body>

</html>