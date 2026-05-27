function agregardatosCantidadMecanismoCliente() {
  let cod_reporte = $("#cod_reportemecanismou").val();
  let identificacion_cliente = $("#identificacion_cliente").val();
  let info_mecanismo = $("#id").val().split(" - ");
  let id = info_mecanismo[0];
  let nombre_mecanismo = info_mecanismo[1] + " - " + info_mecanismo[2];
  let ubicacion = $("#ubicacion").val();
  let observacion = $("#observacion").val();

  let cadena =
    "cod_reporte=" +
    cod_reporte +
    "&identificacion_cliente=" +
    identificacion_cliente +
    "&id=" +
    id +
    "&nombre_mecanismo=" +
    nombre_mecanismo +
    "&ubicacion=" +
    ubicacion +
    "&observacion=" +
    observacion;

  let mensaje_si = "Una nueva cantidad de riegos registrada correctamente.";
  let mensaje_no = "Error, NO se registró el mecanismo.";

  $.ajax({
    type: "POST",
    url: "../modelo/acciones-CantidadMecanismoCliente.php?accion=registrar",
    data: cadena,
    success: function (r) {
      console.log(r);
      if (r == 0) {
        alertify.error(mensaje_no);
      } else {
        alertify.success(mensaje_si);
        cargarTablaCantidadMecanismoCliente();
      }
    },
  });
}
// Función para cargar información  a modificar
function agregarformCantidadMecanismoCliente(datos) {
  let d = datos.split("||");
  $("#codigo_mecu").val(d[0]);
  $("#identificacion_clienteu").val(d[2]);
  $("#idu").val(d[3] + " - " + d[1]);
  $("#ubicacionu").val(d[4]);
  $("#observacionu").val(d[5]);
  $("#estadoalertau").val(d[6]);
  $("#estadobateriau").val(d[7]);
}
// Función para modificar
function modificarCantidadMecanismoCliente() {
  let codigo = $("#codigo_mecu").val();
  let identificacion_cliente = $("#identificacion_clienteu").val();
  let info = $("#idu").val().split(" - ");
  let id = info[0];
  let nombre_mecanismo = info[1] + " - " + info[2];
  let ubicacion = $("#ubicacionu").val();
  let observacion = $("#observacionu").val();
  let estadoalerta = $("#estadoalertau").val();
  let estadobateria = $("#estadobateriau").val();

  let cadena =
    "codigo=" +
    codigo +
    // "&cod_mecanismo=" +
    // cod_mecanismo +
    "&identificacion_cliente=" +
    identificacion_cliente +
    "&id=" +
    id +
    "&nombre_mecanismo=" +
    nombre_mecanismo +
    "&ubicacion=" +
    ubicacion +
    "&observacion=" +
    observacion +
    "&estadoalerta=" +
    estadoalerta +
    "&estadobateria=" +
    estadobateria;

  let mensaje_si = "Una candidad se ha modificado con exito";
  let mensaje_no = "Error de registro";

  $.ajax({
    type: "POST",
    url: "../modelo/acciones-CantidadMecanismoCliente.php?accion=modificar",
    data: cadena,
    success: function (r) {
      console.log(r);
      if (r == 0) {
        alertify.error(mensaje_no);
      } else {
        alertify.success(mensaje_si);
        cargarTablaCantidadMecanismoCliente();
      }
    },
  });
}
// Función para cargar información de la vista
function cargarTablaCantidadMecanismoCliente() {
  location.reload();
  // $.ajax({
  //   type: "POST",
  //   url: "../administrador/cantidad-mecanismo-cliente.php",
  //   async: true,
  //   success: function (respuesta) {
  //     $("#tablaCantidadMecanismoCliente").html("");
  //     $("#tablaCantidadMecanismoCliente").html(respuesta);
  //     // location.reload();
  //   },
  //   error: function (request, error) {
  //     alertify.error(error);
  //   },
  // });
}
// Función apra confirmar la eliminación de un registro
function preguntarSiNoCantidadMecanismoCliente() {
  let codigo = $("#codigo_mecu").val();

  alertify.confirm(
    "Eliminar periodo",
    " ¿Está seguro de eliminar un inventario de un nivel " + codigo + "?",
    function () {
      eliminarDatosCantidadMecanismoCliente(codigo);
    },
    function () {
      alertify.error(
        "Error, no se ha eliminado un inventario de un nivel " + codigo
      );
    }
  );
}

function eliminarDatosCantidadMecanismoCliente(codigo) {
  cadena = "codigo=" + codigo;
  mensaje_si = "La cantidad de mecanismo se ha eliminado con exito";
  mensaje_no = "Error de eliminacion";

  $.ajax({
    type: "POST",
    url: "../modelo/acciones-CantidadMecanismoCliente.php?accion=eliminar",
    data: cadena,
    success: function (r) {
      console.log(r);
      if (r == 0) {
        alertify.error(mensaje_no);
      } else {
        alertify.success(mensaje_si);
        cargarTablaCantidadMecanismoCliente();
      }
    },
  });
}
function mostrarOcultar(event) {
  event.stopPropagation();
  var navbarCollapse = document.getElementById("navbarSupportedContent");
  if (navbarCollapse.style.display === "none") {
      navbarCollapse.style.display = "block"; // Si está oculto, mostrarlo
  } else {
      navbarCollapse.style.display = "none"; // Si está visible, ocultarlo
  }
}
