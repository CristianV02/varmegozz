<?php
require_once '../../modelo/val-admin.php';
// Validamos el usuario
if ($rol_id != 1) {
	echo '<script language = javascript>
    alert ("Debe seleccionar una empresa.") 
    self.location="../index.php"
    </script>';
}
?>
<div class="col-sm-12">
	<!-- Inicio titulos de la pagina-->
	<div class="page-head">
		<div class="page-head">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h2>Cargar archivos de Apoyos SocioEconómicos
					<small>SENA</small>
				</h2>
			</div>
			<!-- END PAGE TITLE -->
		</div>
		<!-- END PAGE HEAD-->
		<!-- BEGIN PAGE BREADCRUMB -->
		<ul class="page-breadcrumb breadcrumb">
			<li>
				<a href="index.php">Inicio</a>
				<i class="fa fa-circle"></i>
			</li>
			<li>
				<a href="configuracion.php">Configuración</a>
				<i class="fa fa-circle"></i>
			</li>
			<li>
				<span class="active">Cargar Archivos</span>
			</li>
		</ul>
		<!-- END PAGE BREADCRUMB -->
		<!-- BEGIN PAGE BASE CONTENT -->
		<!-- INICIO DEL CONTENIDO -->
		<h3 class="text-center">Cargar los archivos</h3>
		<div class="col-sm-12">
			<div class="col-sm-4"></div>
			<div class="col-sm-4 text-center">
				<table class="table">
					<thead>
						<tr>
							<th class="text-center">Documento de Excel</th>
						</tr>
					</thead>
				</table>
			</div>
			<div class="col-sm-4"></div>
		</div>
		<div class="col-sm-12">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<!-- <form action="../modelo/cargarArchivoCoordinaciones.php" method="post" enctype="multipart/form-data"> -->
				<form action="../modelo/cargarArchivo.php" method="post" enctype="multipart/form-data">
					<table id="example" class="table table-striped table-bordered">
						<tr>
							<td>
								<div class="text-center">Documento</div>
							</td>
							<td>
								<div class="text-center">
									<input type="file" name="excel" class="form-control-file" id="documento" required="">
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="text-center">Tipo documento</div>
							</td>
							<td>
								<div class="text-center">
									<select type="file" name="tipoDoc" class="form-select" id="documento" required="">
										<option value="1">Apoyos</option>
										<option value="2">Coordinaciones</option>
									</select>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="text-center"></div>
							</td>
							<td>
								<div class="text-center">
									<input type="submit" name="enviar" class="btn btn-success" value="Subir archivos">
									<input type="hidden" value="upload" name="action" />
								</div>
							</td>
						</tr>
					</table>
				</form>
			</div>
			<div class="col-sm-4"></div>
		</div>
		<br />
		<br />
	</div>
</div>