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
				<label>sigla</label>
				<input type="text" id="sigla" class="form-control input-sm" required="">
				<br />
				<label>nombre</label>
				<input type="text" id="nombre" class="form-control input-sm" required="">
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
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<div class="modal-title">
					<h4 class="modal-title" id="myModalLabel">Actualizar</h4>
				</div>
			</div>
			<div class="modal-body">
				<label>codigo</label>
				<input type="text" id="codigou" class="form-control input-sm" placeholder="Hola" required="">
				<br />
				<label>sigla</label>
				<input type="text" id="siglau" class="form-control input-sm" required="">
				<br />
				<label>nombre</label>
				<input type="text" id="nombreu" class="form-control input-sm" required="">
				<br />
			</div>
			<div class="modal-footer">
				<div class="col-sm-6 text-left">
					<button type="button" class="btn btn-danger" data-dismiss="modal" id="eliminarDatosDocumento">
						Eliminar
					</button>
				</div>
				<div class="col-sm-6 text-right">
					<button type="button" class="btn btn-warning" data-dismiss="modal" id="actualizaDatosDocumento">
						Actualizar
					</button>
				</div>
			</div>
		</div>
	</div>
</div>