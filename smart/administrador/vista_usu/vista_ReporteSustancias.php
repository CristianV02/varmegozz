<?php
require_once '../../modelo/val-admin.php';
require_once '../../modelo/datos-sustancias.php';
require '../../modelo/datos-cantidad.php';
require_once '../../modelo/datos-usuarios.php';
require_once '../../modelo/datos-reporte-sustancias.php';
$mis_ReporteSustancias = new misReporteSustancias();
$mis_Usuarios = new misUsuarios();
$mis_Sustancias = new misSustancias();
$mis_cantidad = new misCantidad;
//Recibe variable de la vista reporte, el código del reporte
if(isset($_GET['codigo'])){
    $cod_reporte = $_GET['codigo'];
} else{
    $cod_reporte = "";
}
?>

<div class="d-flex">
    <div id="sidebar-container" class="bg-primary">
        <div class="logo">
            <img id="logo" src="../imagenes/logo-jaziz_sf.png" alt="Logo Jaziz Biológico">
        </div>
        <div class="menu">
            <a href="indexUsuario.php" class="d-block text-light p-3"><i class="bi bi-file-earmark-text-fill me-2 lead"></i>DashBoard</a>
            <a href="reporte.php" class="d-block text-light p-3"><i class="bi bi-file-earmark-text-fill me-2 lead"></i>Reportes</a>
            <a href="reporte-mecanismo.php" class="d-block text-light p-3"><i class="bi bi-gear-fill me-2 lead"></i>Reportes Mecanismo</a>
            <a href="docUsuarios.php" class="d-block text-light p-3"><i class="bi bi-file-earmark-pdf-fill me-2 lead"></i>Documentos de Usuarios</a>
            <a href="usuarios.php" class="d-block text-light p-3"><i class="bi bi-people-fill me-2 lead"></i>Usuarios</a>
            <a href="empresa.php" class="d-block text-light p-3"><i class="bi bi-buildings-fill me-2 lead"></i>Tipo de establecimiento</a>
        </div>
    </div>
    <div class="container-fluid d-block">
        <div class="w-100">
            <nav class="navbar navbar-expand-lg border-bottom">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" onclick="mostrarOcultar(event)">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0" id="navbar-nav-icons">
                            <li class="nav-item dropdown">
                                <a href="indexUsuario.php" class="d-block text-dark p-3""><i class=" bi bi-ui-checks-grid me-2 lead"></i>DashBoard</a>
                                <a href="reporte.php" class="d-block text-dark p-3"><i class="bi bi-file-earmark-text-fill me-2 lead"></i>Reportes</a>
                                <a href="reporte-mecanismo.php" class="d-block text-dark p-3"><i class="bi bi-gear-fill me-2 lead"></i>Reportes Mecanismo</a>
                                <a href="docUsuarios.php" class="d-block text-dark p-3"><i class="bi bi-file-earmark-pdf-fill me-2 lead"></i>Documentos de Usuarios</a>
                                <a href="usuarios.php" class="d-block text-dark p-3"><i class="bi bi-people-fill me-2 lead"></i>Usuarios</a>
                                <a href="empresa.php" class="d-block text-dark p-3"><i class="bi bi-buildings-fill me-2 lead"></i>Tipo de establecimiento</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="../modelo/salir.php" role="button" aria-expanded="false">
                                    <img src="../imagenes/avatar.png" alt="imagen de usuario" class="img-fluid rounded-circle me-2 avatar"><span class="nombreUsuario"><?php echo $nombre . " " . $apellido ?></span> <span class="btn-cerrarsesion">(Cerrar Sesión)</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- INICIO DEL CONTENIDO -->
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered">
                    <thead>
                        <th>
                            <div class="text-center">Código</div>
                        </th>
                        <th>
                            <div class="text-center">Usuario</div>
                        </th>
                        <th>
                            <div class="text-center">Nombre</div>
                        </th>
                        <th>
                            <div class="text-center">Sustancias</div>
                        </th>
                        <th>
                            <div class="text-center">Cantidad</div>
                        </th>
                        <th>
                            <div class="text-center">Unidades</div>
                        </th>
                        <th>
                            <div class="text-center">Fecha de Vencimiento</div>
                        </th>
                        <th>
                            <div class="text-center">Registro de Sanitario</div>
                        </th>
                        <th>
                            <div class="text-center">Código Reporte</div>
                        </th>
                    </thead>
                    <tbody>
                        <?php
                        $cant = 1;
                        //Se confirma que sea un usuario y se cargan los reportes de ese usuario
                        if ($rol == "usuario") {
                            $res = $mis_ReporteSustancias->viewReporteSustancia($cod_reporte);
                        } else {
                            echo '<script language = javascript>
                        alert("Por favor revisar la información del usuario....")
                        self.location = "../indexUsuario.php"
                        </script>';
                        }
                        foreach ($res as $data) {
                            // Datos
                            $datos = $data['codigo'] . "||" .
                                $data['usuario'] . "||" .
                                $data['sustancias'] . "||" .
                                $data['cantidad'] . "||" .
                                $data['mediciones'] . "||" .
                                $data['fecha_vencimiento'] . "||" .
                                $data['registro_sanitario'] . "||" .
                                $data['cod_reporte'];

                            $sustancia = $mis_Sustancias->viewSustancia($data['sustancias']);
                            $cantidad = $mis_cantidad->viewCantidad($data['cantidad']);
                            // Consulta para traer el nombre del cliente.
                            $mi_usuario = $mis_Usuarios->viewUsuarioDocumento($data['usuario']);

                        ?>
                            <tr>
                                <td>
                                    <div class="text-center">
                                        <?php echo $data['codigo']; ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <?php echo $data['usuario']; ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <?php echo $mi_usuario[0]['nombre'] . " " . $mi_usuario[0]['apellido']; ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <?php echo $sustancia[0]['nombre']; ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <?php echo $data['cantidad']; ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <?php echo $data['mediciones']; ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <?php echo $data['fecha_vencimiento']; ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <?php echo $data['registro_sanitario']; ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <?php echo $data['cod_reporte']; ?>
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
            <br />
            <br />
            <br />
            <br />
        </div>
    </div>
</div>
</div>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>