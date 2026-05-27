// function agregarFormNuevo() {
//     $('#numero_documento').val();
//     $('#nombre').val();
//     $('#Apoyos').val();
//     $('#contrasena').val();
// }

function agregardatosReporteHallazgo() {
  usuario = $("#usuario").val();
  hallazgo = $("#hallazgo").val();
  cod_reporte = $("#cod_reporte").val();
  observaciones = $("#observaciones").val();
  foto1 = $("#foto1").val();
  foto2 = $("#foto2").val();

  cadena ="usuario=" +usuario +
    "&hallazgo=" +hallazgo +
    "&cod_reporte=" +cod_reporte+
    "&observaciones=" +observaciones +
    "&foto1=" + foto1 +
    "&foto2=" + foto2 ;

  accion = "registrar";
  mensaje_si = "El nivel de riegos registrada correctamente.";
  mensaje_no = "Error, NO se registró el mecanismo.";

  $.ajax({
    type: "POST",
    url: "../modelo/acciones-ReporteHallazgo.php?accion=registrar",
    data: cadena,
    success: function (r) {
      //   console.log(r);
      if (r == 0) {
        alertify.error(mensaje_no);
      } else {
        alertify.success(mensaje_si);
        cargarTablaReporteHallazgo();
        //$('#tabla').load('../administrador/mecanismo.php');
        // location.reload();
      }
    },
  });
}
// Función para cargar información  a modificar
function agregarformReporteHallazgo(datos) {
  d = datos.split("||");
  $("#codigou").val(d[0]);
  $("#usuariou").val(d[1]);
  $("#hallazgou").val(d[2]);
  $("#cod_reporteu").val(d[3]);
  $("#observacionesu").val(d[4]);
  $("#foto1u").val(d[5]);
  $("#foto2u").val(d[6]);
  
}
// Función para modificar
function modificarReporteHallazgo() {
  codigo = $("#codigou").val();
  usuario = $("#usuariou").val();
  hallazgo = $("#hallazgou").val();
  cod_reporte = $("#cod_reporteu").val();
  observaciones = $("#observacionesu").val();
  foto1 = $("#foto1u").val();
  foto2 = $("#foto2u").val();

  cadena ="codigo=" + codigo +
    "&usuario=" + usuario +
    "&hallazgo=" + hallazgo +
    "&cod_reporte=" + cod_reporte+
    "&observaciones=" + observaciones +
    "&foto1=" + foto1 +
    "&foto2=" + foto2;

  accion = "modificar";
  mensaje_si = "Un nivel se ha modificado con exito";
  mensaje_no = "Error de registro";

  $.ajax({
    type: "POST",
    url: "../modelo/acciones-ReporteHallazgo.php?accion=modificar",
    data: cadena,
    success: function (r) {
      console.log(r);
      if (r == 0) {
        alertify.error(mensaje_no);
      } else {
        alertify.success(mensaje_si);
        cargarTablaReporteHallazgo();
        // $('#tabla').load('../administrador/Mecanismo.php');
        //location.reload();
      }
    },
  });
}
// Función para cargar información de la vista
function cargarTablaReporteHallazgo() {
  $.ajax({
    type: "POST",
    url: "../administrador/reporte-hallazgo.php",
    async: true,
    success: function (respuesta) {
      // console.log(respuesta);
      $("#tablaReporteHallazgo").html("");
      $("#tablaReporteHallazgo").html(respuesta);
      location.reload();
    },
    error: function (request, error) {
      alertify.success(error);
    },
  });
}
// Función apra confirmar la eliminación de un registro
function preguntarSiNoReporteHallazgo() {
  codigo = $("#codigou").val();

  alertify.confirm(
    "Eliminar periodo",
    " ¿Está seguro de eliminar un inventario de un nivel " + codigo + "?",
    function () {
      eliminarDatosReporteHallazgo(codigo);
    },
    function () {
      alertify.error(
        "Error, no se ha eliminado un inventario de un nivel " + codigo
      );
    }
  );
}

function eliminarDatosReporteHallazgo(codigo) {
  cadena = "codigo=" + codigo;

  mensaje_si = "Los datos se han borrado correctamente.";
  mensaje_no = "Error.. NO se eliminólos datos.";
  $.ajax({
    type: "POST",
    url: "../modelo/acciones-ReporteHallazgo.php?accion=eliminar",
    data: cadena,
    success: function (r) {
      console.log(r);
      if (r == 0) {
        alertify.error(mensaje_no);
      } else {
        alertify.success(mensaje_si);
        cargarTablaReporteHallazgo();
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
