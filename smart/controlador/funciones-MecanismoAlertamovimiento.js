// function agregarFormNuevo() {
//     $('#numero_documento').val();
//     $('#nombre').val();
//     $('#Apoyos').val();
//     $('#contrasena').val();
// }

function agregardatosReporteMecanismo() {
  id = $("#id").val();
  fecha = $("#fecha").val();
  hora = $("#hora").val();
  identificacion_cliente = $("#identificacion_cliente").val();

  cadena =
    "id=" +
    id +
    "&fecha=" +
    fecha +
    "&hora=" +
    hora +
    "&identificacion_cliente=" +
    identificacion_cliente;

  accion = "registrar";
  mensaje_si = "El nivel de riegos registrada correctamente.";
  mensaje_no = "Error, NO se registró el mecanismo.";

  $.ajax({
    type: "POST",
    url: "../modelo/acciones-MecanismoAlertamovimiento.php?accion=registrar",
    data: cadena,
    success: function (r) {
      console.log(r);
      if (r == 0) {
        alertify.error(mensaje_no);
      } else {
        alertify.success(mensaje_si);
        cargarTablaReporteMecanismo();
        //$('#tabla').load('../administrador/mecanismo.php');
        // location.reload();
      }
    },
  });
}
// Función para cargar información  a modificar
function agregarformReporteMecanismo(datos) {
  d = datos.split("||");
  $("#codigou").val(d[0]);
  $("#idu").val(d[1]);
  $("#fechau").val(d[2]);
  $("#horau").val(d[3]);
  $("#identificacion_clienteu").val(d[4]);
}
// Función para modificar
function modificarReporteMecanismo() {
  codigo = $("#codigou").val();
  id = $("#idu").val();
  fecha = $("#fechau").val();
  hora = $("#horau").val();
  identificacion_cliente = $("#identificacion_clienteu").val();

  cadena =
    "codigo=" +
    codigo +
    "&id=" +
    id +
    "&fecha=" +
    fecha +
    "&hora=" +
    hora +
    "&identificacion_cliente=" +
    identificacion_cliente;

  accion = "modificar";
  mensaje_si = "Un nivel se ha modificado con exito";
  mensaje_no = "Error de registro";

  $.ajax({
    type: "POST",
    url: "../modelo/acciones-MecanismoAlertamovimiento.php?accion=modificar",
    data: cadena,
    success: function (r) {
      console.log(r);
      if (r == 0) {
        alertify.error(mensaje_no);
      } else {
        alertify.success(mensaje_si);
        cargarTablaReporteMecanismo();
        // $('#tabla').load('../administrador/Mecanismo.php');
        //location.reload();
      }
    },
  });
}
// Función para cargar información de la vista
function cargarTablaReporteMecanismo() {
  $.ajax({
    type: "POST",
    url: "../administrador/mecanismo-alertamovimiento.php",
    async: true,
    success: function (respuesta) {
      // console.log(respuesta);
      $("#tablaReporteMecanismo").html("");
      $("#tablaReporteMecanismo").html(respuesta);
    },
    error: function (request, error) {
      alertify.success(error);
    },
  });
}
// Función apra confirmar la eliminación de un registro
function preguntarSiNoReporteMecanismo() {
  codigo = $("#codigou").val();

  alertify.confirm(
    "Eliminar periodo",
    " ¿Está seguro de eliminar un inventario de un nivel " + codigo + "?",
    function () {
      eliminarDatosReporteMecanismo(codigo);
    },
    function () {
      alertify.error(
        "Error, no se ha eliminado un inventario de un nivel " + codigo
      );
    }
  );
}

function eliminarDatosReporteMecanismo(codigo) {
  cadena = "codigo=" + codigo;

  mensaje_si = "Los datos se han borrado correctamente.";
  mensaje_no = "Error.. NO se eliminólos datos.";
  $.ajax({
    type: "POST",
    url: "../modelo/acciones-MecanismoAlertamovimiento.php?accion=eliminar",
    data: cadena,
    success: function (r) {
      console.log(r);
      if (r == 0) {
        alertify.error(mensaje_no);
      } else {
        alertify.success(mensaje_si);
        cargarTablaReporteMecanismo();
        //  $('#tabla').load('../administrador/inventario-mecanismo.php');
        // location.reload();
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
