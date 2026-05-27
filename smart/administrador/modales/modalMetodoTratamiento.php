

<option value="Inspección de área">Inspección de área</option>R<?php
require_once '../modelo/val-admin.php';
require '../modelo/datos-tratamiento.php';
$mis_Tratamiento = new misTratamiento;
print_r($mis_Tratamiento);
?>
<!-- MODAL PARA INSERTAR REGISTROS -->
<div class="modal" id="modalNuevoMetodoTratamiento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                    $mi_tratamiento = $mis_Tratamiento->viewTratamientos();
                    ?>
                    <label for="tratamiento">Tratamiento</label>
                    <select id="tratamiento" class="form-control" required>
                        <?php
                        foreach ($mi_tratamiento as $value) {
                        ?>
                            <option value="<?php echo $value['tratamiento']; ?>"><?php echo $value['tratamiento']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <label for="metodo_control">Método Control</label>
                <select id="metodo_control" class="form-control" required>
                    <option value="Aspersion">Aspersion</option>
                    <option value="Nebulizacion">Nebulizacion</option>
                    <option value="Termonebulizacion">Termonebulizacion</option>
                    <option value="Gel cebadera">Gel cebadera</option>
                    <option value="laminado">laminado</option>
                    <option value="Deshidratantes">Deshidratantes</option>
                    <option value="Aplicación de larvicida">Aplicación de larvicida</option>
                    <option value="Cryogenia">Cryogenia</option>
                    <option value="Cebado">Cebado</option>
                    <option value="Smart">Smart</option>
                    <option value="Sellamiento">Sellamiento</option>
                    <option value="Limpieza y desinfección">Limpieza y desinfección</option>
                    <option value="Vapor">Vapor</option>
                    <option value="Cryogenia">Cryogenia</option>
                    <option value="Revision de tanques">Revisión de tanques</option>
                    <option value="Inspección de área">Inspección de área</option>
                    <option value="Lavado de tanques">Lavado de tanques</option>
                    <option value="Instalación de mecanismo">Instalación de mecanismo</option>
                </select>
                <br />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="agregarNuevoMetodoTratamiento">
                    Agregar
                </button>
            </div>
        </div>
    </div>
</div>
<!-- MODAL PARA EDICION DE DATOS-->
<div class="modal" id="modalEdicionMetodoTratamiento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Actualizar Registro</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="codigou" class="form-control input-sm" required>
                <label for="metodo_controlu">Método control</label>
                <select id="tipou" class="form-control" required>
                    <option value="Aspersion">Aspersion</option>
                    <option value="Nebulizacion">Nebulizacion</option>
                    <option value="Termonebulizacion">Termonebulizacion</option>
                    <option value="Gel cebadera">Gel cebadera</option>
                    <option value="laminado">laminado</option>
                    <option value="Deshidratantes">Deshidratantes</option>
                    <option value="Aplicación de larvicida">Aplicación de larvicida</option>
                    <option value="Cryogenia">Cryogenia</option>
                    <option value="Cryogenia">Cryogenia</option>
                    <option value="Cebado">Cebado</option>
                    <option value="Smart">Smart</option>
                    <option value="Sellamiento">Sellamiento</option>
                    <option value="Limpieza y desinfección">Limpieza y desinfección</option>
                    <option value="Vapor">Vapor</option>
                    <option value="Cryogenia">Cryogenia</option>
                    <option value="Revisión de tanques">Revisión de tanques</option>
                    <option value="Inspección de área">Inspección de área</option>
                    <option value="Lavado de tanques">Lavado de tanques</option>
<option value="Instalación de mecanismo">Instalación de mecanismo</option>
                </select>
                <br />
                <div class="form-group">
                    <?php
                    $mi_tratamiento = $mis_Tratamiento->viewTratamientos();
                    ?>
                    <label for="tratamientou">Tratamiento</label>
                    <select id="tratamientou" class="form-control" required>
                        <?php
                        foreach ($mi_tratamiento as $value) {
                        ?>
                            <option value="<?php echo $value['tratamiento']; ?>"><?php echo $value['tratamiento']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col col-sm-6 text-left">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" id="eliminarDatosMetodoTratamiento">
                            Eliminar
                        </button>
                    </div>
                    <div class="col col-sm-6 text-right">
                        <button type="button" class="btn btn-warning" data-dismiss="modal" id="actualizaDatosMetodoTratamiento">
                            Actualizar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>