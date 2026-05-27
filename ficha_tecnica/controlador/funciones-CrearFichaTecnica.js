function agregardatosFichaTecnica() {
    let mensaje_si = "El reporte se ha guardado correctamente.";
    alertify.success(mensaje_si);
    cargarTablaFichaTecnica();
  
  }
  // Función para cargar información de la vista
  function cargarTablaFichaTecnica() {
    $.ajax({
      type: "POST",
      url: "../administrador/ficha_tecnica.php",
      async: true,
      success: function (respuesta) {
          location.href="../administrador/ficha_tecnica.php"
      },
      error: function (request, error) {
        alertify.success(error);
      }
    });
  }
  function agregarformFichaTecnica(ficha_tecnica) {
    d = ficha_tecnica;
  
    $("#codigo_usuariou").val(d);
    $("#cod_informeu").val(d);
  }
function agregardatosUsuario() {
    let codigo = $("#codigo_usuariou").val();
    let nombre_propietario = $("#nombre_propietario").val();
    let identificacion = $("#identificacion").val();
    let telefono = $("#telefono").val();
  
    let cadena = "codigo=" + codigo +
      "&nombre_propietario=" + nombre_propietario +
      "&identificacion=" + identificacion + 
      "&telefono=" + telefono;
  
    accion = "usuario";
    let mensaje_si = "Un reporte fue registrado correctamente.";
    let mensaje_no = "Error, NO se registró un reporte.";
  
    $.ajax({
      type: "POST",
      url: "../modelo/acciones-crearFichaTecnica.php?accion=usuario",
      data: cadena,
      success: function (r) {
        if (r == 0) {
          alertify.error(mensaje_no);
        } else {
          alertify.success(mensaje_si);
          cargarTablaCrearFichaTecnica();
        }
      },
    });
  }
  function agregardatosInforme() {
        let codigo = $('#cod_informeu').val();
        let marca = $('#marca').val();
        let referencia = $('#referencia').val();
        let disco_duro = $('#disco_duro').val();
        let memoria_ram = $('#memoria_ram').val();
        let tarjeta_de_video = $('#tarjeta_de_video').val();
        let monitor = $('#monitor').val();
        let nombre_board = $('#nombre_board').val();
        let puertos_audio_voz = $('#puertos_audio_voz').val();
        let chip_set_motherboard = $('#chip_set_motherboard').val();
        let modelo = $('#modelo').val();
        let microprocesador = $('#microprocesador').val();
        let capacidad = $('#capacidad').val();
        let tipo_capacidad = $('#tipo_capacidad').val();
        let unid_cd_dvd = $('#unid_cd_dvd').val();
        let teclado = $('#teclado').val();
        let puerto_usb = $('#puerto_usb').val();
        let ranuras_para_memorias_ram = $('#ranuras_para_memorias_ram').val();
        let tipo_de_bios = $('#tipo_de_bios').val();
        let lector_de_tarjeta = $('#lector_de_tarjeta').val();
        let ranura_pci = $('#ranura_pci').val();
        let aceleradora = $('#aceleradora').val();
        let placa_de_red = $('#placa_de_red').val();
        let version_de_bios = $('#version_de_bios').val();
        let observaciones = $('#observaciones').val();
        let realizo = $('#realizo').val();
        let recibio = $('#recibio').val();
    
        let cadena = "codigo=" + codigo +
            "&marca=" + marca +
            "&referencia=" + referencia +
            "&disco_duro=" + disco_duro +
            "&memoria_ram=" + memoria_ram +
            "&tarjeta_de_video=" + tarjeta_de_video +
            "&monitor=" + monitor +
            "&nombre_board=" + nombre_board +
            "&puertos_audio_voz=" + puertos_audio_voz +
            "&chip_set_motherboard=" + chip_set_motherboard +
            "&modelo=" + modelo +
            "&microprocesador=" + microprocesador +
            "&capacidad=" + capacidad +
            "&tipo_capacidad=" + tipo_capacidad +
            "&unid_cd_dvd=" + unid_cd_dvd +
            "&teclado=" + teclado +
            "&puerto_usb=" + puerto_usb +
            "&ranuras_para_memorias_ram=" + ranuras_para_memorias_ram +
            "&tipo_de_bios=" + tipo_de_bios +
            "&lector_de_tarjeta=" + lector_de_tarjeta + 
            "&ranura_pci=" + ranura_pci +
            "&aceleradora=" + aceleradora +
            "&placa_de_red=" + placa_de_red +
            "&version_de_bios=" + version_de_bios +
            "&observaciones=" + observaciones +
            "&realizo=" + realizo +
            "&recibio=" + recibio;
    
        let mensaje_si = "Un reporte fue registrado correctamente.";
        let mensaje_no = "Error, NO se registró un reporte.";
    
        $.ajax({
            type: "POST",
            url: "../modelo/acciones-crearFichaTecnica.php?accion=informe",
            data: cadena,
            success: function (r) {
                console.log(r);
                if (r == 0) {
                    alertify.error(mensaje_no);
                } else {
                    alertify.success(mensaje_si);
                    cargarTablaCrearFichaTecnica();
    
    
                }
            }
        });
  }
  function cargarTablaCrearFichaTecnica() {
    $.ajax({
      type: "POST",
      url: "../administrador/Crear-ficha_tecnica.php",
      async: true,
      success: function (respuesta) {
        console.log(respuesta);
        $("#tablaCrearFichaTecnica").html("");
        $("#tablaCrearFichaTecnica").html(respuesta);
        location.reload();
      },
      error: function (request, error) {
        alertify.success(error);
      },
    });
  }