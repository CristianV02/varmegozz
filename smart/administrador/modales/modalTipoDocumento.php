<?php
require_once '../modelo/val-admin.php';
// if ($rol == 3) {
//   $no_modificar = "readonly";
// } else {
//   $no_modificar = "";
// }
?>
<!-- MODAL PARA INSERTAR REGISTROS -->
<div class="modal" id="modalNuevoDocumentos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Agregar Registro</h4>
			</div>
			<div class="modal-body">
				<label for="sigla">Sigla</label>
				<input type="text" id="sigla" class="form-control input-sm" required>
				<br />
				<label for="nombre">Nombre</label>
				<input type="text" id="nombre" class="form-control input-sm" required>
				<br />
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal" id="agregarNuevoDocumento">
					Agregar
				</button>
			</div>
		</div>
	</div>
</div>
<!-- MODAL PARA EDICION DE DATOS-->
<div class="modal" id="modalEdicionDocumentos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Actualizar Registro</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<label for="codigou">Código</label>
				<input type="text" id="codigou" class="form-control input-sm" required>
				<br />
				<label for="siglau">Sigla</label>
				<input type="text" id="siglau" class="form-control input-sm" required>
				<br />
				<label for="nombreu">Nombre</label>
				<input type="text" id="nombreu" class="form-control input-sm" required>
				<br />
			</div>
			<div class="modal-footer">
				<div class="row">
					<div class="col col-sm-6 text-left">
						<button type="button" class="btn btn-danger" data-dismiss="modal" id="eliminarDatosDocumento">
							Eliminar
						</button>
					</div>
					<div class="col col-sm-6 text-right">
						<button type="button" class="btn btn-warning" data-dismiss="modal" id="actualizaDatosDocumento">
							Actualizar
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>