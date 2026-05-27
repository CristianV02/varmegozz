<?php
require_once '../modelo/val-admin.php';
require '../modelo/datos-nombre-mecanismos.php';
$misnombremecanismo = new misNombreMecanismos;
// if ($rol_id == 1) {
//   $no_modificar = "";
// } else {
//   $no_modificar = "readonly";
// }
?>
<!-- MODAL PARA INSERTAR REGISTROS -->
<div class="modal" id="modalNuevoMecanismo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                <br />
                <div class="form-group">
                    <?php
                    $mi_mecanismo = $misnombremecanismo->viewNombreMecanismos();
                    ?>
                    <label for="nombre">nombre mecanismo</label>
                    <!-- <input type="text" class="form-control" id="tipo_id" placeholder="tipo documento" required> -->
                    <select id="nombre" class="form-control" required>
                        <option selected></option>
                        <?php
                        foreach ($mi_mecanismo as $value) {
                        ?>
                            <option value="<?php echo $value['nombre_mecanismo']; ?>"><?php echo $value['nombre_mecanismo']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <label for="tipo">Tipo de mecanismo</label>
                <select id="tipo" class="form-control" required>
                    <option value="Electrónica">Electrónica</option>
                    <option value="Manual">Manual</option>
                </select>
                <br />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="agregarNuevoMecanismo">
                    Agregar
                </button>
            </div>
        </div>
    </div>
</div>
<!-- MODAL PARA EDICION DE DATOS-->
<div class="modal" id="modalEdicionMecanismo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Actualizar Registro</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                
            </div>
            <div class="modal-body">
                <input type="hidden" id="codigou" class="form-control input-sm" required>
                <div class="form-group">
                    <?php
                    $mi_mecanismo = $misnombremecanismo->viewNombreMecanismos();
                    ?>
                    <label for="nombreu">nombre mecanismo</label>
                    <!-- <input type="text" class="form-control" id="tipo_id" placeholder="tipo documento" required> -->
                    <select id="nombreu" class="form-control" required>
                        <option selected></option>
                        <?php
                        foreach ($mi_mecanismo as $value) {
                        ?>
                            <option value="<?php echo $value['nombre_mecanismo']; ?>"><?php echo $value['nombre_mecanismo']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <br />
                <br />
                <label for="tipou">Tipo de mecanismo</label>
                <select id="tipou" class="form-control" required>
                    <option value="Electrónica">Electrónica</option>
                    <option value="Manual">Manual</option>
                </select>
                <br />
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col col-sm-6 text-left">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" id="eliminarDatosMecanismo">
                            Eliminar
                        </button>
                    </div>
                    <div class="col col-sm-6 text-right">
                        <button type="button" class="btn btn-warning" data-dismiss="modal" id="actualizaDatosMecanismo">
                            Actualizar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>