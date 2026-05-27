<?php
require_once '../../modelo/val-admin.php';
require_once '../../modelo/datos-informe.php';
// Instancias
$mis_Informe = new misInforme();
?>
<div class="d-flex">
    <!-- Inicio titulos de la pagina-->
    <div id="sidebar-container" class="bg-primary">
        <div class="logo">
            <img id="logo" src="../imagenes/mantenimiento.png" alt="Logo Icoplast">
        </div>
        <div class="menu">
            <a href="dashBoard.php" class="d-block text-light p-3"><i class="bi bi-people-fill me-2 lead"></i>DashBoard</a>
            <a href="user.php" class="d-block text-light p-3"><i class="bi bi-people-fill me-2 lead"></i>User</a>
            <a href="tipo-documento.php" class="d-block text-light p-3"><i class="bi bi-file-earmark-text-fill me-2 lead"></i>Tipo Documento</a>
            <a href="ficha_tecnica.php" class="d-block text-light p-3"><i class="bi bi-bag me-2 lead"></i>Ficha Tecnica</a>
        </div>
    </div>

    <!-- END PAGE HEAD-->
    <!-- INICIO DEL CONTENIDO -->

    <div class="container-fluid d-block">
        <div class="w-100">
            <nav class="navbar navbar-expand-lg border-bottom">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
                        onclick="mostrarOcultar(event)">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0"
                            id="navbar-nav-icons">
                            <li class="nav-item dropdown">
                                <a href="dashBoard.php" class="d-block text-dark p-3"><i class="bi bi-people-fill me-2 lead"></i>DashBoard</a>
                                <a href="user.php" class="d-block text-dark p-3"><i class="bi bi-people-fill me-2 lead"></i>User</a>
                                <a href="tipo-documento.php" class="d-block text-dark p-3"><i class="bi bi-file-earmark-text-fill me-2 lead"></i>Tipo Documento</a>
                                <a href="ficha_tecnica.php" class="d-block text-dark p-3"><i class="bi bi-bag me-2 lead"></i>Ficha Tecnica</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="../modelo/salir.php" role="button" aria-expanded="false">
                                    <img src="../imagenes/avatar.png" alt="imagen de usuario" class="img-fluid rounded-circle me-2 avatar">
                                    <?php echo $nombre . " " . $apellido ?> <span class="btn-cerrarsesion">(Cerrar Sesión)</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="text">
                <h3>Informe</h3>
            </div>
            <!-- INICIO DEL CONTENIDO -->
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
                        $res = $mis_Informe->viewInformes();
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

        </div>
        <br />
        <br />
        <br />
        <br />
    </div>
</div>
</div>