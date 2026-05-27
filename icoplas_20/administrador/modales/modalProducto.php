<?php
require_once '../modelo/val-admin.php';
?>
<!-- Modal registro de un ventas -->
<div class="modal" id="modalNuevoProducto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Agregar Productos</h4>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group">
                        <input type="hidden" id="codigo" class="form-control input-sm" required="">
                    </div>
                    <div class="form-group">
                        <label for="id_producto">Id Productos</label>
                        <input type="text" id="id_producto" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label for="nombre_producto">Nombre Productos</label>
                        <input type="text" id="nombre_producto" class="form-control" required="">
                        <!-- <option value="<?php echo $value['identificacion'] . " - " . $value['nombre'] . " " . $value['apellido']; ?>"><?php echo $value['identificacion'] . " - " . $value['nombre'] . " " . $value['apellido']; ?></option> -->
                    </div>
                    <div class="form-group">
                        <label for="precio_producto">Precio Producto</label>
                        <input type="text" id="precio_producto" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label for="marca_producto">Marca Producto</label>
                        <input type="text" id="marca_producto" class="form-control" required="">
                    </div>
                    <div class="modal-footer">
                        <div>
                            <button type="button" class="btn btn-primary" id="agregarNuevoProducto">
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
<div class="modal" id="modalEdicionProducto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                        <label for="nombre_productou">Nombre Productos</label>
                        <input type="text" id="nombre_productou" class="form-control" required="">
                        <!-- <option value="<?php echo $value['identificacion'] . " - " . $value['nombre'] . " " . $value['apellido']; ?>"><?php echo $value['identificacion'] . " - " . $value['nombre'] . " " . $value['apellido']; ?></option> -->
                    </div>
                    <div class="form-group">
                        <label for="precio_productou">Precio Producto</label>
                        <input type="text" id="precio_productou" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label for="marca_productou">Marca Producto</label>
                        <input type="text" id="marca_productou" class="form-control" required="">
                    </div>
                    <div class="modal-footer">
                        <div class="col-sm-6 text-left">
                            <button type="button" class="btn btn-danger" data-dismiss="modal" id="eliminarDatosProducto">
                                Eliminar
                            </button>
                        </div>
                        <div class="col-sm-6 text-right">
                            <button type="button" class="btn btn-warning" data-dismiss="modal" id="actualizaDatosProducto">
                                Actualizar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>