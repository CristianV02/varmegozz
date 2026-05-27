function agregardatosCrearReportes() {
  console.log("Hola mundo");
  let mensaje_si = "El reporte se ha guardado correctamente.";
  alertify.success(mensaje_si);
  cargarTablaReportes();

}
// Función para cargar información de la vista
function cargarTablaReportes() {
  $.ajax({
    type: "POST",
    url: "../administrador/reporte.php",
    async: true,
    success: function (respuesta) {
        location.href="../administrador/reporte.php"
    },
    error: function (request, error) {
      alertify.success(error);
    }
  });
}
// Función sustancias
function agregardatosSustancias() {
  let cod_reporte = $("#cod_reportesustanciasu").val();
  let usuario = $("#usuarioSustancias").val();
  let sustancias = $("#sustancias").val();
  let cantidad = $("#cantidad").val();

  let cadena =
    "cod_reporte=" +
    cod_reporte +
    "&usuario=" +
    usuario +
    "&sustancias=" +
    sustancias +
    "&cantidad=" +
    cantidad;

  let mensaje_si = "Los datos  se han registrado correctamente.";
  let mensaje_no = "Error, NO se registró los datos.";

  $.ajax({
    type: "POST",
    url: "../modelo/acciones-crearReporte.php?accion=sustancias",
    data: cadena,
    success: function (r) {
      // console.log(r);
      if (r == 0) {
        alertify.error(mensaje_no);
      } else {
        alertify.success(mensaje_si);
        cargarTablaCrearReporte();
      }
    },
  });
}

function agregarformReporte(reporte) {
  d = reporte;

  $("#codigo_reporteu").val(d);
  $("#cod_reportetratamientou").val(d);
  $("#cod_reportemecanismou").val(d);
  $("#cod_reportesustanciasu").val(d);
  $("#cod_reportehallazgou").val(d);
}

function agregarformReportes(datos) {
  //     d = datos.split('||');
  //     $('#codigou').val(d[0]);
  //     $('#tipo_docu').val(d[1]);
  //     $('#usuariou').val(d[2]);
  //     $('#nombre_apellidou').val(d[3]);
  //     $('#fecha_de_iniciou').val(d[4]);
  //     $('#hora_de_iniciou').val(d[5]);
  //     $('#fecha_finu').val(d[6]);
  //     $('#hora_finu').val(d[7]);
  //     $('#cantidad_mecanismou').val(d[8]);
  //     $('#cantidad_de_sustanciau').val(d[9]);
  //     $('#cantidad_de_hallazgou').val(d[10]);
  //     $('#nivel_de_infestacionu').val(d[11]);
  //     $('#ver_pdfu').val(d[12]);
}
// Funcion usuario
function agregardatosUsuario() {
  let codigo = $("#codigo_reporteu").val();
  let tipo_doc = $("#tipo_doc").val();
  let info_usuario = $("#nombre_usuario").val().split(" - ");
  let usuario = info_usuario[0];
  let nombre_apellido = info_usuario[1];
  let info_empresa = $("#empresa_usu").val().split(" - ");
  let nit_empresa = info_empresa[0];
  let nombre_empresa = info_empresa[1];
  let fecha_de_inicio = $("#fecha_de_inicio").val();
  let hora_de_inicio = $("#hora_de_inicio").val();
  let fecha_fin = $("#fecha_fin").val();
  let hora_fin = $("#hora_fin").val();

  let cadena =
    "codigo=" +
    codigo +
    "&tipo_doc=" +
    tipo_doc +
    "&usuario=" +
    usuario +
    "&nombre_apellido=" +
    nombre_apellido +
    "&nit_empresa=" +
    nit_empresa +
    "&nombre_empresa=" +
    nombre_empresa +
    "&fecha_de_inicio=" +
    fecha_de_inicio +
    "&hora_de_inicio=" +
    hora_de_inicio +
    "&fecha_fin=" +
    fecha_fin +
    "&hora_fin=" +
    hora_fin;

  accion = "usuario";
  let mensaje_si = "Un reporte fue registrado correctamente.";
  let mensaje_no = "Error, NO se registró un reporte.";

  $.ajax({
    type: "POST",
    url: "../modelo/acciones-crearReporte.php?accion=usuario",
    data: cadena,
    success: function (r) {
      if (r == 0) {
        alertify.error(mensaje_no);
      } else {
        alertify.success(mensaje_si);
        cargarTablaCrearReporte();
      }
    },
  });
}
// Funcion mecanismo
function agregardatosMecanismo() {
  let cod_reporte = $("#cod_reportemecanismou").val();
  let usuario = $("#usuarioMecanismo").val();
  let mecanismo = $("#mecanismo").val();
  let id_mecanismo = $("#id_mecanismo").val();
  let estado = 0;

  let cadena =
    "cod_reporte=" +
    cod_reporte +
    "&usuario=" +
    usuario +
    "&mecanismo=" +
    mecanismo +
    "&id_mecanismo=" +
    id_mecanismo +
    "&estado=" +
    estado;

  let mensaje_si = "Los datos  se han registrado correctamente.";
  let mensaje_no = "Error, NO se registró los datos.";

  $.ajax({
    type: "POST",
    url: "../modelo/acciones-crearReporte.php?accion=mecanismo",
    data: cadena,
    success: function (r) {
      console.log(r);
      if (r == 0) {
        alertify.error(mensaje_no);
      } else {
        alertify.success(mensaje_si);
        cargarTablaCrearReporte();
      }
    },
  });
}
// Funcion hallazgo
function agregardatosHallazgo() {
  cod_reporte = $("#cod_reportehallazgou").val();
  usuario = $("#usuarioHallazgo").val();
  hallazgo = $("#hallazgo").val();
  oportunidad_1 = $("#oportunidad_1").val();
  oportunidad_2 = $("#oportunidad_2").val();
  oportunidad_3 = $("#oportunidad_3").val();
  oportunidad_4 = $("#oportunidad_4").val();

  cadena =
    "cod_reporte=" +
    cod_reporte +
    "&usuario=" +
    usuario +
    "&hallazgo=" +
    hallazgo +
    "&oportunidad_1=" +
    oportunidad_1 +
    "&oportunidad_2=" +
    oportunidad_2 +
    "&oportunidad_3=" +
    oportunidad_3 +
    "&oportunidad_4=" +
    oportunidad_4;

  accion = "hallazgo";
  mensaje_si = "Los datos  se han registrado correctamente.";
  mensaje_no = "Error, NO se registró los datos.";

  $.ajax({
    type: "POST",
    url: "../modelo/acciones-crearReporte.php?accion=hallazgo",
    data: cadena,
    success: function (r) {
      console.log(r);
      if (r == 0) {
        alertify.error(mensaje_no);
      } else {
        alertify.success(mensaje_si);
        cargarTablaCrearReporte();
      }
    },
  });
}
// Funcion tratamiento
function agregardatosTratamiento() {
  let cod_reporte = $("#cod_reportetratamientou").val();
  let info_usuario = $("#usuarioTratamiento").val().split(" - ");
  let usuario = info_usuario[0];
  let tratamiento = $("#tratamiento").val();
  let metodo_control = $("#metodo_control").val();
  let tipo_plagas = $("#tipo_plagas").val();
  let nivel_infestacion = $("#nivel_infestacion").val();

  let cadena =
    "cod_reporte=" +
    cod_reporte +
    "&usuario=" +
    usuario +
    "&tratamiento=" +
    tratamiento +
    "&metodo_control=" +
    metodo_control +
    "&tipo_plagas=" +
    tipo_plagas +
    "&nivel_infestacion=" +
    nivel_infestacion;

  let mensaje_si = "Los datos  se han registrado correctamente.";
  let mensaje_no = "Error, NO se registró los datos.";

  $.ajax({
    type: "POST",
    url: "../modelo/acciones-crearReporte.php?accion=tratamiento",
    data: cadena,
    success: function (r) {
      console.log(r);
      if (r == 0) {
        alertify.error(mensaje_no);
      } else {
        alertify.success(mensaje_si);
        cargarTablaCrearReporte();
      }
    },
  });
}
// Función para cargar información de la vista
function cargarTablaCrearReporte() {
  $.ajax({
    type: "POST",
    url: "../administrador/Crear-reporte.php",
    async: true,
    success: function (respuesta) {
      console.log(respuesta);
      $("#tablaCrearReporte").html("");
      $("#tablaCrearReporte").html(respuesta);
      location.reload();
    },
    error: function (request, error) {
      alertify.success(error);
    },
  });
}

function cargardato() {
  let tipo_doc = 0;
  let usuario = $("#usuario").val(0);
  let nombre_apellido = 0;
  let fecha_de_inicio = $("#fecha_de_inicio").val(0);
  let hora_de_inicio = $("#hora_de_inicio").val(0);
  let fecha_fin = $("#fecha_fin").val(0);
  let hora_fin = $("#hora_fin").val(0);
  let cantidad_mecanismo = $("#cantidad_mecanismo").val(0);
  let cantidad_de_sustancia = $("#cantidad_de_sustancia").val(0);
  let cantidad_de_hallazgo = $("#cantidad_de_hallazgo").val(0);
  let ver_pdf = $("#ver_pdf").val();

  let cadena =
    "tipo_doc= " +
    tipo_doc +
    "&usuario=" +
    usuario +
    "&nombre_apellido=" +
    nombre_apellido +
    "&fecha_de_inicio=" +
    fecha_de_inicio +
    "&hora_de_inicio=" +
    hora_de_inicio +
    "&fecha_fin=" +
    fecha_fin +
    "&hora_fin=" +
    hora_fin +
    "&cantidad_mecanismo=" +
    cantidad_mecanismo +
    "&cantidad_de_sustancia=" +
    cantidad_de_sustancia +
    "&cantidad_de_hallazgo=" +
    cantidad_de_hallazgo +
    "&ver_pdf=" +
    ver_pdf;

  let mensaje_si = "Los datos  se han registrado correctamente.";
  let mensaje_no = "Error, NO se registró los datos.";

  $.ajax({
    type: "POST",
    url: "../modelo/acciones-crearReporte.php?accion=CrearReporte",
    data: cadena,
    success: function (r) {
      console.log(r);
      if (r == 0) {
        alertify.error(mensaje_no);
      } else {
        alertify.success(mensaje_si);
        //$('#tabla').load("../administrador/redConocimiento.php");
        // location.reload();
      }
    },
  });
}

// Función para cargar la empresa del usuario seleccionado
function cargarEmpresas(identificacion) {
  console.log("Cargamos las empresas del usuario=" + identificacion);
  $.ajax({
    url: "../modelo/datos-empresa.php",
    method: "POST",
    data: { identificacion: identificacion },
    dataType: "json",
    success: function (data) {
      let empresaSelect = $("#empresa_usu");
      empresaSelect.empty();
      for (let i = 0; i < data.length; i++) {
        empresaSelect.append(
          '<option value="' +
          data[i].numero +
          " - " +
          data[i].nombre_empresa +
          '">' +
          data[i].numero +
          " - " +
          data[i].nombre_empresa +
          "</option>"
        );
      }
    },
    error: function (xhr, status, error) {
      console.error("Error al obtener las empresas: " + error);
    },
  });
}

function cargarMetodosControl(tratamiento){
  console.log("Cargamos los métodos de control del tratamiento=" + tratamiento);
  $.ajax({
    url: "../modelo/datos-metodo_tratamiento.php",
    method: "POST",
    data: { tratamiento: tratamiento },
    dataType: "json",
    success: function (data) {
      let metodo_controlSelect = $("#metodo_control");
      metodo_controlSelect.empty();
      for (let i = 0; i < data.length; i++) {
        metodo_controlSelect.append(
          '<option value="' +
          data[i].metodo_control +
          '">' +
          data[i].metodo_control  +
          "</option>"
        );
      }
    },
    error: function (xhr, status, error) {
      console.error("Error al obtener las empresas: " + error);
    },
  });
}

function cargarTipoPlagas(tratamiento){
  console.log("Cargamos los tipo de plagas del tratamiento=" + tratamiento);
  $.ajax({
    url: "../modelo/datos-tipos-plagas.php",
    method: "POST",
    data: { tratamiento: tratamiento },
    dataType: "json",
    success: function (data) {
      console.log("data" + data);

      let tipo_plagasSelect = $("#tipo_plagas");
      tipo_plagasSelect.empty();
      for (let i = 0; i < data.length; i++) {
        tipo_plagasSelect.append(
          '<option value="' +
          data[i].tipo_plaga +
          '">' +
          data[i].tipo_plaga  +
          "</option>"
        );
      }
    },
    error: function (xhr, status, error) {
      console.error("Error al obtener los tipos de plagas: " + error);
    },
  });
}

function cargarCantidad(sustancias){
  console.log("Cargamos cantdad del sustancias=" + sustancias);
  $.ajax({
    url: "../modelo/datos-cantidad.php",
    method: "POST",
    data: { sustancias: sustancias },
    dataType: "json",
    success: function (data) {
      let cantidadSelect = $("#cantidad");
      cantidadSelect.empty();
      for (let i = 0; i < data.length; i++) {
        cantidadSelect.append(
          '<option value="' +
          data[i].codigo +
          '">' +
          data[i].valor  + " " + data[i].mediciones +
          "</option>"
        );
      }
    },
    error: function (xhr, status, error) {
      console.error("Error al obtener las cantidad: " + error);
    },
  });
}
