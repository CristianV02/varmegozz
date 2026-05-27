<?php
require_once '../../modelo/val-admin.php';
require_once '../../modelo/datos-coordinaciones.php';
$miCoordinaciones = new misCoordinaciones();
// Validamos el rol de usuario para evitar intrusos
if ($rol_id == 1 || $rol_id == 2 || $rol_id == 4) {
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
                <h1>Coordinaciones
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
                <span class="active">Coordinaciones</span>
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
                        <div class="text-center">Código</div>
                    </th>
                    <th>
                        <div class="text-center">Coordinador</div>
                    </th>
                    <th>
                        <div class="text-center">Padrino </br> Bienestar</div>
                    </th>
                    <th>
                        <div class="text-center">Ficha</div>
                    </th>
                    <!-- <th>
                        <div class="text-center">Tipo </br> Oferta</div>
                    </th> -->
                    <th>
                        <div class="text-center">Modalidad</div>
                    </th>
                    <th>
                        <div class="text-center">Etapa </br> Ficha</div>
                    </th>
                    <th>
                        <div class="text-center">Nivel </br> Formación</div>
                    </th>
                    <th>
                        <div class="text-center">Programa </br> Formación</div>
                    </th>
                    <th>
                        <div class="text-center">Fecha </br> Inicio </div>
                    </th>
                    <th>
                        <div class="text-center">Fecha </br> Fin</div>
                    </th>
                    <th>
                        <div class="text-center">Municipio</div>
                    </th>
                    <th>
                        <div class="text-center">Instructor</div>
                    </th>
                    <th>
                        <div class="text-center">Móvil </br> Instructor</div>
                    </th>
                    <th>
                        <div class="text-center">SEDE</div>
                    </th>
                    <th>
                        <div class="text-center">Ambiente</div>
                    </th>
                    <th>
                        <div class="text-center">Jornada</div>
                    </th>
                    <th>
                        <div class="text-center">Horario</div>
                    </th>
                    <th>
                        <div class="text-center">Lider </br> Vocero</div>
                    </th>
                    <th>
                        <div class="text-center">Número </br> Celular</div>
                    </th>
                    <th>
                        <div class="text-center">Correo</div>
                    </th>
                    <th>
                        <div class="text-center">Editar</div>
                    </th>
                </thead>
                <tbody>
                    <?php
                    $res = $miCoordinaciones->viewCoordinaciones();
                    foreach ($res as $data) {
                        // Datos
                        $datos = $data['cod_coordinaciones'] . "||" .
                            $data['coordinador'] . "||" .
                            $data['padrino_bienestar'] . "||" .
                            $data['ficha'] . "||" .
                            // $data['tipoOferta'] . "||" .
                            $data['modalidad'] . "||" .
                            $data['etapaFicha'] . "||" .
                            $data['nivelFormacion'] . "||" .
                            $data['programa_formacion'] . "||" .
                            $data['fechaInicio'] . "||" .
                            $data['fechaFin'] . "||" .
                            $data['municipio'] . "||" .
                            $data['instructor'] . "||" .
                            $data['movilInstructor'] . "||" .
                            $data['sede'] . "||" .
                            $data['ambiente'] . "||" .
                            $data['jornada'] . "||" .
                            $data['horario'] . "||" .
                            $data['lider_vocero'] . "||" .
                            $data['celular'] . "||" .
                            $data['correo'];
                    ?>
                        <tr>
                            <td>
                                <div class="text-center">
                                    <?php echo $data['cod_coordinaciones']; ?>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <?php echo $data['coordinador']; ?>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <?php echo $data['padrino_bienestar']; ?>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <?php echo $data['ficha']; ?>
                                </div>
                            </td>
                            <!-- <td>
                                <div class="text-center">
                                    <?php //echo $data['tipoOferta'] ?>
                                </div>
                            </td> -->
                            <td>
                                <div class="text-center">
                                    <?php echo $data['modalidad'] ?>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <?php echo $data['etapaFicha'] ?>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <?php echo $data['nivelFormacion'] ?>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <?php echo $data['programa_formacion']; ?>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <?php echo $data['fechaInicio']; ?>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <?php echo $data['fechaFin']; ?>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <?php echo $data['municipio']; ?>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <?php echo $data['instructor']; ?>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <?php echo $data['movilInstructor']; ?>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <?php echo $data['sede']; ?>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <?php echo $data['ambiente']; ?>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <?php echo $data['jornada']; ?>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <?php echo $data['horario']; ?>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <?php echo $data['lider_vocero']; ?>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <?php echo $data['celular']; ?>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <?php echo $data['correo']; ?>
                                </div>
                            </td>
                            <td>
                                <button class="btn btn-primary glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicionCoordinaciones" onclick="agregarFormCoordinaciones('<?php echo $datos ?>')"></button>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        <br />
        </div>
        <br />
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalNuevoCoordinaciones">Crear Coordinación</button>
        </br>
        </br>
        </br>
        </br>
    </div>
</div>
<!--Footer-->
<footer>
    <!-- <div class="col-sm-12 text-center"> -->
    <span>Desarrollado: Tecnoparque Nodo Cúcuta</span>
    <span> - CEDRUM</span>
    <!-- </div> -->
</footer>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>