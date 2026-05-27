<?php
require_once '../modelo/val-admin.php';
// if ($rol_id == 1) {
//   $no_modificar = "";
// } else {
//   $no_modificar = "readonly";
// }

?>
<!-- MODAL PARA INSERTAR REGISTROS -->
<div class="modal fade" id="modalNuevoHallazgos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Agregar Registro</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="codigo" class="form-control input-sm" required>
                <label>donde_se_ncuentra</label>
                <input type="text" id="donde_se_encuentra" class="form-control input-sm" required>
                <br />
                <label>descripcion</label>
                <input type="text" id="descripcion" class="form-control input-sm" required>
                <br />
                <label>mejora</label>
                <input type="text" id="mejora" class="form-control input-sm" required>
                <br />
                <label>fotos</label>
                <input type="text" id="fotos" class="form-control input-sm" required>
                <br />
                <label>identificacion_cliente</label>
                <input type="text" id="identificaciones_cliente" class="form-control input-sm" required>
                <br />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="agregarNuevoHallazgos">
                    Agregar
                </button>
            </div>
        </div>
    </div>
</div>
<!-- MODAL PARA EDICION DE DATOS-->
<div class="modal fade" id="modalEdicionHallazgos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Actualizar codigo</h4>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                
            </div>
            <div class="modal-body">
                <input type="hidden" id="codigou" class="form-control input-sm" required>
                <label>donde_se_encuentra</label>
                <input type="text" id="donde_se_encuentrau" class="form-control input-sm" required>
                <br />
                <label>descripcion</label>
                <input type="text" id="descripcionu" class="form-control input-sm" required>
                <br />
                <label>mejora</label>
                <input type="text" id="mejorau" class="form-control input-sm" required>
                <br />
                <label>fotos </label>
                <input type="text" id="fotosu" class="form-control input-sm" required>
                <br />
                <label>identificacion_cliente</label>
                <input type="text" id="identificaciones_clienteu" class="form-control input-sm" required>
                <br />
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col col-sm-6 text-left">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" id="eliminarDatosHallazgos">
                            Eliminar
                        </button>
                    </div>
                    <div class="col col-sm-6 text-right">
                        <button type="button" class="btn btn-warning" data-dismiss="modal" id="actualizaDatosHallazgos">
                            Actualizar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>