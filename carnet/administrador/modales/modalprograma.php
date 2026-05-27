<?php
require_once '../modelo/val-admin.php';
require '../modelo/datos-facultad.php';
$mis_facultad = new misFacultad;
?>
<!-- MODAL PARA INSERTAR REGISTROS -->
<div class="modal fade" id="modalNuevoPrograma" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Agregar Registro</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id_programa" class="form-control input-sm" required="">
                <br />
                <label>nombre_del_programa</label>
                <input type="text" id="nombre_del_programa" class="form-control input-sm" required="">
                <br />
                <div class="form-group">
                    <?php
                    $mi_facultad = $mis_facultad->viewFacultades();
                    ?>
                    <label for="cod_facultad">cod_facultad</label>
                    <!-- <input type="text" id="cantidad" class="form-control input-sm" required=""> -->
                    <select id="cod_facultad" class="form-control" required>
                        <?php
                        foreach ($mi_facultad as $value) {
                        ?>
                            <option value="<?php echo $value['cod_facultad']; ?>"><?php echo $value['cod_facultad']; ?> - <?php echo $value['nombre_de_facultad']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="agregarNuevoPrograma">
                    Agregar
                </button>
            </div>
        </div>
    </div>
</div>
<!-- MODAL PARA EDICION DE DATOS-->
<div class="modal fade" id="modalEdicionPrograma" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-title">
                    <h4 class="modal-title" id="myModalLabel">Actualizar</h4>
                </div>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id_programau" class="form-control input-sm" required="">
                <label>nombre_del_programa</label>
                <input type="text" id="nombre_del_programau" class="form-control input-sm" required="">
                <br /><div class="form-group">
                    <?php
                    $mi_facultad = $mis_facultad->viewFacultades();
                    ?>
                    <label for="cod_facultadu">cod_facultad</label>
                    <!-- <input type="text" id="cantidad" class="form-control input-sm" required=""> -->
                    <select id="cod_facultadu" class="form-control" required>
                        <?php
                        foreach ($mi_facultad as $value) {
                        ?>
                            <option value="<?php echo $value['cod_facultad']; ?>"><?php echo $value['cod_facultad']; ?> - <?php echo $value['nombre_de_facultad']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-sm-6 text-left">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="eliminarDatosPrograma">
                        Eliminar
                    </button>
                </div>
                <div class="col-sm-6 text-right">
                    <button type="button" class="btn btn-warning" data-dismiss="modal" id="actualizaDatosPrograma">
                        Actualizar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>