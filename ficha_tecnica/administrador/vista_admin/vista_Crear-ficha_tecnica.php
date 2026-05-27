<?php
require_once '../../modelo/val-admin.php';
require_once '../../modelo/datos-usuarios.php';
require_once '../../modelo/datos-ficha-tecnica.php';
require_once '../../modelo/datos-informe.php';
$mis_usuarios = new misUsuarios;
$mis_FichaTecnica = new misFichaTecnica;
$mis_Informe = new misInforme;
$maxFichaTecnica = $mis_FichaTecnica->maxFichaTecnica();

// Se recupera el número del ficha_tecnica para mantenerse en el, después de crear el usuario.
if (isset($_GET['ficha_tecnica'])) {
    $ficha_tecnica = $_GET['ficha_tecnica'];
} else {
    $ficha_tecnica = "";
}
?>
<div class="col-sm-12">
    <!-- TITLE -->
    <div class="page-head">
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Crear Ficha Tecnica <?php echo $ficha_tecnica; ?></h1>
            </div>
            <!-- END PAGE TITLE -->
        </div>
    </div>
    <!-- TABLES -->
    <div class="modal-body">
        <div class="form-row">
            <div class="form-group">
                <input type="hidden" id="codigo" class="form-control input-sm" required value="<?php echo $ficha_tecnica ?>">
            </div>
            <!-- Usuario -->
            <div class="form-group">
                <p>Usuario</p>
                <!-- <input type="text" class="form-control" id="cantidad_mecanismo" placeholder="cantidad_mecanismo" required> -->
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                            <th>
                                <div class="text-center">Código</div>
                            </th>
                            <th>
                                <div class="text-center">Nombre Propietario</div>
                            </th>
                            <th>
                                <div class="text-center">Identificación</div>
                            </th>
                            <th>
                                <div class="text-center">Telefono</div>
                            </th>

                        </thead>
                        <tbody>
                            <?php
                            $res = $mis_FichaTecnica->viewFichaTecnica($ficha_tecnica);

                            foreach ($res as $data) {
                                $datos = $data['codigo'] . "||" .
                                    $data['nombre_propietario'] . "||" .
                                    $data['identificacion'] . "||" .
                                    $data['telefono'];
                            ?>
                                <tr>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['codigo']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['nombre_propietario']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['identificacion']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['telefono']; ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalUsuario" onclick="agregarformFIchaTecnica(<?php echo $ficha_tecnica; ?>)">Agregar Usuario</button>
                </div>
            </div>
            <!-- informe -->
            <div class="form-group" <?php if (count($res) == 0) { ?> style="display: none" <?php } ?>>
                <p>Informe</p>
                <!-- <input type="text" class="form-control" id="cantidad_mecanismo" placeholder="cantidad_mecanismo" required> -->
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                            <th>
                                <div class="text-center">Codigo</div>
                            </th>
                            <th>
                                <div class="text-center">Marca</div>
                            </th>
                            <th>
                                <div class="text-center">Referencia</div>
                            </th>
                            <th>
                                <div class="text-center">Disco Duro</div>
                            </th>
                            <th>
                                <div class="text-center">Memoria Ram</div>
                            </th>
                            <th>
                                <div class="text-center">Tarjeta Video</div>
                            </th>
                            <th>
                                <div class="text-center">Monitor</div>
                            </th>
                            <th>
                                <div class="text-center">Nombre Board</div>
                            </th>
                            <th>
                                <div class="text-center">Puertos Audio/Voz</div>
                            </th>
                            <th>
                                <div class="text-center">Chip Motherboard</div>
                            </th>
                            <th>
                                <div class="text-center">Modelo</div>
                            </th>
                            <th>
                                <div class="text-center">Microprocesador</div>
                            </th>
                            <th>
                                <div class="text-center">Capacidad</div>
                            </th>
                            <th>
                                <div class="text-center">Tipo Capacidad</div>
                            </th>
                            <th>
                                <div class="text-center">Unidad Cd Dvd</div>
                            </th>
                            <th>
                                <div class="text-center">Teclado</div>
                            </th>
                            <th>
                                <div class="text-center">Puerto Usb</div>
                            </th>
                            <th>
                                <div class="text-center">Ranuras Memoria Ram</div>
                            </th>
                            <th>
                                <div class="text-center">Tipo Bios</div>
                            </th>
                            <th>
                                <div class="text-center">Lector Tarjeta</div>
                            </th>
                            <th>
                                <div class="text-center">Ranura Pci</div>
                            </th>
                            <th>
                                <div class="text-center">Aceleradora</div>
                            </th>
                            <th>
                                <div class="text-center">Placa Red</div>
                            </th>
                            <th>
                                <div class="text-center">Version Bios</div>
                            </th>
                            <th>
                                <div class="text-center">Observaciones</div>
                            </th>
                            <th>
                                <div class="text-center">Realizo</div>
                            </th>
                            <th>
                                <div class="text-center">Recibio</div>
                            </th>
                        </thead>
                        <tbody>
                            <?php
                            $res = $mis_Informe->viewInforme($ficha_tecnica);
                            foreach ($res as $data) {

                                // Datos
                                $datos = $data['codigo'] . "||" .
                                    $data['marca'] . "||" .
                                    $data['referencia'] . "||" .
                                    $data['disco_duro'] . "||" .
                                    $data['memoria_ram'] . "||" .
                                    $data['tarjeta_de_video'] . "||" .
                                    $data['monitor'] . "||" .
                                    $data['nombre_board'] . "||" .
                                    $data['puertos_audio_voz'] . "||" .
                                    $data['chip_set_motherboard'] . "||" .
                                    $data['modelo'] . "||" .
                                    $data['microprocesador'] . "||" .
                                    $data['capacidad'] . "||" .
                                    $data['tipo_capacidad'] . "||" .
                                    $data['unid_cd_dvd'] . "||" .
                                    $data['teclado'] . "||" .
                                    $data['puerto_usb'] . "||" .
                                    $data['ranuras_para_memorias_ram'] . "||" .
                                    $data['tipo_de_bios'] . "||" .
                                    $data['lector_de_tarjeta'] . "||" .
                                    $data['ranura_pci'] . "||" .
                                    $data['aceleradora'] . "||" .
                                    $data['placa_de_red'] . "||" .
                                    $data['version_de_bios'] . "||" .
                                    $data['observaciones'] . "||" .
                                    $data['realizo'] . "||" .
                                    $data['recibio'];

                            ?>
                                <tr>
                                     <td>
                                        <div class="text-center">
                                            <?php echo $data['codigo']; ?>
                                        </div>
                                    </td> 
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['marca']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['referencia']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['disco_duro']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['memoria_ram']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['tarjeta_de_video']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['monitor']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['nombre_board']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['puertos_audio_voz']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['chip_set_motherboard']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['modelo']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['microprocesador']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['capacidad']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['tipo_capacidad']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['unid_cd_dvd']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['teclado']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['puerto_usb']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['ranuras_para_memorias_ram']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['tipo_de_bios']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['lector_de_tarjeta']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['ranura_pci']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['aceleradora']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['placa_de_red']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['version_de_bios']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['observaciones']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['realizo']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <?php echo $data['recibio']; ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalInforme" onclick="agregarformFichaTecnica(<?php echo $ficha_tecnica; ?>)"> Agregar Informe</button>
                    <br />
                </div>
            </div>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalCrearFicahTecnica">Guardar Ficha Tecnica</button>
            <br />
            <br />
            <br />
            <br />
        </div>
    </div>
</div>