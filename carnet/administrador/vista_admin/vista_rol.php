<?php
require_once '../../modelo/val-admin.php';
require '../../modelo/datos-rol.php';
$mis_roles = new misRoles();
// Validamos el rol de usuario para evitar intrusos
// if ($rol_id == 1) {
// } else {
//     echo '<script language = javascript>
//     alert ("No es un usuario valido.") 
//     self.location="../index.php"
//     </script>';
// }
?>

<div class="col-sm-12">
    <!-- Inicio titulos de la pagina-->
    <div class="page-head">
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Rol
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
                        <div class="text-center">Id <br/> Rol</div>
                    </th>
                    <th>
                        <div class="text-center">Nombre del <br> Rol</div>
                    </th>
                    <th>
                        <div class="text-center">Permiso</div>
                    </th>
                    <th>
                        <div class="text-center">Editar</div>
                    </th>
                </thead>
                <tbody>
                    <?php
                    $res = $mis_roles->viewRoles();
                    foreach ($res as $data) {
                        $datos = $data['id_rol'] . "||" .
                            $data['nombre_del_rol'] . "||" .
                            $data['permiso'];
                    ?>
                        <tr>
                            <td>
                                <div class="text-center"><?php echo $data['id_rol']; ?></div>
                            </td>
                            <td>
                                <div class="text-center"><?php echo $data['nombre_del_rol']; ?></div>
                            </td>
                            <td>
                                <div class="text-center"><?php echo $data['permiso']; ?></div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <button class="btn btn-primary glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicionRol" onclick="agregarFormRol('<?php echo $datos ?>')">
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <br />
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalNuevoRol">Crear Rol</button>
        <br />
        <br />
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>