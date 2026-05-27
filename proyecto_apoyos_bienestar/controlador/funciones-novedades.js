// Función para cargar información a mostrar de las novedades
function agregarformNovedades(datos) {
  d = datos.split("||");
  $("#apoyo_socioeconomicou").val(d[0]);
  $("#estado_apoyou").val(d[1]);
  $("#inicio_apoyou").val(d[2]);
  $("#fin_apoyou").val(d[3]);
  $("#numero_resolucion_apoyou").val(d[4]);
  $("#codigou").val(d[5]);
  $("#nombre_novedad_suspensionu").val(d[6]);
  $("#motivo_suspensionu").val(d[7]);
  $("#fecha_novedad_suspensionu").val(d[8]);
  $("#nombre_registro_suspensionu").val(d[9]);
  $("#resolucion_novedad_suspensionu").val(d[10]);
  $("#nombre_novedad_reactivacionu").val(d[11]);
  $("#motivo_reactivacionu").val(d[12]);
  $("#fecha_novedad_reactivacionu").val(d[13]);
  $("#nombre_registro_reactivacionu").val(d[14]);
  $("#resolucion_novedad_reactivacionu").val(d[15]);
  $("#nombre_novedad_cancelacionu").val(d[16]);
  $("#motivo_cancelacionu").val(d[17]);
  $("#fecha_novedad_cancelacionu").val(d[18]);
  $("#nombre_registro_cancelacionu").val(d[19]);
  $("#resolucion_novedad_cancelacionu").val(d[20]);
  
}
// Función para cargar información de la vista
function cargarTablaApoyos() {
  $.ajax({
    type: "POST",
    url: "../administrador/apoyos.php",
    async: true,
    success: function (respuesta) {
      // console.log(respuesta);
      $("#tablaApoyos").html("");
      $("#tablaApoyos").html(respuesta);
    },
    error: function (request, error) {
      alertify.success(error);
    },
  });
}
