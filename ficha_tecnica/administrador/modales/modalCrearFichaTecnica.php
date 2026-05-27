<?php
require_once '../modelo/val-admin.php';
require_once '../modelo/datos-usuarios.php';
require_once '../modelo/datos-ficha-tecnica.php';
$mis_Usuarios = new misUsuarios;
$mis_FichaTecnica = new misFichaTecnica;
?>

<!-- MODAL PARA Crear Reportes -->
<div class="modal fade" id="modalCrearFicahTecnica" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="tru">&times;</span></button>
                <div class="modal-title">
                    <h4>Guardar Ficha Tecnica</h4>
                </div>

            </div>
            <!-- <div class="modal-body">
                <p></p>
            </div> -->
            <div class="modal-footer">
                <div>
                    <button type="button" class="btn btn-primary" id="agregarNuevoFichaTecnica">
                        Confirmar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- MODAL PARA Usuario -->
<div class="modal fade" id="modalUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <div class="modal-title">
                    <h4 class="modal-title" id="myModalLabel">Agregar Usuario</h4>
                </div>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group">
                        <input type="hidden" id="codigo_usuariou" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre_propietario">Nombre Propietario</label>
                        <input type="text" id="nombre_propietario" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <label for="identificacion">Identificación</label>
                        <input type="text" id="identificacion" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Telefono</label>
                        <input type="text" id="telefono" class="form-control input-sm" required>
                    </div>
                    <div class="modal-footer">
                        <div>
                            <button type="button" class="btn btn-primary" id="agregarNuevoUsuario">
                                Agregar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalInforme" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <div class="modal-title">
                    <h4 class="modal-title" id="myModalLabel">Agregar Informe</h4>
                </div>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group">
                        <input type="hidden" id="cod_informeu" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <label for="marca">Marca</label>
                        <input type="text" id="marca" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <label for="referencia">Referencia</label>
                        <input type="text" id="referencia" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <label for="disco_duro">Disco Duro</label>
                        <input type="text" id="disco_duro" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <label for="memoria_ram">Memoria Ram</label>
                        <input type="text" id="memoria_ram" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <label for="tarjeta_de_video">Tarjeta Video</label>
                        <input type="text" id="tarjeta_de_video" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <label for="monitor">Monitor</label>
                        <input type="text" id="monitor" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre_board">Nombre Board</label>
                        <input type="text" id="nombre_board" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <label for="puertos_audio_voz">Puertos Audio Voz</label>
                        <input type="text" id="puertos_audio_voz" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <label for="chip_set_motherboard">Chip Set Motherboard</label>
                        <input type="text" id="chip_set_motherboard" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <label for="modelo">Modelo</label>
                        <input type="text" id="modelo" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <label for="microprocesador">Microprocesador</label>
                        <input type="text" id="microprocesador" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <label for="capacidad">Capacidad</label>
                        <input type="text" id="capacidad" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <label for="tipo_capacidad">Tipo Capacidad</label>
                        <input type="text" id="tipo_capacidad" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <label for="unid_cd_dvd">Unid Cd Dvd</label>
                        <input type="text" id="unid_cd_dvd" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <label for="teclado">Teclado</label>
                        <input type="text" id="teclado" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <label for="puerto_usb">Puerto Usb</label>
                        <input type="text" id="puerto_usb" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <label for="ranuras_para_memorias_ram">Ranuras Para Memorias Ram</label>
                        <input type="text" id="ranuras_para_memorias_ram" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <label for="tipo_de_bios">Tipo De Bios</label>
                        <input type="text" id="tipo_de_bios" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <label for="lector_de_tarjeta">Lector De Tarjeta</label>
                        <input type="text" id="lector_de_tarjeta" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <label for="ranura_pci">Ranura Pci</label>
                        <input type="text" id="ranura_pci" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <label for="aceleradora">Aceleradora</label>
                        <input type="text" id="aceleradora" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <label for="placa_de_red">Placa De Red</label>
                        <input type="text" id="placa_de_red" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <label for="version_de_bios">Version De Bios</label>
                        <input type="text" id="version_de_bios" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <label for="observaciones">Observaciones</label>
                        <input type="text" id="observaciones" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <label for="realizo">Realizo</label>
                        <input type="text" id="realizo" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <label for="recibio">Recibio</label>
                        <input type="text" id="recibio" class="form-control input-sm" required>
                    </div>
                    <div class="modal-footer">
                        <div>
                            <button type="button" class="btn btn-primary" id="agregarNuevoInforme">
                                Agregar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>