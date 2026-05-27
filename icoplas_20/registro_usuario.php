<?php
if (isset($_GET['codigo'])) {
	$codigo = $_GET['codigo'];
	$codigo = 1;
} else {
	$codigo = "";
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Apoyos Socioeconómicos</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link href="./librerias/miestilo1.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<div class="container">
		<!-- INICIO HEADER -->
		<header>
			<div class="row">
				<div class="col-sm-3 header_logo">
					<img class="imagen_logo" src="./imagenes/aprendiz.png" alt="Logo SENA" width="auto" />
				</div>
				<div class="col-sm-6"></div>
				<div class="col-sm-3 header_mintic">
					<img src="./imagenes/Logo-Mintrabajo-s72.png" alt=" LogoMinisterio de trabajo">
				</div>
			</div>
		</header>
		<!-- FIN HEADER -->
		<!-- Inicio Línea horizontal -->
		<hr style="border:0px; border-top: 5px double #999999;" />
		<!-- Fin Línea horizontal -->
		<!-- INICIO FORMULARIO PARA LOGEO DE LAS PERSONAS -->
		<div class="row">
			<div class="col-sm-12 text-center mt-5">
				<h1>Centro de Formación para el Desarrollo Rural y Minero - CEDRUM<br /></h1>
				<h2 class="titulo_app">Seguimiento y consulta de aprendices con apoyos Socioeconómicos</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-6">
				<h2 class="mt-3">Registro Nuevo Usuario</h2>
				<form action="./modelo/acciones-registrar_usuario.php" method="POST" class="form-horizontal">
					<div class="form-group w-75">
						<label>Tipo documento</label>
						<input type="text" id="tipo_documento" class="form-control input-sm" required="">
						<br />
						<label>Número de Identificación</label>
						<input type="text" id="numero_documento" class="form-control input-sm" required="">
						<br />
						<label>Nombre y apellidos</label>
						<input type="text" id="nombre" class="form-control input-sm" required="">
						<br />
						<!-- <label>Usuario</label>
				<input type="text" id="usuario" class="form-control input-sm" required="">
				<br /> -->
						<!-- <label>Contraseña</label>
				<input type="password" id="contrasena" class="form-control input-sm" required="">
				<br /> -->
						<label>Correo</label>
						<input type="text" id="email" class="form-control input-sm" required="">
						<br />
						<label for="rol_id">Cargo</label>
						<select id="rol_id" class="form-control" required>
							<!-- <option value="2">Administrador</option> -->
							<option value="3">Instructor</option>
							<option value="3">Bienestar</option>
							<option value="3">Líderes</option>
							<option value="2">Coordinador</option>
						</select>
						<br />
						<div class="text-end">
						<button class="btn btn-primary" type="submit" id="submitButton">Registrar</button>
						</div>
					</div>
				</form>
			</div>
			<div class="col-sm-2"></div>
		</div>
	</div>
	<!--Footer-->
	<footer>
		<!-- <div class="col-sm-12 text-center"> -->
		<span>Desarrollado: Tecnoparque Nodo Cúcuta</span>
		<span> - CEDRUM</span>
		<!-- </div> -->
	</footer>
	<script src="librerias/js/jquery-3.3.1.min.js" type="text/javascript"></script>
	<script src="librerias/js/bootstrap.min.js" type="text/javascript"></script>
</body>

</html>