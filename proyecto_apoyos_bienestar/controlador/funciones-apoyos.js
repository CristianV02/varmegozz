// function agregarFormNuevo() {
//     $('#numero_documento').val();
//     $('#nombre').val();
//     $('#Apoyos').val();
//     $('#contrasena').val();
// }

function agregardatosApoyos() {
    tipo_documento = $('#tipo_documento').val();
    numero_documento = $('#numero_documento').val();
    nombres_apellidos = $('#nombres_apellidos').val();
    ficha = $('#ficha').val();
    programa_formacion = $('#programa_formacion').val();
    inicio_ficha = $('#inicio_ficha').val();
    fin_ficha = $('#fin_ficha').val();
    nivel_formacion = $('#nivel_formacion').val();
    estado_aprendiz = $('#estado_aprendiz').val();
    apoyo_socioeconomico = $('#apoyo_socioeconomico').val();
    estado_apoyo = $('#estado_apoyo').val();
    inicio_apoyo = $('#inicio_apoyo').val();
    fin_apoyo = $('#fin_apoyo').val();
    numero_resolucion_apoyo = $('#numero_resolucion_apoyo').val();
    nombre_novedad_suspension = $('#nombre_novedad_suspension').val();
    motivo_suspension = $('#motivo_suspension').val();
    fecha_novedad_suspension = $('#fecha_novedad_suspension').val();
    nombre_registro_suspension = $('#nombre_registro_suspension').val();
    resolucion_novedad_suspension = $('#resolucion_novedad_suspension').val();
    nombre_novedad_reactivacion = $('#nombre_novedad_reactivacion').val();
    motivo_reactivacion = $('#motivo_reactivacion').val();
    fecha_novedad_reactivacion = $('#fecha_novedad_reactivacion').val();
    nombre_registro_reactivacion = $('#nombre_registro_reactivacion').val();
    resolucion_novedad_reactivacion = $('#resolucion_novedad_reactivacion').val();
    nombre_novedad_cancelacion = $('#nombre_novedad_cancelacion').val();
    motivo_cancelacion = $('#motivo_cancelacion').val();
    fecha_novedad_cancelacion = $('#fecha_novedad_cancelacion').val();
    nombre_registro_cancelacion = $('#nombre_registro_cancelacion').val();
    resolucion_novedad_cancelacion = $('#resolucion_novedad_cancelacion').val();

    cadena = "tipo_documento=" + tipo_documento +
                "&numero_documento=" + numero_documento +
                "&nombres_apellidos=" + nombres_apellidos +
                "&ficha=" + ficha +
                "&programa_formacion=" + programa_formacion +
                "&inicio_ficha=" + inicio_ficha +
                "&fin_ficha=" + fin_ficha +
                "&nivel_formacion=" + nivel_formacion +
                "&estado_aprendiz=" + estado_aprendiz +
                "&apoyo_socioeconomico=" + apoyo_socioeconomico +
                "&estado_apoyo=" + estado_apoyo +
                "&inicio_apoyo=" + inicio_apoyo +
                "&fin_apoyo=" + fin_apoyo +
                "&numero_resolucion_apoyo=" + numero_resolucion_apoyo +
                "&nombre_novedad_suspension=" + nombre_novedad_suspension +
                "&motivo_suspension=" + motivo_suspension +
                "&fecha_novedad_suspension=" + fecha_novedad_suspension +
                "&nombre_registro_suspension=" + nombre_registro_suspension +
                "&resolucion_novedad_suspension=" + resolucion_novedad_suspension +
                "&nombre_novedad_reactivacion=" + nombre_novedad_reactivacion +
                "&motivo_reactivacion=" + motivo_reactivacion +
                "&fecha_novedad_reactivacion=" + fecha_novedad_reactivacion +
                "&nombre_registro_reactivacion=" + nombre_registro_reactivacion +
                "&resolucion_novedad_reactivacion=" + resolucion_novedad_reactivacion +
                "&nombre_novedad_cancelacion=" + nombre_novedad_cancelacion +
                "&motivo_cancelacion=" + motivo_cancelacion +
                "&fecha_novedad_cancelacion=" + fecha_novedad_cancelacion +
                "&nombre_registro_cancelacion=" + nombre_registro_cancelacion +
                "&resolucion_novedad_cancelacion=" + resolucion_novedad_cancelacion;

    accion = "registrar";
    mensaje_si = "El Apoyo registrado correctamente.";
    mensaje_no = "Error, NO se registró el Apoyo.";
   
    $.ajax({
        type: "POST",
        url: "../modelo/accionesApoyos.php?accion=registrar",
        data: cadena,
        success: function(r) {
            console.log(r);
            if (r == 0) {
                alertify.error(mensaje_no);
            } else {
                alertify.success(mensaje_si);
                cargarTablaApoyos();
                //$('#tabla').load('../administrador/Apoyoss.php');
                // location.reload();
      
           
            }
        }
    });
}
// Función para cargar información  a modificar
function agregarformApoyos(datos) {
    d = datos.split('||');
    $('#codigou').val(d[0]);
    $('#tipo_documentou').val(d[1]);
    $('#numero_documentou').val(d[2]);
    $('#nombres_apellidosu').val(d[3]);
    $('#fichau').val(d[4]);
    $('#programa_formacionu').val(d[5]);
    $('#inicio_fichau').val(d[6]);
    $('#fin_fichau').val(d[7]);
    $('#nivel_formacionu').val(d[8]);
    $('#estado_aprendizu').val(d[9]);
    $('#apoyo_socioeconomicou').val(d[10]);
    $('#estado_apoyou').val(d[11]);
    $('#inicio_apoyou').val(d[12]);
    $('#fin_apoyou').val(d[13]);
    $('#numero_resolucion_apoyou').val(d[14]);
    $('#nombre_novedad_suspensionu').val(d[15]);
    $('#motivo_suspensionu').val(d[16]);
    $('#fecha_novedad_suspensionu').val(d[17]);
    $('#nombre_registro_suspensionu').val(d[18]);
    $('#resolucion_novedad_suspensionu').val(d[19]);
    $('#nombre_novedad_reactivacionu').val(d[20]);
    $('#motivo_reactivacionu').val(d[21]);
    $('#fecha_novedad_reactivacionu').val(d[22]);
    $('#nombre_registro_reactivacionu').val(d[23]);
    $('#resolucion_novedad_reactivacionu').val(d[24]);
    $('#nombre_novedad_cancelacionu').val(d[25]);
    $('#motivo_cancelacionu').val(d[26]);
    $('#fecha_novedad_cancelacionu').val(d[27]);
    $('#nombre_registro_cancelacionu').val(d[28]);
    $('#resolucion_novedad_cancelacionu').val(d[29]);
}
// Función para modificar 
function modificarApoyos() {
    codigo = $('#codigou').val();
    tipo_documento = $('#tipo_documentou').val();
    numero_documento = $('#numero_documentou').val();
    nombres_apellidos = $('#nombres_apellidosu').val();
    ficha = $('#fichau').val();
    programa_formacion = $('#programa_formacionu').val();
    inicio_ficha = $('#inicio_fichau').val();
    fin_ficha = $('#fin_fichau').val();
    nivel_formacion = $('#nivel_formacionu').val();
    estado_aprendiz = $('#estado_aprendizu').val();
    apoyo_socioeconomico = $('#apoyo_socioeconomicou').val();
    estado_apoyo = $('#estado_apoyou').val();
    inicio_apoyo = $('#inicio_apoyou').val();
    fin_apoyo = $('#fin_apoyou').val();
    numero_resolucion_apoyo = $('#numero_resolucion_apoyou').val();
    nombre_novedad_suspension = $('#nombre_novedad_suspensionu').val();
    motivo_suspension = $('#motivo_suspensionu').val();
    fecha_novedad_suspension = $('#fecha_novedad_suspensionu').val();
    nombre_registro_suspension = $('#nombre_registro_suspensionu').val();
    resolucion_novedad_suspension = $('#resolucion_novedad_suspensionu').val();
    nombre_novedad_reactivacion = $('#nombre_novedad_reactivacionu').val();
    motivo_reactivacion = $('#motivo_reactivacionu').val();
    fecha_novedad_reactivacion = $('#fecha_novedad_reactivacionu').val();
    nombre_registro_reactivacion = $('#nombre_registro_reactivacionu').val();
    resolucion_novedad_reactivacion = $('#resolucion_novedad_reactivacionu').val();
    nombre_novedad_cancelacion = $('#nombre_novedad_cancelacionu').val();
    motivo_cancelacion = $('#motivo_cancelacionu').val();
    fecha_novedad_cancelacion = $('#fecha_novedad_cancelacionu').val();
    nombre_registro_cancelacion = $('#nombre_registro_cancelacionu').val();
    resolucion_novedad_cancelacion = $('#resolucion_novedad_cancelacionu').val();
    

    cadena = "codigo=" + codigo +
                "&tipo_documento=" + tipo_documento +
                "&numero_documento=" + numero_documento +
                "&nombres_apellidos=" + nombres_apellidos +
                "&ficha=" + ficha +
                "&programa_formacion=" + programa_formacion +
                "&inicio_ficha=" + inicio_ficha +
                "&fin_ficha=" + fin_ficha +
                "&nivel_formacion=" + nivel_formacion +
                "&estado_aprendiz=" + estado_aprendiz +
                "&apoyo_socioeconomico=" + apoyo_socioeconomico +
                "&estado_apoyo=" + estado_apoyo +
                "&inicio_apoyo=" + inicio_apoyo +
                "&fin_apoyo=" + fin_apoyo +
                "&numero_resolucion_apoyo=" + numero_resolucion_apoyo +
                "&nombre_novedad_suspension=" + nombre_novedad_suspension +
                "&motivo_suspension=" + motivo_suspension +
                "&fecha_novedad_suspension=" + fecha_novedad_suspension +
                "&nombre_registro_suspension=" + nombre_registro_suspension +
                "&resolucion_novedad_suspension=" + resolucion_novedad_suspension +
                "&nombre_novedad_reactivacion=" + nombre_novedad_reactivacion +
                "&motivo_reactivacion=" + motivo_reactivacion +
                "&fecha_novedad_reactivacion=" + fecha_novedad_reactivacion +
                "&nombre_registro_reactivacion=" + nombre_registro_reactivacion +
                "&resolucion_novedad_reactivacion=" + resolucion_novedad_reactivacion +
                "&nombre_novedad_cancelacion=" + nombre_novedad_cancelacion +
                "&motivo_cancelacion=" + motivo_cancelacion +
                "&fecha_novedad_cancelacion=" + fecha_novedad_cancelacion +
                "&nombre_registro_cancelacion=" + nombre_registro_cancelacion +
                "&resolucion_novedad_cancelacion=" + resolucion_novedad_cancelacion;

        accion = "modificar";
        mensaje_si = "El Apoyo se ha modificado con exito";
        mensaje_no = "Error de registro";
    
        $.ajax({
            type: "POST",
            url: "../modelo/accionesApoyos.php?accion=modificar",
            data: cadena,
            success: function(r) {
                console.log(r);
                if (r == 0) {
                    alertify.error(mensaje_no);
                } else {
                    alertify.success(mensaje_si);
                    cargarTablaApoyos();
                   // $('#tabla').load('../administrador/Apoyos.php');
                    //location.reload();
                }
            }
        });
    }
    // Función para cargar información de la vista
function cargarTablaApoyos() {
    $.ajax({
        type: "POST",
        url: "../administrador/apoyos.php",
        async: true,
        success: function(respuesta) {
           // console.log(respuesta);
            $("#tablaApoyos").html("");
            $("#tablaApoyos").html(respuesta);
        },
        error: function(request, error) {
            alertify.success(error);
        }
    });
}
// Función apra confirmar la eliminación de un registro
function preguntarSiNoApoyos() {

    codigo = $('#codigou').val();

    alertify.confirm('Eliminar periodo', ' ¿Está seguro de eliminar el Apoyos ' + codigo + '?',
        function () {
            eliminarDatos(codigo)
        },
        function () {
            alertify.error('Error, no se ha eliminado el Apoyos ' + codigo)
        });

}

function eliminarDatos(codigo) {
    cadena = "codigo=" + codigo;

        $.ajax({
            type: "POST",
            url: "../modelo/accionesApoyos.php?accion=eliminar",
            data: cadena,
            success: function(r) {
                console.log(r);
                if (r == 0) {
                    alertify.error(mensaje_no);
                } else {
                    alertify.success(mensaje_si);
                    cargarTablaApoyos();
                  //  $('#tabla').load('../administrador/Apoyoss.php');
                    // location.reload();
                  
                }
            }
        });
    }