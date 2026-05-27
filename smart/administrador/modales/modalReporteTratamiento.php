<?php
require_once '../modelo/val-admin.php';
require_once '../modelo/datos-tipos-plagas.php';
require_once '../modelo/datos-tratamiento.php';
require_once '../modelo/datos-usuarios.php';
$mis_Usuarios = new misUsuarios;
$mis_tratamiento = new misTratamiento;
$mis_tipo_plagas = new misTipo_plagas;
// if ($rol_id == 1) {
//   $no_modificar = "";
// } else {
//   $no_modificar = "readonly";
// }
?>
<!-- MODAL PARA INSERTAR REGISTROS -->
<div class="modal" id="modalNuevoReporteTratamiento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar Registro</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="codigo" class="form-control input-sm" required>
                <label for="usuario">Usuario</label>
                <select id="usuario" class="form-control" required>
                    <?php
                    $mi_Usuario = $mis_Usuarios->viewUsuarios();
                    foreach ($mi_Usuario as $value) {
                    ?>
                        <option value="<?php echo $value['identificacion']; ?>"><?php echo $value['identificacion']; ?> - <?php echo $value['nombre']; ?></option>

                    <?php
                    }
                    ?>
                </select>
                <br />
                <label for="tratamiento">Tratamiento</label>
                <select type="text" id="tratamiento" class="form-control" required>
                    <?php
                    $mi_tratamiento = $mis_tratamiento->viewTratamientos();
                    foreach ($mi_tratamiento as $value) { ?>
                        <option value="<?php echo $value['tratamiento'] ?>"><?php echo $value['tratamiento'] ?></option>
                    <?php
                    }
                    ?>
                </select>
                <br />
                <label for="tipo_plagas">Tipo Plagas</label>
                <select type="text" id="tipo_plagas" class="form-control" required>
                    <?php
                    $mi_tipo_plagas = $mis_tipo_plagas->viewTipo_plagas();
                    foreach ($mi_tipo_plagas as $value) { ?>
                        <option value="<?php echo $value['tipo_plaga'] ?>"><?php echo $value['tipo_plaga'] ?></option>
                    <?php
                    }
                    ?>
                </select>
                <br />
                <label for="cod_reporte">Código Reporte</label>
                <input type="number" id="cod_reporte" class="form-control input-sm" required>
                <br />

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="agregarNuevoReporteTratamiento">
                    Agregar
                </button>
            </div>
        </div>
    </div>
</div>
<!-- MODAL PARA EDICION DE DATOS-->
<div class="modal" id="modalEdicionReporteTratamiento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <h4 class="modal-title">Actualizar Reporte</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="codigou" class="form-control input-sm" required>
                <label for="usuariou">Usuario</label>
                <select id="usuariou" class="form-control" required>
                    <?php
                    $mi_Usuario = $mis_Usuarios->viewUsuarios();
                    foreach ($mi_Usuario as $value) {
                    ?>
                        <option value="<?php echo $value['identificacion']; ?>"><?php echo $value['identificacion']; ?> - <?php echo $value['nombre']; ?></option>

                    <?php
                    }
                    ?>
                </select>
                <br />
                <label for="tratamientou">Tratamiento</label>
                <select type="text" id="tratamientou" class="form-control" required>
                    <?php
                    $mi_tratamiento = $mis_tratamiento->viewTratamientos();
                    foreach ($mi_tratamiento as $value) { ?>
                        <option value="<?php echo $value['tratamiento'] ?>"><?php echo $value['tratamiento'] ?></option>
                    <?php
                    }
                    ?>
                </select>
                <br />
                <label for="tipo_plagasu">Tipo Plagas</label>
                <select type="text" id="tipo_plagasu" class="form-control" required>
                    <?php
                    $mi_tipo_plagas = $mis_tipo_plagas->viewTipo_plagas();
                    foreach ($mi_tipo_plagas as $value) { ?>
                        <option value="<?php echo $value['tipo_plaga'] ?>"><?php echo $value['tipo_plaga'] ?></option>
                    <?php
                    }
                    ?>
                </select>
                <br />
                <label for="cod_reporteu">Código Reporte</label>
                <input type="number" id="cod_reporteu" class="form-control input-sm" required>
                <br />
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col col-sm-6 text-left">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" id="eliminarDatosReporteTratamiento">
                            Eliminar
                        </button>
                    </div>
                    <div class="col col-sm-6 text-right">
                        <button type="button" class="btn btn-warning" data-dismiss="modal" id="actualizaDatosReporteTratamiento">
                            Actualizar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>