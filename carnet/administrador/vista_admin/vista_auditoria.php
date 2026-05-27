<?php
require_once '../../modelo/val-admin.php';
require '../../modelo/datos-auditoria.php';
$mis_Auditoria = new misAuditoria();
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
                <h1>Auditoria</h1>
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
                        <div class="text-center">Id</div>
                    </th>
                    <th>
                        <div class="text-center">Descripcion</div>
                    </th>
                    <th>
                        <div class="text-center">Usuarios</div>
                    </th>
                    <th>
                        <div class="text-center">Tabla</div>
                    </th>
                    <th>
                        <div class="text-center">Fecha</div>
                    </th>
                    <th>
                        <div class="text-center">Editar</div>
                    </th>
                </thead>
                <tbody>
                    <?php
                    $res = $mis_Auditoria->viewAuditorias();
                    foreach ($res as $data) {
                        $datos = $data['id'] . "||" .
                            $data['descripcion'] . "||" .
                            $data['usuario'] . "||" .
                            $data['tabla'] . "||" .
                            $data['fecha'];
                    ?>
                        <tr>
                            <td>
                                <div class="text-center"><?php echo $data['id']; ?></div>
                            </td>
                            <td>
                                <div class="text-center"><?php echo $data['descripcion']; ?></div>
                            </td>
                            <td>
                                <div class="text-center"><?php echo $data['usuario']; ?></div>
                            </td>
                            <td>
                                <div class="text-center"><?php echo $data['tabla']; ?></div>
                            </td>
                            <td>
                                <div class="text-center"><?php echo $data['fecha']; ?></div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <button class="btn btn-primary glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicionAuditoria" onclick="agregarFormAuditoria('<?php echo $datos ?>')">
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
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalNuevoAuditoria">Crear Auditoria</button>
        <br />
        <br />
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>