// function agregarFormNuevo() {
//     $('#numero_documento').val();
//     $('#nombre').val();
//     $('#usuario').val();
//     $('#contrasena').val();
// }

function agregardatosVentas() {
    id_producto = $('#id_producto').val();
    nombre_producto = $('#nombre_producto').val();
    precio_total = $('#precio_total').val();
    unidades = $('#unidades').val();
    nombre_comprador = $('#nombre_comprador').val();

    cadena = "id_producto=" + id_producto +
        "&nombre_producto=" + nombre_producto +
        "&precio_total=" + precio_total +
        "&unidades=" + unidades +
        "&nombre_comprador=" + nombre_comprador;

    accion = "registrar";
    mensaje_si = "El usuario registrado correctamente.";
    mensaje_no = "Error, NO se registró el usuario.";

    $.ajax({
        type: "POST",
        url: "../modelo/accionesVentas.php?accion=registrar",
        data: cadena,
        success: function (r) {
            console.log(r);
            if (r == 0) {
                alertify.error(mensaje_no);
            } else {
                alertify.success(mensaje_si);
                cargarTablaVentas();
                //$('#tabla').load('../administrador/usuarios.php');
                location.reload();


            }
        }
    });
}
// Función para cargar información  a modificar
function agregarformVentas(datos) {
    d = datos.split('||');
    $('#codigou').val(d[0]);
    $('#id_productou').val(d[1]);
    $('#nombre_productou').val(d[2]);
    $('#precio_totalu').val(d[3]);
    $('#unidadesu').val(d[4]);
    $('#nombre_compradoru').val(d[5]);
}
// Función para modificar 
function modificarVentas() {
    codigo = $('#codigou').val();
    id_producto = $('#id_productou').val();
    nombre_producto = $('#nombre_productou').val();
    precio_total = $('#precio_totalu').val();
    unidades = $('#unidadesu').val();
    nombre_comprador = $('#nombre_compradoru').val();

    cadena = "codigo=" + codigo +
        "&id_producto=" + id_producto +
        "&nombre_producto=" + nombre_producto +
        "&precio_total=" + precio_total +
        "&unidades=" + unidades +
        "&nombre_comprador=" + nombre_comprador;

    accion = "modificar";
    mensaje_si = "El usuario modificado con exito";
    mensaje_no = "Error de registro";

    $.ajax({
        type: "POST",
        url: "../modelo/accionesVentas.php?accion=modificar",
        data: cadena,
        success: function (r) {
            console.log(r);
            if (r == 0) {
                alertify.error(mensaje_no);
            } else {
                alertify.success(mensaje_si);
                cargarTablaVentas();
                // $('#tabla').load('../administrador/usuarios.php');
                location.reload();
            }
        }
    });
}
// Función para cargar información de la vista
function cargarTablaVentas() {
    $.ajax({
        type: "POST",
        url: "../administrador/ventas.php",
        async: true,
        success: function (respuesta) {
            // console.log(respuesta);
            $("#tablaVentas").html("");
            $("#tablaVentas").html(respuesta);
        },
        error: function (request, error) {
            alertify.success(error);
        }
    });
}
// Función apra confirmar la eliminación de un registro
function preguntarSiNoVentas() {

    codigo = $('#codigou').val();
    id_producto = $('#id_productou').val();

    alertify.confirm('Eliminar periodo', ' ¿Está seguro de eliminar el usuario ' + id_producto + '?',
        function () {
            eliminarDatos(codigo, id_producto)
        },
        function () {
            alertify.error('Error, no se ha eliminado el usuario ' + id_producto)
        });

}

function eliminarDatos(codigo, identificacion) {
    cadena = "codigo=" + codigo +
        "&id_producto=" + id_producto;
    mensaje_si = "El usuario se ha eliminado con exito";
    mensaje_no = "Error de eliminacion";
    $.ajax({
        type: "POST",
        url: "../modelo/accionesVentas.php?accion=eliminar",
        data: cadena,
        success: function (r) {
            console.log(r);
            if (r == 0) {
                alertify.error(mensaje_no);
            } else {
                alertify.success(mensaje_si);
                cargarTablaVentas();
                //  $('#tabla').load('../administrador/usuarios.php');
                location.reload();

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