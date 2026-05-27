<?php
require_once '../../modelo/val-admin.php';
require_once '../../modelo/datos-apoyos.php';
// Instancias
$mis_apoyos = new misApoyos();
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
            <span class="active">Reportes</span>
        </li>
    </ul>
    <!-- END PAGE BREADCRUMB -->
    <!-- Inicio Línea horizontal -->
    <!-- <hr style="border:0px; border-top: 5px double #999999;" /> -->
    <!-- Fin Línea horizontal -->
    <!-- INICIO DEL CONTENIDO -->
    <div class="table-responsive">
        <?php
        $res_apoyos = $mis_apoyos->viewApoyos();
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
        <!-- Tabla con información de los apoyos del aprendiz -->
        <h1 class="text-center">APRENDICES CON APOYOS SOCIOECONÓMICOS</h1>
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
                    <div class="text-center">Número de </br> Ficha </div>
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
                        $data['ficha'] . "||" .
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
                                <a href="./datos_busqueda.php?codigo=<?php echo 2; ?>&valor=<?php echo $data['ficha']; ?>"><?php echo $data['ficha']; ?></a>
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
        </br>
        </br>
        </br>
        </br>
    </div>
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