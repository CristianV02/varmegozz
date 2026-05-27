//Variable Global

// Función para cargar información de la vista
function enviarEmail() {
  $.ajax({
    type: "POST",
    url:
      "../administrador/usuarios.php?leido=" + leido + "&codigo=" + id_usuario,
    async: true,
    success: function (respuesta) {
      $("#tablaUsuarios").html("");
      $("#tablaUsuarios").html(respuesta);
    },
    error: function (error) {
      alertify.error(error);
    },
  });
}

function actualizarDatoMecanismo(id, estado) {
  let cadena = "id=" + id + "&estado=" + estado;
  let mensaje_si = "El dato se ha modificado con exito";
  let mensaje_no = "Error de registro";
  $.ajax({
    type: "POST",
    url: "../modelo/acciones-CantidadMecanismoCliente.php?accion=actualizar",
    data: cadena,
    success: function (r) {
      console.log(r);
      if (r == 0) {
        alertify.error(mensaje_no);
      } else {
        alertify.success(mensaje_si);
      }
    },
  });
}
