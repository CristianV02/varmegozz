<?php
require_once '../../modelo/val-admin.php';
require_once '../../modelo/datos-apoyos.php';
// Instancias
$mis_apoyos = new misApoyos();
// Validamos el rol de usuario para evitar intrusos
if ($rol_id == 1 || $rol_id == 2 || $rol_id == 3 || $rol_id == 4) {
} else {
    echo '<script language = javascript>
    alert ("No es un usuario valido.") 
    self.location="../index.php"
    </script>';
}
if (isset($_GET['codigo']) && isset($_GET['valor'])) {
    $tipo_busqueda = $_GET['codigo'];
    $datoBusqueda = $_GET['valor'];
    if ($tipo_busqueda == 1 || $tipo_busqueda == 2) {
    }
    // Datos de los apoyos por identificación del aprendiz
} else {
    $tipo_busqueda = "";
    $datoBusqueda = "";
    echo '<script language = javascript>
            alert ("Debe seleccionar un tipo de búsqueda.") 
            self.location="../busqueda.php"
            </script>';
}
?>

<!-- <div class="container-fluid">
    <header>
        <div class="row">
            <div class="col-sm-3 header_logo">
                <img class="imagen_logo" src="../imagenes/aprendiz.png" alt="Logo SENA" width="auto" />
            </div>
            <div class="col-sm-6"></div>
            <div class="col-sm-3 header_mintic">
                <img src="../imagenes/Logo-Mintrabajo-s72.png" alt=" LogoMinisterio de trabajo">
            </div>
        </div>
    </header>
    <hr style="border:0px; border-top: 5px double #999999;" />
</div> -->
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
            <a href="busqueda.php">Búsqueda</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span class="active">Resultado</span>
        </li>
    </ul>
    <!-- END PAGE BREADCRUMB -->
    <!-- Inicio Línea horizontal -->
    <!-- <hr style="border:0px; border-top: 5px double #999999;" /> -->
    <!-- Fin Línea horizontal -->
    <!-- INICIO DEL CONTENIDO -->
    <div class="table-responsive">
        <?php
        if ($tipo_busqueda == 1) {
            $res_apoyos = $mis_apoyos->viewApoyo_identificacion($datoBusqueda);
            if ($res_apoyos == null) {
                echo '<script language = javascript>
                    alert ("Error... El dato no es válido. Por favor ingrese un número documento o número de ficha válido.") 
                    self.location="./busqueda.php"
                    </script>';
                return;
            }

        ?>
            <!-- Tabla con información del Aprendiz -->
            <h1 class="text-center">INFORMACIÓN DEL APRENDIZ</h1>
            <table id="example1" class="table table-striped table-hover table-bordered">
                <thead>
                    <th>
                        <div class="text-center">Nombres y </br> Apellidos</div>
                    </th>
                    <th>
                        <div class="text-center">Tipo de </br> Documento </div>
                    </th>
                    <th>
                        <div class="text-center">Número de </br> Documento </div>
                    </th>
                    <th>
                        <div class="text-center">Programa de </br> Formación </div>
                    </th>
                    <th>
                        <div class="text-center">Número de </br> Ficha </div>
                    </th>
                    <th>
                        <div class="text-center">Fecha Inicio </br> Ficha </div>
                    </th>
                    <th>
                        <div class="text-center">Fecha Fin </br> Ficha </div>
                    </th>
                    <th>
                        <div class="text-center">Nivel de </br> Formación </div>
                    </th>
                    <th>
                        <div class="text-center">Estado del </br> Aprendiz </div>
                    </th>

                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="text-center">
                                <?php echo $res_apoyos[0]['nombres_apellidos']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $res_apoyos[0]['tipo_documento']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $res_apoyos[0]['numero_documento']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $res_apoyos[0]['programa_formacion']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <a href="./datos_busqueda.php?codigo=<?php echo 2; ?>&valor=<?php echo $res_apoyos[0]['ficha']; ?>"><?php echo $res_apoyos[0]['ficha']; ?></a>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $res_apoyos[0]['inicio_ficha']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $res_apoyos[0]['fin_ficha']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $res_apoyos[0]['nivel_formacion']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $res_apoyos[0]['estado_aprendiz']; ?>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            </br>
            </br>
            <!-- Tabla con información de los apoyos del aprendiz -->
            <h1 class="text-center">APOYOS SOCIOECONÓMICOS</h1>
            <table id="example" class="table table-striped table-hover table-bordered">
                <thead>
                    <th>
                        <div class="text-center">Item</div>
                    </th>
                    <th>
                        <div class="text-center">Apoyo</br>Socioeconómico</div>
                    </th>
                    <th>
                        <div class="text-center">Estado</br>Actual</div>
                    </th>
                    <th>
                        <div class="text-center">Fecha Inicio </br> Apoyo </div>
                    </th>
                    <th>
                        <div class="text-center">Fecha Fin </br> Apoyo </div>
                    </th>
                    <th>
                        <div class="text-center">No. de </br> Resolución </div>
                    </th>
                    <th>
                        <div class="text-center">Novedades</div>
                    </th>
                </thead>
                <tbody>
                    <?php
                    $cant = 1;
                    foreach ($res_apoyos as $data) {
                        // Datos
                        $datos_apoyos = $data['apoyo_socioeconomico'] . "||" .
                            $data['estado_apoyo'] . "||" .
                            $data['inicio_apoyo'] . "||" .
                            $data['fin_apoyo'] . "||" .
                            $data['numero_resolucion_apoyo'] . "||" .
                            $data['codigo'] . "||" .
                            $data['nombre_novedad_suspension'] . "||" .
                            $data['motivo_suspension'] . "||" .
                            $data['fecha_novedad_suspension'] . "||" .
                            $data['nombre_registro_suspension'] . "||" .
                            $data['resolucion_novedad_suspension'] . "||" .
                            $data['nombre_novedad_reactivacion'] . "||" .
                            $data['motivo_reactivacion'] . "||" .
                            $data['fecha_novedad_reactivacion'] . "||" .
                            $data['nombre_registro_reactivacion'] . "||" .
                            $data['resolucion_novedad_reactivacion'] . "||" .
                            $data['nombre_novedad_cancelacion'] . "||" .
                            $data['motivo_cancelacion'] . "||" .
                            $data['fecha_novedad_cancelacion'] . "||" .
                            $data['nombre_registro_cancelacion'] . "||" .
                            $data['resolucion_novedad_cancelacion'];
                    ?>
                        <tr>
                            <td>
                                <div class="text-center">
                                    <?php echo $cant; ?>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <?php echo $data['apoyo_socioeconomico']; ?>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <?php echo $data['estado_apoyo']; ?>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <?php echo $data['inicio_apoyo']; ?>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <?php echo $data['fin_apoyo']; ?>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <?php echo $data['numero_resolucion_apoyo']; ?>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <div class="text-center"><button class="btn btn-primary glyphicon glyphicon-info-sign" data-toggle="modal" data-target="#modalEdicionNovedades" onclick="agregarformNovedades('<?php echo $datos_apoyos ?>')"></button></div>
                                </div>
                            </td>
                        </tr>

                    <?php
                        $cant++;
                    }
                    ?>
                </tbody>
            </table>
        <?php
        }
        ?>
        <?php
        // Se busca por el número de Ficha
        if ($tipo_busqueda == 2) {
            $res_apoyos = $mis_apoyos->viewApoyo_ficha($datoBusqueda);
            if ($res_apoyos == null) {
                echo '<script language = javascript>
                    alert ("Error... El dato no es válido. Por favor ingrese un número documento o número de ficha válido.") 
                    self.location="./busqueda.php"
                    </script>';
                return;
            }
            // Se crea un array para almacenar los valores únicos
            $res_apoyos_unico = [];
            $res_apoyos_unico[0]['numero_documento'] = [];
            $i = 0;
            // Se eliminan los datos repetidos del array original
            foreach ($res_apoyos as $data) {
                if ($data['numero_documento'] == $res_apoyos_unico[0]['numero_documento']) {
                } else {
                    $res_apoyos_unico[$i] = $data;
                }
                $i++;
            }
        ?>
            <!-- Tabla con información del Aprendiz -->
            <h1 class="text-center">INFORMACIÓN DE LA FICHA</h1>
            <table id="example1" class="table table-striped table-hover table-bordered">
                <thead>
                    <th>
                        <div class="text-center">Número de </br> Ficha </div>
                    </th>
                    <th>
                        <div class="text-center">Programa de </br> Formación </div>
                    </th>
                    <th>
                        <div class="text-center">Fecha Inicio </br> Ficha </div>
                    </th>
                    <th>
                        <div class="text-center">Fecha Fin </br> Ficha </div>
                    </th>
                    <th>
                        <div class="text-center">Nivel de </br> Formación </div>
                    </th>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="text-center">
                                <?php echo $res_apoyos[0]['ficha']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $res_apoyos[0]['programa_formacion']; ?>
                            </div>
                        </td>

                        <td>
                            <div class="text-center">
                                <?php echo $res_apoyos[0]['inicio_ficha']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $res_apoyos[0]['fin_ficha']; ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php echo $res_apoyos[0]['nivel_formacion']; ?>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            </br>
            </br>
            <!-- Tabla con información de los apoyos del aprendiz -->
            <h1 class="text-center">APRENDICES DE LA FICHA</h1>
            <table id="example" class="table table-striped table-hover table-bordered">
                <thead>
                    <th>
                        <div class="text-center">Item</div>
                    </th>
                    <th>
                        <div class="text-center">Nombres y </br> Apellidos</div>
                    </th>
                    <th>
                        <div class="text-center">Tipo de </br> Documento </div>
                    </th>
                    <th>
                        <div class="text-center">Número de </br> Documento </div>
                    </th>
                    <th>
                        <div class="text-center">Cantidad de </br> Apoyos </div>
                    </th>
                </thead>
                <tbody>
                    <?php
                    $cant = 1;
                    foreach ($res_apoyos_unico as $data) {
                        // Cuenta la cantidad de apoyos por aprendiz
                        $cant_apoyos = $mis_apoyos->countApoyos_aprendiz($data['numero_documento']);
                        // Datos
                        $datos_apoyos = $data['nombres_apellidos'] . "||" .
                            $data['tipo_documento'] . "||" .
                            $data['numero_documento'] . "||" .
                            $data['numero_resolucion_apoyo'];
                    ?>
                        <tr>
                            <td>
                                <div class="text-center">
                                    <?php echo $cant; ?>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <?php echo $data['nombres_apellidos']; ?>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <?php echo $data['tipo_documento']; ?>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <?php echo $data['numero_documento']; ?>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <a href="./datos_busqueda.php?codigo=<?php echo 1; ?>&valor=<?php echo $data['numero_documento']; ?>"><?php echo $cant_apoyos; ?></a>
                                </div>
                            </td>
                        </tr>
                    <?php
                        $cant++;
                    }
                    ?>
                </tbody>
            </table>
        <?php
        }
        ?>
    </div>
    </br>
    </br>
    </br>
    </br>
    <!-- FIN DEL CONTENIDO -->
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