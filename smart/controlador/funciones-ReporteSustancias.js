// function agregarFormNuevo() {
//     $('#numero_documento').val();
//     $('#nombre').val();
//     $('#Apoyos').val();
//     $('#contrasena').val();
// }

function agregardatosReporteSustancias() {
  usuario = $("#usuario").val();
  sustancias = $("#sustancias").val();
  cantidad = $("#cantidad").val();
  cod_reporte = $("#cod_reporte").val();

  cadena =
    "usuario=" +
    usuario +
    "&cod_sustancias=" +
    sustancias +
    "&cantidad=" +
    cantidad +
    "&cod_reporte=" +
    cod_reporte;

    console.log(cadena);

  accion = "registrar";
  mensaje_si = "El nivel de riegos registrada correctamente.";
  mensaje_no = "Error, NO se registró el mecanismo.";

  $.ajax({
    type: "POST",
    url: "../modelo/acciones-ReporteSustancias.php?accion=registrar",
    data: cadena,
    success: function (r) {
      console.log(r);
      if (r == 0) {
        alertify.error(mensaje_no);
      } else {
        alertify.success(mensaje_si);
        cargarTablaReporteSustancias();
        //$('#tabla').load('../administrador/mecanismo.php');
        // location.reload();
      }
    },
  });
}
// Función para cargar información  a modificar
function agregarformReporteSustancias(datos) {
  d = datos.split("||");
  $("#codigou").val(d[0]);
  $("#usuariou").val(d[1]);
  $("#sustanciasu").val(d[2]);
  $("#cantidadu").val(d[3]);
  $("#cod_reporteu").val(d[4]);
}
// Función para modificar
function modificarReporteSustancias() {
  codigo = $("#codigou").val();
  usuario = $("#usuariou").val();
  sustancias = $("#sustanciasu").val();
  cantidad = $("#cantidadu").val();
  cod_reporte = $("#cod_reporteu").val();

  cadena =
    "codigo=" +
    codigo +
    "&usuario=" +
    usuario +
    "&sustancias=" +
    sustancias +
    "&cantidad=" +
    cantidad +
    "&cod_reporte=" +
    cod_reporte;

  accion = "modificar";
  mensaje_si = "Un nivel se ha modificado con exito";
  mensaje_no = "Error de registro";

  $.ajax({
    type: "POST",
    url: "../modelo/acciones-ReporteSustancias.php?accion=modificar",
    data: cadena,
    success: function (r) {
      console.log(r);
      if (r == 0) {
        alertify.error(mensaje_no);
      } else {
        alertify.success(mensaje_si);
        cargarTablaReporteSustancias();
        // $('#tabla').load('../administrador/Mecanismo.php');
        //location.reload();
      }
    },
  });
}
// Función para cargar información de la vista
function cargarTablaReporteSustancias() {
  $.ajax({
    type: "POST",
    url: "../administrador/reporte-sustancias.php",
    async: true,
    success: function (respuesta) {
      // console.log(respuesta);
      $("#tablaReporteSustancias").html("");
      $("#tablaReporteSustancias").html(respuesta);
      location.reload();
    },
    error: function (request, error) {
      alertify.success(error);
    },
  });
}
// Función apra confirmar la eliminación de un registro
function preguntarSiNoReporteSustancias() {
  codigo = $("#codigou").val();

  alertify.confirm(
    "Eliminar periodo",
    " ¿Está seguro de eliminar un inventario de un nivel " + codigo + "?",
    function () {
      eliminarDatosReporteSustancias(codigo);
    },
    function () {
      alertify.error(
        "Error, no se ha eliminado un inventario de un nivel " + codigo
      );
    }
  );
}

function eliminarDatosReporteSustancias(codigo) {
  cadena = "codigo=" + codigo;
  mensaje_si = "Los datos se han borrado correctamente.";
  mensaje_no = "Error.. NO se eliminólos datos.";
  console.log("entra por aqui, codigo", codigo);
  $.ajax({
    type: "POST",
    url: "../modelo/acciones-ReporteSustancias.php?accion=eliminar",
    data: cadena,
    success: function (r) {
      console.log(r);
      if (r == 0) {
        alertify.error(mensaje_no);
      } else {
        alertify.success(mensaje_si);
        cargarTablaReporteSustancias();
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
