// Función para cargar información a mostrar de las novedades
function agregarformNovedades(datos) {
  d = datos.split("||");
  $('#id_solicitudu').val(d[0]);
    $('#fecha_de_solicitudu').val(d[1]);
    $('#estadou').val(d[2]);
    $('#nombresu').val(d[3]);
    $('#tipo_usuariou').val(d[4]);
    $('#cargou').val(d[5]);
    $('#id_usuariou').val(d[6]);
    $('#id_programau').val(d[7]);
    $('#observacionesu').val(d[8]);
    $('#referenciau').val(d[9]);
    $('#tipou').val(d[10]);
    $('#estado_de_pagou').val(d[11]);
    $('#fotosu').val(d[12]);
    $('#cod_estudianteu').val(d[13]);
    $('#correo_institucionalu').val(d[14]);
    $('#año_de_gradou').val(d[15]);
    $('#cantidadu').val(d[16]);
    $('#numero_recibou').val(d[17]);
    $('#realizado_poru').val(d[18]);
    $('#fecha_realizadou').val(d[19]);
    $('#recibido_por_admisionesu').val(d[20]);
    $('#fecha_de_admisionesu').val(d[21]);
    $('#entregadou').val(d[22]);
}
// Función para cargar información de la vista
function cargarTablaSolicitud() {
  $.ajax({
    type: "POST",
    url: "../administrador/solicitud.php",
    async: true,
    success: function (respuesta) {
      // console.log(respuesta);
      $("#tablaSolicitud").html("");
      $("#tablaSolicitud").html(respuesta);
    },
    error: function (request, error) {
      alertify.success(error);
    },
  });
}
