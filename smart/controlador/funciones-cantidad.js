// Función para registrar productos
function agregardatosCantidad() {
    cod_sustancias = $('#cod_sustancias').val();
    valor = $('#valor').val();
    mediciones = $('#mediciones').val();

    cadena = "cod_sustancias=" + cod_sustancias +
        "&valor=" + valor +
        "&mediciones=" + mediciones;

    accion = "registrar";
    mensaje_si = "Los datos  se han registrado correctamente.";
    mensaje_no = "Error, NO se registró los datos.";

    $.ajax({
        type: "POST",
        url: "../modelo/acciones-cantidad.php?accion=registrar",
        data: cadena,
        success: function (r) {
            console.log(r);
            if (r == 0) {
                alertify.error(mensaje_no);
            } else {
                alertify.success(mensaje_si);
                cargarTablaCantidad();
                //$('#tabla').load("../administrador/redConocimiento.php");
                // location.reload();
            }
        }
    });
}
// Función para cargar información  a modificar
function agregarFormCantidad(datos) {
    d = datos.split('||');
    $('#codigou').val(d[0]);
    $('#cod_sustanciasu').val(d[1]);
    $('#valoru').val(d[2]);
    $('#medicionesu').val(d[3]);
}
// Función para modificar 
function modificarCantidad() {
    codigo = $('#codigou').val();
    cod_sustancias = $('#cod_sustanciasu').val();
    valor = $('#valoru').val();    
    mediciones = $('#medicionesu').val();


    cadena = "codigo=" + codigo +
        "&cod_sustancias=" + cod_sustancias +
        "&valor=" + valor +
        "&mediciones=" + mediciones;

    accion = "modificar";
    mensaje_si = "los datos  se han modificado con exito";
    mensaje_no = "Error de registro";

    $.ajax({
        type: "POST",
        url: "../modelo/acciones-cantidad.php?accion=modificar",
        data: cadena,
        success: function (r) {
            console.log(r);
            if (r == 0) {
                alertify.error(mensaje_no);
            } else {
                alertify.success(mensaje_si);
                cargarTablaCantidad();
                // $('#tabla').load("../administrador/redConocimiento.php");
                //location.reload();
            }
        }
    });
}
// Función para cargar información de la vista
function cargarTablaCantidad() {
    $.ajax({
        type: "POST",
        url: "../administrador/cantidad.php",
        async: true,
        success: function (respuesta) {
            //console.log(respuesta);
            $("#tablaCantidad").html("");
            $("#tablaCantidad").html(respuesta);
      location.reload();

        },
        error: function (request, error) {
            alertify.success(error);
        }
    });
}
// Función apra confirmar la eliminación de un registro
function preguntarSiNoCantidad() {
    codigo = $('#codigou').val();
    var opcion = confirm("¿Esta seguro de eliminar el registro?");
    if (opcion == true) {
        eliminardatosCantidad(codigo);
    } else {
        alert("El proceso de eliminación del registro ha sido cancelado.");
    }
}

function eliminardatosCantidad(codigo) {
    cadena = "codigo=" + codigo;

    accion = "eliminar";
    mensaje_si = "Los datos se han borrado correctamente.";
    mensaje_no = "Error.. NO se eliminólos datos.";

    $.ajax({
        type: "POST",
        url: "../modelo/acciones-cantidad.php?accion=eliminar",
        data: cadena,
        success: function (r) {
            console.log(r);
            if (r == 0) {
                alertify.error(mensaje_no);
            } else {
                alertify.success(mensaje_si);
                cargarTablaCantidad();
                // $('#tabla').load("../administrador/redConocimiento.php");
                // location.reload();
            }
        }
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
