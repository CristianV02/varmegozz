<?php
require_once '../modelo/val-admin.php';
require_once '../modelo/datos_producto.php';
$misProductos = new misProductos;
?>
<!-- Modal registro de un ventas -->
<div class="modal" id="modalNuevoVentas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Agregar Ventas</h4>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group">
                        <input type="hidden" id="codigo" class="form-control input-sm" required="">
                    </div>
                    <div class="form-group">
                        <label for="id_producto">Id productos</label>
                        <input type="text" id="id_producto" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <?php
                        $mi_producto = $misProductos->viewProductos();
                        ?>
                        <label for="nombre_producto">nombre productos</label>
                        <!-- <input type="text" id="nombre_producto" class="form-control" required=""> -->
                        <select id="tipo_id" class="form-control" required>
                            <option selected></option>
                            <?php
                            foreach ($mi_producto as $value) {
                            ?>
                                <option value="<?php echo $value['nombre_producto']; ?>"><?php echo $value['nombre_producto']; ?></option>

                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="precio_total">precio_total</label>
                        <input type="text" id="precio_total" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label for="unidades">unidades</label>
                        <input type="text" id="unidades" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label for="nombre_comprador">Nombre Comprador</label>
                        <input type="text" id="nombre_comprador" class="form-control" required="">
                    </div>
                    <div class="modal-footer">
                        <div>
                            <button type="button" class="btn btn-primary" id="agregarNuevaVentas">
                                Agregar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal ACTUALIZAR información de un ventas -->
<div class="modal" id="modalEdicionVentas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Actualizar Ventas</h4>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group">
                        <input type="hidden" id="codigou" class="form-control input-sm" required="">
                    </div>
                    <div class="form-group">
                        <label for="id_productou">Id productos</label>
                        <input type="text" id="id_productou" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <?php
                        $mi_producto = $misProductos->viewProductos();
                        ?>
                        <label for="nombre_productou">nombre productos</label>
                        <!-- <input type="text" id="nombre_producto" class="form-control" required=""> -->
                        <select id="nombre_productou" class="form-control" required>
                            <option selected></option>
                            <?php
                            foreach ($mi_producto as $value) {
                            ?>
                                <option value="<?php echo $value['nombre_producto']; ?>"><?php echo $value['nombre_producto']; ?></option>

                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="precio_totalu">precio_total</label>
                        <input type="text" id="precio_totalu" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label for="unidadesu">unidades</label>
                        <input type="text" id="unidadesu" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label for="nombre_compradoru">Nombre Comprador</label>
                        <input type="text" id="nombre_compradoru" class="form-control" required="">
                    </div>
                    <div class="modal-footer">
                        <div class="col-sm-6 text-left">
                            <button type="button" class="btn btn-danger" data-dismiss="modal" id="eliminarDatosVentas">
                                Eliminar
                            </button>
                        </div>
                        <div class="col-sm-6 text-right">
                            <button type="button" class="btn btn-warning" data-dismiss="modal" id="actualizaDatosVentas">
                                Actualizar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>