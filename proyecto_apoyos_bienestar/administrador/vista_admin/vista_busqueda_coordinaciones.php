<?php
require_once '../../modelo/val-admin.php';
require_once '../../modelo/datos-coordinaciones.php';
// Instancias
$mis_coordinaciones = new misCoordinaciones();
// Validamos el rol de usuario para evitar intrusos
if ($rol_id == 1 || $rol_id == 2 || $rol_id == 4) {
} else {
    echo '<script language = javascript>
    alert ("No es un usuario valido.") 
    self.location="../index.php"
    </script>';
}
$res = $mis_coordinaciones->viewCoordinaciones();
?>
<div class="col-sm-12">
    <!-- Inicio titulos de la pagina-->
    <div class="page-head">
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Apoyos Socioeconomicos
                    <small>SENA</small>
                </h1>
            </div>
            <!-- END PAGE TITLE -->
        </div>
    </div>
    <!-- END PAGE HEAD-->
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="index.php">Inicio</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span class="active">Coordinaciones</span>
        </li>
    </ul>
    <!-- END PAGE BREADCRUMB -->
    <!-- Inicio Línea horizontal -->
    <!-- <hr style="border:0px; border-top: 5px double #999999;" /> -->
    <!-- Fin Línea horizontal -->
    <!-- INICIO DEL CONTENIDO -->
    <div class="table-responsive">
        <!-- Tabla con información de los apoyos del aprendiz -->
        <h1 class="text-center">COORDINACIONES</h1>
        <table id="example" class="table table-striped table-hover table-bordered">
            <thead>
                <th>
                    <div class="text-center">Item</div>
                </th>
                <th>
                    <div class="text-center">Coordinador</div>
                </th>
                <th>
                    <div class="text-center">Padrino </br>Bienestar</div>
                </th>
                <th>
                    <div class="text-center">Número de </br> Ficha </div>
                </th>
                <!-- <th>
                    <div class="text-center">Tipo de </br> Oferta </div>
                </th> -->
                <th>
                    <div class="text-center">Modalidad </div>
                </th>
                <th>
                    <div class="text-center">Etapa de </br> la Ficha </div>
                </th>
                <th>
                    <div class="text-center">Nivel de </br> Formación </div>
                </th>
                <th>
                    <div class="text-center">Nombre programa </br> de formación </div>
                </th>
                <th>
                    <div class="text-center">Fecha Inicio</br>Formación</div>
                </th>
                <th>
                    <div class="text-center">Fecha Fin </br>Formación</div>
                </th>
                <th>
                    <div class="text-center">Municipio</div>
                </th>
                <th>
                    <div class="text-center">Nombre del </br> Instructor </div>
                </th>
                <th>
                    <div class="text-center">Teléfono del </br> Instructor </div>
                </th>
                <th>
                    <div class="text-center">SEDE </div>
                </th>
                <th>
                    <div class="text-center">Ambiente </div>
                </th>
                <th>
                    <div class="text-center">Jornada </div>
                </th>
                <th>
                    <div class="text-center">Horario </div>
                </th>
                <th>
                    <div class="text-center">Lider</br> Vocero </div>
                </th>
                <th>
                    <div class="text-center">Número</br> de Contacto </div>
                </th>
                <th>
                    <div class="text-center">Correo</div>
                </th>
            </thead>
            <tbody>
                <?php
                $cant = 1;
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
                                <a href="./datos_busqueda.php?codigo=<?php echo 2; ?>&valor=<?php echo $data['ficha']; ?>"><?php echo $data['ficha']; ?></a>
                            </div>
                        </td>
                        <!-- <td>
                            <div class="text-center">
                                <?php //echo $data['tipoOferta']; ?>
                            </div>
                        </td> -->
                        <td>
                            <div class="text-center">
                                <?php echo $data['modalidad']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $data['etapaFicha']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $data['nivelFormacion']; ?>
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
                    </tr>
                <?php
                    $cant++;
                }
                ?>
            </tbody>
        </table>
        </br>
    </div>
    </br>
    </br>
    </br>
    <!-- FIN DEL CONTENIDO -->
</div>
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

<!--Footer-->