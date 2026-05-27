<?php
require_once '../../modelo/val-admin.php';
require_once '../../modelo/datos-usuarios.php';
require_once '../../modelo/datos-rol.php';
// Instancias
$misusuarios = new misUsuarios();
$misroles = new misRoles();
// Validamos el rol de usuario para evitar intrusos
if ($rol_id == 1) {
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
                <span class="active">Lista de usuarios</span>
            </li>
        </ul>
        <!-- END PAGE BREADCRUMB -->
        <!-- BEGIN PAGE BASE CONTENT -->
        <!-- BEGIN DASHBOARD STATS 1-->
        <br />
        <!-- INICIO DEL CONTENIDO -->
        <div class="container">
            <div>
                <label>Tipo documento</label>
                <input type="text" id="tipo_documento" class="form-control input-sm" required="">
                <br />
                <label>Número de Identificación</label>
                <input type="text" id="numero_documento" class="form-control input-sm" required="">
                <br />
                <label>Nombre y apellidos</label>
                <input type="text" id="nombre" class="form-control input-sm" required="">
                <br />
                <label>Usuario</label>
                <input type="text" id="usuario" class="form-control input-sm" required="">
                <br />
                <label>Contraseña</label>
                <input type="password" id="contrasena" class="form-control input-sm" required="">
                <br />
                <label>Correo</label>
                <input type="text" id="email" class="form-control input-sm" required="">
                <br />
                <label for="rol_id">Rol</label>
                <select id="rol_id" class="form-control" required>
                    <option value="1">Administrador</option>
                    <option value="2">Coordinador</option>
                    <option value="3">Instructor</option>
                </select>
                <br />

            </div>
            <button type="button" class="btn btn-primary" id="agregarNuevoUsuario">
                Agregar
            </button>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>