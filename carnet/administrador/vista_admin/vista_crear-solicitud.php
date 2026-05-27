<?php
require '../../modelo/datos-solicitud.php';
require '../../modelo/datos-estudiantes.php';
require '../../modelo/datos-facultad.php';
$mis_Solicitud = new misSolicitud;
$mis_estudiante = new misEstudiante;
$mis_facultad = new misFacultad;
$maxSolicitud = $mis_Solicitud->maxSolicitud();
// Se recupera el número del reporte para mantenerse en el, después de crer el usuario.
if (isset($_GET['solicitud'])) {
    $solicitud = $_GET['solicitud'];
} else {
    $solicitud = "";
}
?>
<div class="col-sm-12">
    <!-- Inicio titulos de la pagina-->
    <div class="page-head">
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Crear Solicitud <?php echo $solicitud; ?></h1>
            </div>
            <!-- END PAGE TITLE -->
        </div>
    </div>
    <!-- TABLES -->
    <div class="modal-body">
        <div class="form-row">
            <form class="text-color" id="signup" action="" method="POST">
                <div class="form-group">
                    <label for="cedula">Escribir la cedula</label>
                    <input type="text" id="cedula" class="form-control input-sm" required value="<?php echo $solicitud ?>">
                </div>
                <div class="form-group">
                    <label for="codigo">Seleccionar el tipo de usuarios</label>
                    <select id="codigo" class="form-control" required>
                        <option value="1">Administrativo</option>
                        <option value="2">Docente</option>
                        <option value="3">Estudiantes</option>
                    </select>
                </div>
                <input type="submit" name value="buscar">
            </form>
        </div>
    </div>