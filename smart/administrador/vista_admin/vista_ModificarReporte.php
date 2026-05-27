<?php
require_once '../../modelo/val-admin.php';
require_once '../../modelo/datos-usuarios.php';
require '../../modelo/datos-mecanismo.php';
require '../../modelo/datos-reporte-mecanismo.php';
require '../../modelo/datos-sustancias.php';
require '../../modelo/datos-reporte-sustancias.php';
require '../../modelo/datos-hallazgos.php';
require '../../modelo/datos-reporte-hallazgo.php';
require '../../modelo/datos-reporte-tratamiento.php';
require_once '../../modelo/datos-Reportes.php';
require_once '../../modelo/datos-usuarios.php';
require '../../modelo/datos-cantidad_mecanismo_cliente.php';
$mis_CantidadMecanismoCliente = new misCantidadMecanismoCliente();
$mis_usuarios = new misUsuarios;
$mis_Mecanismo = new misMecanismos;
$mis_ReporteMecanismo = new misReporteMecanismo;
$mis_Sustancias = new misSustancias;
$mis_ReporteSustancias = new misReporteSustancias;
$mis_Hallazgos = new misHallazgos;
$mis_ReporteHallazgo = new misReporteHallazgo;
$mis_ReporteTratamiento = new misReporteTratamiento;
$mis_Reportes = new misReportes;
$maxReportes = $mis_Reportes->maxReporte();
// Se recupera el número del reporte para mantenerse en el, después de crer el usuario.
if (isset($_GET['reporte'])) {
    $reporte = $_GET['reporte'];
} else {
    $reporte = "";
}
?>
<div class="col-sm-12">

    <!-- TITLE -->
    <div class="page-head">
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Modificar Reporte <?php echo $reporte; ?></h1>
            </div>
            <!-- END PAGE TITLE -->
        </div>
    </div>

    <!-- TABLES -->
    <div class="modal-body">
        <div class="form-row">
            <div class="form-group">
                <input type="hidden" id="codigo" class="form-control input-sm" required value="<?php echo $reporte ?>">
            </div>
            <!-- Usuario -->
            <div class="form-group">
                <label for="usuario">Reporte Usuario</label>
                <!-- <input type="text" class="form-control" id="cantidad_mecanismo" placeholder="cantidad_mecanismo" required> -->
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                            <th>
                                <div class="text-center">Código</div>
                            </th>
                            <th>
                                <div class="text-center">Tipo Documento</div>
                            </th>
                            <th>
                                <div class="text-center">Usuario Id</div>
                            </th>
                            <th>
                                <div class="text-center">Nombre</div>
                            </th>
                            <th>
                                <div class="text-center">Fecha de Inicio</div>
                            </th>
                            <th>
                                <div class="text-center">Hora de Inicio</div>
                            </th>
                            <th>
                                <div class="text-center">Fecha Fin</div>
                            </th>
                            <th>
                                <div class="text-center">Hora Fin</div>
                            </th>
                            <th>
                                <div class="text-center">Editar</div>
                            </th>
                        </thead>
                        <tbody>
                            <?php
                            $res = $mis_Reportes->viewReporteUsuario($reporte);

                            foreach ($res as $data) {
                                $datos = $data['codigo'] . "||" .
                                    $data['tipo_doc'] . "||" .
                                    $data['usuario'] . "||" .
                                    $data['nombre_apellido'] . "||" .
                                    $data['fecha_de_inicio'] . "||" .
                                    $data['hora_de_inicio'] . "||" .
                                    $data['fecha_fin'] . "||" .
                                    $data['hora_fin'];
                            ?>
                                <tr>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['codigo']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['tipo_doc']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['usuario']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['nombre_apellido']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['fecha_de_inicio']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['hora_de_inicio']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['fecha_fin']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['hora_fin']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <button class="btn btn-primary glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicionUsuario" onclick="agregarformReportes('<?php echo  $datos ?>')"></button>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Tratamiento -->
            <div class="form-group">
                <label for="tratamiento">Tratamiento</label>
                <!-- <input type="text" class="form-control" id="cantidad_mecanismo" placeholder="cantidad_mecanismo" required> -->
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                            <!-- <th>
                                <div class="text-center">Código Reporte</div>
                            </th> -->
                            <th>
                                <div class="text-center">Usuario Id</div>
                            </th>
                            <th>
                                <div class="text-center">Tratamiento</div>
                            </th>
                            <th>
                                <div class="text-center">Metodo Control</div>
                            </th>
                            <th>
                                <div class="text-center">Tipo Plagas</div>
                            </th>
                            <th>
                                <div class="text-center">Nivel de Infestación</div>
                            </th>
                            <th>
                                <div class="text-center">Editar</div>
                            </th>
                        </thead>
                        <tbody>
                            <?php
                            $res = $mis_ReporteTratamiento->viewReporteTratamiento($reporte);
                            foreach ($res as $data) {
                                // Datos
                                $datos =  $data['codigo'] . "||" .
                                    $data['usuario'] . "||" .
                                    $data['tratamiento'] . "||" .
                                    $data['metodo_control'] . "||" .
                                    $data['tipo_plagas'] . "||" .
                                    $data['cod_reporte'] . "||" .
                                    $data['nivel_infestacion'];
                            ?>
                                <tr>
                                    <!-- <td>
                                        <div class="text-center">
                                            <?php echo $data['cod_reporte']; ?>
                                        </div>
                                    </td> -->
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['usuario']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['tratamiento']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['metodo_control']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['tipo_plagas']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['nivel_infestacion']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <button class="btn btn-primary glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicionTratamiento" onclick="agregarformTratamiento('<?php echo  $datos ?>')"></button>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

            </div>
            <!-- Sustancias -->
            <div class="form-group">
                <label for="sustancias">Sustancias</label>
                <!-- <input type="text" class="form-control" id="cantidad_de_sustancias" placeholder="cantidad_de_sustancias" required> -->
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                            <!-- <th>
                                <div class="text-center">Código Reporte</div>
                            </th> -->
                            <th>
                                <div class="text-center">Usuario Id</div>
                            </th>
                            <th>
                                <div class="text-center">Nombre sustancia</div>
                            </th>
                            <th>
                                <div class="text-center">Laboratorio</div>
                            </th>
                            <th>
                                <div class="text-center">Nivel de riesgo</div>
                            </th>
                            <th>
                                <div class="text-center">Cantidad</div>
                            </th>
                            <th>
                                <div class="text-center">Editar</div>
                            </th>
                        </thead>
                        <tbody>
                            <?php
                            $res = $mis_ReporteSustancias->viewReporteSustancia($reporte);
                            foreach ($res as $data) {
                                // Datos
                                $datos = $data['codigo'] . "||" .
                                    $data['cod_reporte'] . "||" .
                                    $data['usuario'] . "||" .
                                    $data['sustancias'] . "||" .
                                    $data['laboratorio'] . "||" .
                                    $data['nivel_riesgo'] . "||" .
                                    $data['cantidad'];

                                $sustancia = $mis_Sustancias->viewSustancia($data['sustancias']);
                            ?>
                                <tr>
                                    <!-- <td>
                                        <div class="text-center">
                                            <?php echo $data['cod_reporte']; ?>
                                        </div>
                                    </td> -->
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['usuario']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $sustancia[0]['nombre']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $sustancia[0]['laboratorio']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $sustancia[0]['nivel_riesgo']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['cantidad']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <button class="btn btn-primary glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicionSustancias" onclick="agregarformSustancias('<?php echo  $datos ?>')"></button>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Mecanismo -->
            <div class="form-group">
                <label for="mecanismo">Mecanismo</label>
                <!-- <input type="text" class="form-control" id="cantidad_mecanismo" placeholder="cantidad_mecanismo" required> -->
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                            <!-- <th>
                                <div class="text-center">Código</div>
                            </th> -->

                            <th>
                                <div class="text-center">Usuario Id</div>
                            </th>
                            <th>
                                <div class="text-center">Mecanismo</div>
                            </th>
                            <!-- <th>
                                <div class="text-center">Nombre</div>
                            </th> -->
                            <th>
                                <div class="text-center">Id</div>
                            </th>
                            <th>
                                <div class="text-center">Ubicación</div>
                            </th>
                            <th>
                                <div class="text-center">Observación</div>
                            </th>
                            <th>
                                <div class="text-center">Editar</div>
                            </th>
                        </thead>
                        <tbody>
                            <?php
                            $cant = 1;
                            $res = $mis_CantidadMecanismoCliente->viewMecanismoClienteReporte($reporte);
                            foreach ($res as $data) {
                                // Datos
                                $datos = $data['codigo'] . "||" .
                                    $data['nombre_mecanismo'] . "||" .
                                    $data['identificacion_cliente'] . "||" .
                                    $data['id'] . "||" .
                                    $data['ubicacion'] . "||"  .
                                    $data['observacion'] . "||"  .
                                    $data['estadoalerta'] . "||" .
                                    $data['estadobateria'];
                                $id = $data['id'];

                                // Consulta para traer el nombre del cliente.
                                $mi_usuario = $mis_usuarios->viewUsuarioDocumento($data['identificacion_cliente']);

                                // echo '<script>';
                                // echo 'console.log(' . json_encode($mi_usuario) . ');';
                                // echo '</script>';
                            ?>
                                <tr>
                                    <!-- <td>
                                        <div class="text-center">
                                            <?php echo $data['codigo']; ?>
                                        </div>
                                    </td> -->
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['identificacion_cliente']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['nombre_mecanismo']; ?>
                                        </div>
                                    </td>
                                    <!-- <td>
                                        <div class="text-center">
                                            <?php echo $mi_usuario[0]['nombre'] . " " . $mi_usuario[0]['apellido']; ?>
                                        </div>
                                    </td> -->
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['id']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['ubicacion']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['observacion']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <button class="btn btn-primary glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicionCantidadMecanismoCliente" onclick="agregarformCantidadMecanismoCliente('<?php echo  $datos ?>')"></button>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                                $cant++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Hallazgo -->
            <div class="form-group">
                <label for="hallazgos">Oportunidad de Mejora</label>
                <!-- <input type="text" class="form-control" id="hallazgo" placeholder="hallazgo" required> -->
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                            <!-- <th>
                                <div class="text-center">Código Reporte</div>
                            </th> -->
                            <th>
                                <div class="text-center">Usuario Id</div>
                            </th>
                            <th>
                                <div class="text-center">Tipo de Mejora</div>
                            </th>
                            <th>
                                <div class="text-center">Evidencia 1</div>
                            </th>
                            <th>
                                <div class="text-center">Oportunidad de Mejora 1</div>
                            </th>
                            <th>
                                <div class="text-center">Evidencia 2</div>
                            </th>
                            <th>
                                <div class="text-center">Oportunidad de Mejora 2</div>
                            </th>
                            <th>
                                <div class="text-center">Evidencia 3</div>
                            </th>
                            <th>
                                <div class="text-center">Oportunidad de Mejora 3</div>
                            </th>
                            <th>
                                <div class="text-center">Evidencia 4</div>
                            </th>
                            <th>
                                <div class="text-center">Oportunidad de Mejora 4</div>
                            </th>
                            <th>
                                <div class="text-center">Cargar Foto</div>
                            </th>
                            <th>
                                <div class="text-center">Editar</div>
                            </th>
                        </thead>
                        <tbody>
                            <?php
                            $res = $mis_ReporteHallazgo->viewReporteHallazgo($reporte);
                            foreach ($res as $data) {

                                // Datos
                                $datos = $data['codigo'] . "||" .
                                    $data['usuario'] . "||" .
                                    $data['hallazgo'] . "||" .
                                    $data['cod_reporte'] . "||" .
                                    $data['foto1'] . "||" .
                                    $data['oportunidad_1'] . "||" .
                                    $data['foto2'] . "||" .
                                    $data['oportunidad_2'] . "||" .
                                    $data['foto3'] . "||" .
                                    $data['oportunidad_3'] . "||" .
                                    $data['foto4'] . "||" .
                                    $data['oportunidad_4'];

                            ?>
                                <tr>
                                    <!-- <td>
                                        <div class="text-center">
                                            <?php echo $data['cod_reporte']; ?>
                                        </div>
                                    </td> -->
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['usuario']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['hallazgo']; ?>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="text-center">
                                            <a href="../img_hallazgos/<?php echo $data['foto1']; ?>" target="_blank"><?php echo $data['foto1']; ?></a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['oportunidad_1']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <a href="../img_hallazgos/<?php echo $data['foto2']; ?>" target="_blank"><?php echo $data['foto2']; ?></a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['oportunidad_2']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <a href="../img_hallazgos/<?php echo $data['foto3']; ?>" target="_blank"><?php echo $data['foto3']; ?></a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['oportunidad_3']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <a href="../img_hallazgos/<?php echo $data['foto4']; ?>" target="_blank"><?php echo $data['foto4']; ?></a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['oportunidad_4']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center"><a href="./cargar-archivo.php?informacion=<?php echo $data['codigo'] . "-" . $reporte . "-" . "m";  ?>">Cargar archivo</a></div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <button class="btn btn-primary glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicionHallazgo" onclick="agregarformHallazgo('<?php echo  $datos ?>')"></button>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
        </div>
    </div>
</div>