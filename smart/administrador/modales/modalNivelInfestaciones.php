<?php
require_once '../modelo/val-admin.php';
// if ($rol_id == 1) {
//   $no_modificar = "";
// } else {
//   $no_modificar = "readonly";
// }
?>
<!-- MODAL PARA INSERTAR REGISTROS -->
<div class="modal" id="modalNuevoNivelInfestaciones" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Agregar Registro</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="codigo" class="form-control input-sm" required>
                <label for="nivel">Nivel</label>
                <input type="text" id="nivel" class="form-control input-sm" required>
                <br />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="agregarNuevoNivelInfestaciones">
                    Agregar
                </button>
            </div>
        </div>
    </div>
</div>
<!-- MODAL PARA EDICION DE DATOS-->
<div class="modal" id="modalEdicionNivelInfestaciones" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
               <h4 class="modal-title">Actualizar Registro</h4>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                
            </div>
            <div class="modal-body">
                <input type="hidden" id="codigou" class="form-control input-sm" required>

                <label for="nivelu">Nivel</label>
                <input type="text" id="nivelu" class="form-control input-sm" required>
                <br />
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col col-sm-6 text-left">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" id="eliminarDatosNivelInfestaciones">
                            Eliminar
                        </button>
                    </div>
                    <div class="col col-sm-6 text-right">
                        <button type="button" class="btn btn-warning" data-dismiss="modal" id="actualizaDatosNivelInfestaciones">
                            Actualizar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>