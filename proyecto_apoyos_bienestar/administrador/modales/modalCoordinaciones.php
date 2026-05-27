<?php
if ($rol_id == 3) {
  $no_modificar = "readonly";
} else {
  $no_modificar = "";
}
?>
<!-- Modal registro de un instructor -->
<div class="modal fade" id="modalNuevoCoordinaciones" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <div class="modal-title">
          <h4>Registrar nueva coordinación</h4>
        </div>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-row">
            <div class="form-group">
              <label for="coordinador">Nombre del Coordinador</label>
              <input type="text" class="form-control" id="coordinador" placeholder="Coordinador">
            </div>
            <div class="form-group">
              <label for="padrino_bienestar">Padrino Bienestar</label>
              <input type="text" class="form-control" id="padrino_bienestar" placeholder="Nombre del Padrino de Bienestar">
            </div>
            <div class="form-group">
              <label for="ficha">Número de Ficha</label>
              <input type="text" class="form-control" id="ficha" placeholder="Número de la Ficha">
            </div>
            <!-- <div class="form-group">
              <label for="tipoOferta">Tipo de Oferta</label>
              <input type="text" class="form-control" id="tipoOferta" placeholder="Tipo de la oferta">
            </div> -->
            <div class="form-group">
              <label for="modalidad">Modalidad</label>
              <input type="text" class="form-control" id="modalidad" placeholder="Modalidad de la formación">
            </div>
            <div class="form-group">
              <label for="etapaFicha">Etapa Ficha</label>
              <input type="text" class="form-control" id="etapaFicha" placeholder="Etapa que se encuentra la ficha">
            </div>
            <div class="form-group">
              <label for="nivelFormacion">Nivel de la Formación</label>
              <input type="text" class="form-control" id="nivelFormacion" placeholder="Nivel de la formación">
            </div>
            <div class="form-group">
              <label for="programa_formacion">Programa de Formación</label>
              <input type="text" class="form-control" id="programa_formacion" placeholder="Programa de Formación">
            </div>
            <div class="form-group">
              <label for="fechaInicio">Fecha de Inicio de la Formación</label>
              <input type="text" class="form-control" id="fechaInicio" placeholder="Fecha Inicio">
            </div>
            <div class="form-group">
              <label for="fechaFin">Fecha Fin de la Formación</label>
              <input type="text" class="form-control" id="fechaFin" placeholder="Fecha Fin">
            </div>
            <div class="form-group">
              <label for="municipio">Municipio</label>
              <input type="text" class="form-control" id="municipio" placeholder="Municipio">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label for="instructor">Nombre del Instructor</label>
              <input type="text" class="form-control" id="instructor" placeholder="Nombre del Instructor">
            </div>
            <div class="form-group">
              <label for="movilInstructor">Móvil del Instructor</label>
              <input type="text" class="form-control" id="movilInstructor" placeholder="Móvil del Instructor">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label for="sede">SEDE</label>
              <input type="text" class="form-control" id="sede" placeholder="sede">
            </div>
            <div class="form-group">
              <label for="ambiente">Ambiente</label>
              <input type="text" class="form-control" id="ambiente" placeholder="ambiente">
            </div>
            <div class="form-group">
              <label for="jornada">Jornada</label>
              <input type="text" class="form-control" id="jornada" placeholder="jornada">
            </div>
            <div class="form-group">
              <label for="horario">Horario</label>
              <input type="text" class="form-control" id="horario" placeholder="horario">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label for="lider_vocero">Lider Vocero</label>
              <input type="text" class="form-control" id="lider_vocero" placeholder="Lider Vocero">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label for="celular">Movil Líder Vocero</label>
              <input type="text" class="form-control" id="celular" placeholder="Número Celular">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label for="correo">Correo</label>
              <input type="text" class="form-control" id="correo" placeholder="Correo">
            </div>
          </div>
        </form>
        <div class="modal-footer">
          <div>
            <button type="button" class="btn btn-primary" data-dismiss="modal" id="agregarNuevoCoordinaciones">
              Agregar
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal ACTUALIZAR información de un instructor -->
<div class="modal fade" id="modalEdicionCoordinaciones" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <div class="modal-title">
          <h4>Actualizar coordinación
            <small></small>
          </h4>
        </div>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-row">
            <div class="form-group">
              <!-- <label for="cod_coordinacionesu">Item</label> -->
              <input type="hidden" class="form-control" id="cod_coordinacionesu" placeholder="Coordinador" required readonly>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label for="coordinadoru">Nombre del Coordinador</label>
              <input type="text" class="form-control" id="coordinadoru" placeholder="Coordinador" <?php echo $no_modificar; ?>>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label for="padrino_bienestaru">Padrino Bienestar</label>
              <input type="text" class="form-control" id="padrino_bienestaru" placeholder="Nombre del Padrino de Bienestar" <?php echo $no_modificar; ?>>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label for="fichau">Número de Ficha</label>
              <input type="text" class="form-control" id="fichau" placeholder="Número de la Ficha" <?php echo $no_modificar; ?>>
            </div>
          </div>
          <!-- <div class="form-row">
            <div class="form-group">
              <label for="fichau">Tipo de Oferta</label>
              <input type="text" class="form-control" id="tipoOfertau" placeholder="Número de la Ficha" <?php echo $no_modificar; ?>>
            </div>
          </div> -->
          <div class="form-row">
            <div class="form-group">
              <label for="fichau">Modalidad</label>
              <input type="text" class="form-control" id="modalidadu" placeholder="Número de la Ficha" <?php echo $no_modificar; ?>>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label for="fichau">Etapa Ficha</label>
              <input type="text" class="form-control" id="etapaFichau" placeholder="Número de la Ficha" <?php echo $no_modificar; ?>>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label for="fichau">Nivel de la Formación</label>
              <input type="text" class="form-control" id="nivelFormacionu" placeholder="Número de la Ficha" <?php echo $no_modificar; ?>>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label for="programa_formacionu">Programa de Formación</label>
              <input type="text" class="form-control" id="programa_formacionu" placeholder="Programa de Formación" <?php echo $no_modificar; ?>>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label for="fechaIniciou">Fecha de Inicio de la Formación </label>
              <input type="text" class="form-control" id="fechaIniciou" placeholder="Fecha de Inicio" <?php echo $no_modificar; ?>>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label for="fechaFinu">Fecha Fin de la Formación</label>
              <input type="text" class="form-control" id="fechaFinu" placeholder="Fecha Fin" <?php echo $no_modificar; ?>>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label for="municipiou">Municipio</label>
              <input type="text" class="form-control" id="municipiou" placeholder="Municipio" <?php echo $no_modificar; ?>>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label for="instructoru">Nombre del Instructor</label>
              <input type="text" class="form-control" id="instructoru" placeholder="Nombre del Instructor" <?php echo $no_modificar; ?>>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label for="movilInstructoru">Móvil del Instructor</label>
              <input type="text" class="form-control" id="movilInstructoru" placeholder="movil Instructor" <?php echo $no_modificar; ?>>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label for="sedeu">SEDE</label>
              <input type="text" class="form-control" id="sedeu" placeholder="sede" <?php echo $no_modificar; ?>>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label for="ambienteu">Ambiente</label>
              <input type="text" class="form-control" id="ambienteu" placeholder="ambiente" <?php echo $no_modificar; ?>>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label for="jornadau">Jornada</label>
              <input type="text" class="form-control" id="jornadau" placeholder="jornada" <?php echo $no_modificar; ?>>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label for="horariou">Horario</label>
              <input type="text" class="form-control" id="horariou" placeholder="horario" <?php echo $no_modificar; ?>>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label for="lider_vocerou">Lider Vocero</label>
              <input type="text" class="form-control" id="lider_vocerou" placeholder="Lider Vocero">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label for="celularu">Número Celular</label>
              <input type="text" class="form-control" id="celularu" placeholder="Número Celular">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label for="correou">Correo</label>
              <input type="text" class="form-control" id="correou" placeholder="Correo">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <div class="col-sm-6 text-left">
          <button type="button" class="btn btn-danger" data-dismiss="modal" id="eliminarDatosCoordinaciones">
            Eliminar
          </button>
        </div>
        <div class="col-sm-6 text-right">
          <button type="button" class="btn btn-warning" data-dismiss="modal" id="actualizaDatosCoordinaciones">
            Actualizar
          </button>
        </div>
      </div>
    </div>
  </div>
</div>