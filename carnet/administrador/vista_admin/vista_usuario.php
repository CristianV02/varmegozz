<?php
require_once '../../modelo/val-admin.php';
require_once '../../modelo/datos-usuarios.php';
require_once '../../modelo/datos-rol.php';
// Instancias
$misusuarios = new misUsuarios();
$misroles = new misRoles();
// Validamos el rol de usuario para evitar intrusos
if ($id_rol == 1) {
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
                <h1>Usuarios</h1>
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
                <span class="active">Lista de Usuarios</span>
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
                        <div class="text-center">Id</div>
                    </th>
                    <th>
                        <div class="text-center">Id Usuario</div>
                    </th>
                    <th>
                        <div class="text-center">Nombres <br /> Apellidos</div>
                    </th>
                    <th>
                        <div class="text-center">Usuario</div>
                    </th>
                    <th>
                        <div class="text-center">Contraseña</div>
                    </th>
                    <th>
                        <div class="text-center">Rol</div>
                    </th>
                    <th>
                        <div class="text-center">Editar</div>
                    </th>
                </thead>
                <tbody>
                    <?php
                    $res = $misusuarios->viewUsuarios();
                    foreach ($res as $data) {
                        // Rol del usuario
                        $cant_usuarios = 1;
                        $rol = $misroles->viewRol($data['id_rol']);
                        // Datos
                        $datos = $data['id'] . "||" .
                            $data['id_usuario'] . "||" .
                            $data['nombres_apellidos'] . "||" .
                            $data['usuario'] . "||" .
                            $data['contrasena'] . "||" .
                            $data['id_rol'];
                    ?>
                        <tr>
                            <td>
                                <div class="text-center">
                                    <?php echo $data['id']; ?></div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <?php echo $data['id_usuario']; ?></div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <?php echo $data['nombres_apellidos']; ?>
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
                                    <?php echo $rol[0]['nombre_del_rol']; ?>
                                </div>
                            </td>
                            <td>
                                <button class="btn btn-primary glyphicon glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicionUsuario" onclick="agregarformUsuario('<?php echo  $datos ?>')">
                                </button>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <br />
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalNuevoUsuario">Crear usuario</button>
        </br>
        </br>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>