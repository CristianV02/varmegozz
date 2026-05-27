<!-- MODAL PARA VER LAS NOVEDADES -->
<div class="modal fade" id="modalEdicionNovedades" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Actualizar Apoyos</h4>
      </div>
      <div class="modal-body">
        <!-- <label>Item</label> -->
        <input type="hidden" id="codigou" class="form-control input-sm" readonly require="">
        <h1>Suspensión</h1>
        <label>Nombre de la novedad por suspensión</label>
        <input type="text" id="nombre_novedad_suspensionu" class="form-control input-sm" readonly>
        <br />
        <label>Motivo de la suspensión</label>
        <input type="text" id="motivo_suspensionu" class="form-control input-sm" readonly>
        <br />
        <label>Fecha de la novedad de suspensión</label>
        <input type="text" id="fecha_novedad_suspensionu" class="form-control input-sm" readonly>
        <br />
        <label>Nombre quien registra la novedad de suspensión</label>
        <input type="text" id="nombre_registro_suspensionu" class="form-control input-sm" readonly>
        <br />
        <label>Número resolución de la novedad de suspensión</label>
        <input type="text" id="resolucion_novedad_suspensionu" class="form-control input-sm" readonly>
        <br />
        <h1>Reactivación</h1>
        <label>Nombre de la novedad por reactivación</label>
        <input type="text" id="nombre_novedad_reactivacionu" class="form-control input-sm" readonly>
        <br />
        <label>Motivo de la reactivación</label>
        <input type="text" id="motivo_reactivacionu" class="form-control input-sm" readonly>
        <br />
        <label>Fecha de la novedad de reactivación</label>
        <input type="text" id="fecha_novedad_reactivacionu" class="form-control input-sm" readonly>
        <br />
        <label>Nombre quien registra la novedad de reactivación</label>
        <input type="text" id="nombre_registro_reactivacionu" class="form-control input-sm" readonly>
        <br />
        <label>Número resolución de la novedad de reactivación</label>
        <input type="text" id="resolucion_novedad_reactivacionu" class="form-control input-sm" readonly>
        <br />
        <h1>Cancelación</h1>
        <label>Nombre de la novedad por cancelación</label>
        <input type="text" id="nombre_novedad_cancelacionu" class="form-control input-sm" readonly>
        <br />
        <label>Motivo de la cancelación</label>
        <input type="text" id="motivo_cancelacionu" class="form-control input-sm" readonly>
        <br />
        <label>Fecha de la novedad de cancelación</label>
        <input type="text" id="fecha_novedad_cancelacionu" class="form-control input-sm" readonly>
        <br />
        <label>Nombre quien registra la novedad de cancelación</label>
        <input type="text" id="nombre_registro_cancelacionu" class="form-control input-sm" readonly>
        <br />
        <label>Número resolución de la novedad de cancelación</label>
        <input type="text" id="resolucion_novedad_cancelacionu" class="form-control input-sm" readonly>
        <br />
      </div>
      <div class="modal-footer">
        <div class="col-sm-6 text-left">
          <button type="button" class="btn btn-danger" data-dismiss="modal">
            Cerrar
          </button>
        </div>
      </div>
    </div>
  </div>
</div>