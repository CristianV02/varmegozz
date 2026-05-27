<!-- Modal registro de un usuario -->
<div class="modal fade" id="modalNuevoClases" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <div class="modal-title">
          <h4>Registrar nuevo elemento</h4>
        </div>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-row">
            <div class="form-group">
            <label for="tipo_documento">Tipo documento</label>
              <input type="text" class="form-control" id="tipo_documento" placeholder="tipo documento" required>
            </div>
            <div class="form-group">
              <label for="numero_documento">Identificación</label>
              <input type="text" class="form-control" id="numero_documento" placeholder="Identificacion" required>
            </div>
            <div class="form-group">
              <label for="nombre">Nombre</label>
              <input type="text" class="form-control" id="nombre" placeholder="Nombre" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label for="usuario">Usuario</label>
              <input type="text" class="form-control" id="usuario" placeholder="usuario" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label for="contrasena">Contraseña</label>
              <input type="password" class="form-control" id="contrasena" placeholder="contrasena" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label for="email">Correo</label>
              <input type="text" class="form-control" id="email" placeholder="email" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label for="telefono">Teléfono</label>
              <input type="text" class="form-control" id="telefono" placeholder="telefono" required>
            </div>
          </div>
          <label>Ciudad</label>
          <select type="text" name="ciudad" id="ciudad" class="form-control" required>
            <option selected>Ciudad</option>
            <?php
            $municipio = $misMunicipios->viewMunicipios();
            foreach ($municipio as $value) { ?>
              <option value="<?php echo $value['municipios'] ?>"><?php echo $value['municipios'] ?></option>
            <?php
            }
            ?>
          </select>
          <br />
          <div class="form-group">
            <label for="direccion_sede">Direccion sede</label>
            <input type="text" class="form-control" id="direccion_sede" placeholder="dirección sede" required>
          </div>
          <div class="form-group">
            <label for="cargo">Cargo</label>
            <input type="text" class="form-control" id="cargo" placeholder="cargo" required>
          </div>
          <div class="form-group">
            <label for="area">Area</label>
            <input type="text" class="form-control" id="area" placeholder="area" required>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label for="rol_id">Rol</label>
              <select id="rol_id" class="form-control" required>
                <option value="1">Administrador</option>
                <option value="2">Operador</option>
                <option value="3">Usuario</option>
                <option value="4">Externo</option>
              </select>
            </div>
          </div>

        </form>
        <div class="modal-footer">
          <div>
            <button type="button" class="btn btn-primary" id="agregarNuevoClases">
              Agregar
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal ACTUALIZAR información de un usuario -->
<div class="modal fade" id="modalEdicionClases" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <div class="modal-title">
          <h4>Actualizar elemento
            <small></small>
          </h4>
        </div>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-row">
            <div class="form-group">
              <label for="tipo_documentou">Tipo documento</label>
              <input type="text" class="form-control" id="tipo_documentou" placeholder="tipo documento" required>
            </div>
            <div class="form-group">
              <label for="numero_documentou">Identificación</label>
              <input type="text" class="form-control" id="numero_documentou" placeholder="Identificacion" required>
              <input type="hidden" class="form-control" id="codigou" placeholder="Identificacion" required>
            </div>
            <div class="form-group">
              <label for="nombreu">Nombre</label>
              <input type="text" class="form-control" id="nombreu" placeholder="Nombre" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label for="usuariou">Usuario</label>
              <input type="text" class="form-control" id="usuariou" placeholder="usuario" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label for="contrasenau">Contraseña</label>
              <input type="password" class="form-control" id="contrasenau" placeholder="contrasena" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label for="emailu">Correo</label>
              <input type="text" class="form-control" id="emailu" placeholder="email" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label for="telefonou">Teléfono</label>
              <input type="text" class="form-control" id="telefonou" placeholder="telefono" required>
            </div>
          </div>
          <label>Ciudad</label>
          <select type="text" name="ciudadu" id="ciudadu" class="form-control" required>
            <option selected>Ciudad</option>
            <?php
            $municipio = $misMunicipios->viewMunicipios();
            foreach ($municipio as $value) { ?>
              <option value="<?php echo $value['municipios'] ?>"><?php echo $value['municipios'] ?></option>
            <?php
            }
            ?>
          </select>
          <br />
          <div class="form-group">
            <label for="direccion_sedeu">Direccion sede</label>
            <input type="text" class="form-control" id="direccion_sedeu" placeholder="dirección sede" required>
          </div>
          <div class="form-group">
            <label for="cargou">Cargo</label>
            <input type="text" class="form-control" id="cargou" placeholder="cargo" required>
          </div>
          <div class="form-group">
            <label for="areau">Area</label>
            <input type="text" class="form-control" id="areau" placeholder="area" required>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label for="rol_idu">Rol</label>
              <select id="rol_idu" class="form-control" required>
                <option value="1">Administrado</option>
                <option value="2">Operador</option>
                <option value="3">Usuario</option>
                <option value="4">Externo</option>
              </select>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <div class="col-sm-6 text-left">
          <button type="button" class="btn btn-danger" data-dismiss="modal" id="eliminarDatosClases">
            Eliminar
          </button>
        </div>
        <div class="col-sm-6 text-right">
          <button type="button" class="btn btn-warning" data-dismiss="modal" id="actualizaDatosClases">
            Actualizar
          </button>
        </div>
      </div>
    </div>
  </div>
</div>