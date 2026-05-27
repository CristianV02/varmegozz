<?php
require_once '../../modelo/val-admin.php';
require_once '../../modelo/datos-usuarios.php';
require_once '../../modelo/datos-rol.php';
// Instancias
$misusuarios = new misUsuarios();
$misroles = new misRoles();
// Validamos el rol de usuario para evitar intrusos
if ($rol_id == 4) {
} else {
    echo '<script language = javascript>
    alert ("No es un usuario valido.") 
    self.location="../index.php"
    </script>';
}
?>
<div class="col-sm-12">
    <!-- Inicio titulos de la pagina-->
    <div class="page-head">
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Usuarios
                    <small>SENA</small>
                </h1>
            </div>
            <!-- END PAGE TITLE -->
        </div>
        <!-- END PAGE HEAD-->
        <!-- BEGIN PAGE BREADCRUMB -->
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <a href="index.php">Inicio</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="configuracion.php">Configuración</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span class="active">Lista de usuarios</span>
            </li>
        </ul>
        <!-- END PAGE BREADCRUMB -->
        <!-- BEGIN PAGE BASE CONTENT -->
        <!-- BEGIN DASHBOARD STATS 1-->
        <br />
        <!-- INICIO DEL CONTENIDO -->
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered">
                <thead>
                    <th>
                        <div class="text-center">Item</div>
                    </th>
                    <th>
                        <div class="text-center">Identificación</div>
                    </th>
                    <th>
                        <div class="text-center">Nombre</div>
                    </th>
                    <th>
                        <div class="text-center">Usuario</div>
                    </th>
                    <th>
                        <div class="text-center">Contraseña</div>
                    </th>
                    <th>
                        <div class="text-center">Correo</div>
                    </th>
                    <th>
                        <div class="text-center">Tipo de usuario</div>
                    </th>
                    <th>
                        <div class="text-center">Editar</div>
                    </th>
                </thead>
                <tbody>
                    <?php
                    $cant = 1;
                    $res = $misusuarios->viewUsuarioDocumento($identificacion);
                    foreach ($res as $data) {
                        // Rol del usuario
                        $cant_usuarios = 1;
                        $rol = $misroles->viewRol($data['rol_id']);
                        // Datos
                        $datos = $data['cod_usuario'] . "||" .
                            $data['tipo_documento'] . "||" .
                            $data['numero_documento'] . "||" .
                            $data['nombre'] . "||" .
                            $data['usuario'] . "||" .
                            $data['contrasena'] . "||" .
                            $data['email'] . "||" .
                            $data['rol_id'];
                    ?>
                        <tr>
                            <td>
                                <div class="text-center">
                                    <?php echo $cant; ?></div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <?php echo $data['numero_documento']; ?>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <?php echo $data['nombre']; ?>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <?php echo $data['usuario']; ?>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <?php echo $data['contrasena']; ?>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <?php echo $data['email']; ?>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <?php echo $rol[0]['rol']; ?>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <button class="btn btn-primary glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicionUsuario" onclick="agregarformUsuario('<?php echo  $datos ?>')"></button>
                                </div>
                            </td>
                        </tr>
                    <?php
                        $cant++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <br />
        <!-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalNuevoUsuario">Crear usuario</button> -->
        </br>
        </br>
        </br>
        </br>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<!--Footer-->
<footer>
    <!-- <div class="col-sm-12 text-center"> -->
    <span>Desarrollado: Tecnoparque Nodo Cúcuta</span>
    <span> - CEDRUM</span>
    <!-- </div> -->
</footer>