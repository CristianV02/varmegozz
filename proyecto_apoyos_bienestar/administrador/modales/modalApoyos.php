<!-- MODAL PARA INSERTAR REGISTROS -->
<div class="modal fade" id="modalNuevoApoyos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Agregar Registro</h4>
      </div>
      <div class="modal-body">
        <label>Tipo documento</label>
        <input type="text" id="tipo_documento" class="form-control input-sm" required="">
        <br />
        <label>Número de Identificación</label>
        <input type="number" id="numero_documento" class="form-control input-sm" required="">
        <br />
        <label>Nombres y apellidos</label>
        <input type="text" id="nombres_apellidos" class="form-control input-sm" required="">
        <br />
        <label>Número de Ficha</label>
        <input type="number" id="ficha" class="form-control input-sm" required="">
        <br />
        <label>Programa de formación</label>
        <input type="text" id="programa_formacion" class="form-control input-sm" required="">
        <br />
        <label>Fecha de inicio Ficha</label>
        <input type="text" id="inicio_ficha" class="form-control input-sm" required="">
        <br />
        <label>Fecha fin Ficha</label>
        <input type="text" id="fin_ficha" class="form-control input-sm" required="">
        <br />
        <label>Nivel de Formación</label>
        <input type="text" id="nivel_formacion" class="form-control input-sm" required="">
        <br />
        <label>Estado del Aprendiz en la Formación</label>
        <input type="text" id="estado_aprendiz" class="form-control input-sm" required="">
        <br />
        <label>Apoyos Socioecónomicos</label>
        <input type="text" id="apoyo_socioeconomico" class="form-control input-sm" required="">
        <br />
        <label>Estado del apoyo</label>
        <input type="text" id="estado_apoyo" class="form-control input-sm" required="">
        <br />
        <label>Fecha inicio apoyo</label>
        <input type="text" id="inicio_apoyo" class="form-control input-sm" required="">
        <br />
        <label>Fecha fin apoyo</label>
        <input type="text" id="fin_apoyo" class="form-control input-sm" required="">
        <br />
        <label>Número resolución del apoyo</label>
        <input type="text" id="numero_resolucion_apoyo" class="form-control input-sm" required="">
        <br />
        <label>Nombre de la novedad por suspensión</label>
        <input type="text" id="nombre_novedad_suspension" class="form-control input-sm">
        <br />
        <label>Motivo de la suspensión</label>
        <input type="text" id="motivo_suspension" class="form-control input-sm">
        <br />
        <label>Fecha de la novedad de suspensión</label>
        <input type="text" id="fecha_novedad_suspension" class="form-control input-sm">
        <br />
        <label>Nombre quien registra la novedad de suspensión</label>
        <input type="text" id="nombre_registro_suspension" class="form-control input-sm">
        <br />
        <label>Número resolución de la novedad de suspensión</label>
        <input type="text" id="resolucion_novedad_suspension" class="form-control input-sm">
        <br />
        <label>Nombre de la novedad por reactivación</label>
        <input type="text" id="nombre_novedad_reactivacion" class="form-control input-sm">
        <br />
        <label>Motivo de la reactivación</label>
        <input type="text" id="motivo_reactivacion" class="form-control input-sm">
        <br />
        <label>Fecha de la novedad de reactivación</label>
        <input type="text" id="fecha_novedad_reactivacion" class="form-control input-sm">
        <br />
        <label>Nombre quien registra la novedad de reactivación</label>
        <input type="text" id="nombre_registro_reactivacion" class="form-control input-sm">
        <br />
        <label>Número resolución de la novedad de reactivación</label>
        <input type="text" id="resolucion_novedad_reactivacion" class="form-control input-sm">
        <br />
        <label>Nombre de la novedad por cancelación</label>
        <input type="text" id="nombre_novedad_cancelacion" class="form-control input-sm">
        <br />
        <label>Motivo de la cancelación</label>
        <input type="text" id="motivo_cancelacion" class="form-control input-sm">
        <br />
        <label>Fecha de la novedad de cancelación</label>
        <input type="text" id="fecha_novedad_cancelacion" class="form-control input-sm">
        <br />
        <label>Nombre quien registra la novedad de cancelación</label>
        <input type="text" id="nombre_registro_cancelacion" class="form-control input-sm">
        <br />
        <label>Número resolución de la novedad de cancelación</label>
        <input type="text" id="resolucion_novedad_cancelacion" class="form-control input-sm">
        <br />


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="agregarNuevoApoyos">
          Agregar
        </button>
      </div>
    </div>
  </div>
</div>
<!-- MODAL PARA EDICION DE DATOS-->
<div class="modal fade" id="modalEdicionApoyos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Actualizar Apoyos</h4>
      </div>
      <div class="modal-body">
        <label>Item</label>
        <input type="text" id="codigou" class="form-control input-sm" readonly required="">
        <br />
        <label>Tipo documento</label>
        <input type="text" id="tipo_documentou" class="form-control input-sm" required="">
        <br />
        <label>Número de Identificación</label>
        <input type="number" id="numero_documentou" class="form-control input-sm" required="">
        <br />
        <label>Nombre y apellidos</label>
        <input type="text" id="nombres_apellidosu" class="form-control input-sm" required="">
        <br />
        <label>Número de Ficha</label>
        <input type="number" id="fichau" class="form-control input-sm" required="">
        <br />
        <label>Programa de formación</label>
        <input type="text" id="programa_formacionu" class="form-control input-sm" required="">
        <br />
        <label>Fecha de inicio Ficha</label>
        <input type="text" id="inicio_fichau" class="form-control input-sm" required="">
        <br />
        <label>Fecha fin Ficha</label>
        <input type="text" id="fin_fichau" class="form-control input-sm" required="">
        <br />
        <label>Nivel de Formación</label>
        <input type="text" id="nivel_formacionu" class="form-control input-sm" required="">
        <br />
        <label>Estado del Aprendiz en la Formación</label>
        <input type="text" id="estado_aprendizu" class="form-control input-sm" required="">
        <br />
        <label>Apoyos Socioecónomicos</label>
        <input type="text" id="apoyo_socioeconomicou" class="form-control input-sm" required="">
        <br />
        <label>Estado del apoyo</label>
        <input type="text" id="estado_apoyou" class="form-control input-sm" required="">
        <br />
        <label>Fecha inicio apoyo</label>
        <input type="text" id="inicio_apoyou" class="form-control input-sm" required="">
        <br />
        <label>Fecha fin apoyo</label>
        <input type="text" id="fin_apoyou" class="form-control input-sm" required="">
        <br />
        <label>Número resolución del apoyo</label>
        <input type="text" id="numero_resolucion_apoyou" class="form-control input-sm" required="">
        <br />
        <label>Nombre de la novedad por suspensión</label>
        <input type="text" id="nombre_novedad_suspensionu" class="form-control input-sm">
        <br />
        <label>Motivo de la suspensión</label>
        <input type="text" id="motivo_suspensionu" class="form-control input-sm">
        <br />
        <label>Fecha de la novedad de suspensión</label>
        <input type="text" id="fecha_novedad_suspensionu" class="form-control input-sm">
        <br />
        <label>Nombre quien registra la novedad de suspensión</label>
        <input type="text" id="nombre_registro_suspensionu" class="form-control input-sm">
        <br />
        <label>Número resolución de la novedad de suspensión</label>
        <input type="text" id="resolucion_novedad_suspensionu" class="form-control input-sm">
        <br />
        <label>Nombre de la novedad por reactivación</label>
        <input type="text" id="nombre_novedad_reactivacionu" class="form-control input-sm">
        <br />
        <label>Motivo de la reactivación</label>
        <input type="text" id="motivo_reactivacionu" class="form-control input-sm">
        <br />
        <label>Fecha de la novedad de reactivación</label>
        <input type="text" id="fecha_novedad_reactivacionu" class="form-control input-sm">
        <br />
        <label>Nombre quien registra la novedad de reactivación</label>
        <input type="text" id="nombre_registro_reactivacionu" class="form-control input-sm">
        <br />
        <label>Número resolución de la novedad de reactivación</label>
        <input type="text" id="resolucion_novedad_reactivacionu" class="form-control input-sm">
        <br />
        <label>Nombre de la novedad por cancelación</label>
        <input type="text" id="nombre_novedad_cancelacionu" class="form-control input-sm">
        <br />
        <label>Motivo de la cancelación</label>
        <input type="text" id="motivo_cancelacionu" class="form-control input-sm">
        <br />
        <label>Fecha de la novedad de cancelación</label>
        <input type="text" id="fecha_novedad_cancelacionu" class="form-control input-sm">
        <br />
        <label>Nombre quien registra la novedad de cancelación</label>
        <input type="text" id="nombre_registro_cancelacionu" class="form-control input-sm">
        <br />
        <label>Número resolución de la novedad de cancelación</label>
        <input type="text" id="resolucion_novedad_cancelacionu" class="form-control input-sm">
        <br />
      </div>
      <div class="modal-footer">
        <div class="col-sm-6 text-left">
          <button type="button" class="btn btn-danger" data-dismiss="modal" id="eliminarDatosApoyos">
            Eliminar
          </button>
        </div>
        <div class="col-sm-6 text-right">
          <button type="button" class="btn btn-warning" data-dismiss="modal" id="actualizaDatosApoyos">
            Actualizar
          </button>
        </div>
      </div>
    </div>
  </div>
</div>