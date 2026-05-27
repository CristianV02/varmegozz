// function agregarFormNuevo() {
//     $('#numero_documento').val();
//     $('#nombre').val();
//     $('#Apoyos').val();
//     $('#contrasena').val();
// }

function agregardatosReporteMecanismo() {
  usuario = $("#usuario").val();
  mecanismo = $("#mecanismo").val();
  id_mecanismo = $("#id_mecanismo").val();
  estado = $("#estado").val();
  cod_reporte = $("#cod_reporte").val();

  cadena =
    "usuario=" +
    usuario +
    "&mecanismo=" +
    mecanismo +
    "&id_mecanismo=" +
    id_mecanismo +
    "&estado=" +
    estado +
    "&cod_reporte=" +
    cod_reporte;

  accion = "registrar";
  mensaje_si = "El nivel de riegos registrada correctamente.";
  mensaje_no = "Error, NO se registró el mecanismo.";

  $.ajax({
    type: "POST",
    url: "../modelo/acciones-ReporteMecanismo.php?accion=registrar",
    data: cadena,
    success: function (r) {
      console.log(r);
      if (r == 0) {
        alertify.error(mensaje_no);
      } else {
        alertify.success(mensaje_si);
        cargarTablaReporteMecanismo();
      }
    },
  });
}
// Función para cargar información  a modificar
function agregarformReporteMecanismo(datos) {
  d = datos.split("||");
  $("#codigou").val(d[0]);
  $("#cod_reporteu").val(d[1]);
  $("#nombre_mecanismou").val(d[2]);
  $("#identificacion_clienteu").val(d[3]);
  $("#idu").val(d[4]);
  $("#ubicacionu").val(d[5]);
  $("#observacionu").val(d[6]);
  $("#estadoalertau").val(d[7]);
  $("#estadobateriau").val(d[8]);
}
// Función para modificar
function modificarReporteMecanismo() {
  let codigo = $("#codigou").val();
  let cod_reporte = $("#cod_reporteu").val();;
  let nombre_mecanismo = $("#nombre_mecanismou").val();
  let identificacion_cliente = $("#identificacion_clienteu").val();
  let id = $("#idu").val();
  let ubicacion = $("#ubicacionu").val();
  let observacion = $("#observacionu").val();
  let estadoalerta = $("#estadoalertau").val();
  let estadobateria = $("#estadobateriau").val();
  cadena =
    "codigo=" + codigo +
    "&cod_reporte=" + cod_reporte +
    "&nombre_mecanismo=" + nombre_mecanismo +
    "&identificacion_cliente=" + identificacion_cliente +
    "&id=" + id +
    "&ubicacion=" + ubicacion +
    "&observacion=" + observacion +
    "&estadoalerta=" + estadoalerta +
    "&estadobateria=" + estadobateria;

  let mensaje_si = "Un nivel se ha modificado con exito";
  let mensaje_no = "Error de registro";

  $.ajax({
    type: "POST",
    url: "../modelo/acciones-ReporteMecanismo.php?accion=modificar",
    data: cadena,
    success: function (r) {
      console.log(r);
      if (r == 0) {
        alertify.error(mensaje_no);
      } else {
        alertify.success(mensaje_si);
        cargarTablaReporteMecanismo();
      }
    },
  });
}
// Función para cargar información de la vista
function cargarTablaReporteMecanismo() {
  $.ajax({
    type: "POST",
    url: "../administrador/reporte-mecanismo.php",
    async: true,
    success: function (respuesta) {
      // console.log(respuesta);
      $("#tablaReporteMecanismo").html("");
      $("#tablaReporteMecanismo").html(respuesta);
      location.reload();

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
  console.log(codigo);
  cadena = "codigo=" + codigo;
  mensaje_si = "Los datos se han borrado correctamente.";
  mensaje_no = "Error.. NO se eliminólos datos.";
  $.ajax({
    type: "POST",
    url: "../modelo/acciones-ReporteMecanismo.php?accion=eliminar",
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
