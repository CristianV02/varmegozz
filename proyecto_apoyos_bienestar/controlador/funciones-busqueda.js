// function agregarFormNuevo() {
//     $('#numero_documento').val();
//     $('#nombre').val();
//     $('#usuario').val();
//     $('#contrasena').val();
// }

function agregardatosUsuario() {
    tipo_documento = $('#tipo_documento').val();
    numero_documento = $('#numero_documento').val();
    nombre = $('#nombre').val();
    usuario = $('#usuario').val();
    contrasena = $('#contrasena').val();
    email = $('#email').val();
    rol_id = $('#rol_id').val();

    cadena = "tipo_documento=" + tipo_documento +
                "&numero_documento=" + numero_documento +
                "&nombre=" + nombre +
                "&usuario=" + usuario +
                "&contrasena=" + contrasena +
                "&email=" + email +
                "&rol_id=" + rol_id;

    accion = "registrar";
    mensaje_si = "El usuario registrado correctamente.";
    mensaje_no = "Error, NO se registró el usuario.";
   
    $.ajax({
        type: "POST",
        url: "../modelo/accionesUsuario.php?accion=registrar",
        data: cadena,
        success: function(r) {
            console.log(r);
            if (r == 0) {
                alertify.error(mensaje_no);
            } else {
                alertify.success(mensaje_si);
                cargarTablaUsuario();
                //$('#tabla').load('../administrador/usuarios.php');
                // location.reload();
      
           
            }
        }
    });
}
// Función para cargar información  a modificar
function agregarformUsuario(datos) {
    d = datos.split('||');
    $('#cod_usuariou').val(d[0]);
    $('#tipo_documentou').val(d[1]);
    $('#numero_documentou').val(d[2]);
    $('#nombreu').val(d[3]);
    $('#usuariou').val(d[4]);
    $('#contrasenau').val(d[5]);
    $('#emailu').val(d[6]);
    $('#rol_idu').val(d[7]);
}
// Función para modificar 
function modificarUsuario() {
    cod_usuario = $('#cod_usuariou').val();
    tipo_documento = $('#tipo_documentou').val();
    numero_documento = $('#numero_documentou').val();
    nombre = $('#nombreu').val();
    usuario = $('#usuariou').val();
    contrasena = $('#contrasenau').val();
    email = $('#emailu').val();
    rol_id = $('#rol_idu').val();

    cadena = "cod_usuario=" + cod_usuario +
                "&tipo_documento=" + tipo_documento +
                "&numero_documento=" + numero_documento +
                "&nombre=" + nombre +
                "&usuario=" + usuario +
                "&contrasena=" + contrasena +
                "&email=" + email +
                "&rol_id=" + rol_id;

        accion = "modificar";
        mensaje_si = "El usuario modificado con exito";
        mensaje_no = "Error de registro";
    
        $.ajax({
            type: "POST",
            url: "../modelo/accionesUsuario.php?accion=modificar",
            data: cadena,
            success: function(r) {
                console.log(r);
                if (r == 0) {
                    alertify.error(mensaje_no);
                } else {
                    alertify.success(mensaje_si);
                    cargarTablaUsuario();
                   // $('#tabla').load('../administrador/usuarios.php');
                    //location.reload();
                }
            }
        });
    }
    // Función para cargar información de la vista
function cargarTablaUsuario() {
    $.ajax({
        type: "POST",
        url: "../administrador/usuarios.php",
        async: true,
        success: function(respuesta) {
           // console.log(respuesta);
            $("#tablaUsuarios").html("");
            $("#tablaUsuarios").html(respuesta);
        },
        error: function(request, error) {
            alertify.success(error);
        }
    });
}
// Función apra confirmar la eliminación de un registro
function preguntarSiNoUsuario() {

    cod_usuario = $('#cod_usuariou').val();
    numero_documento = $('#numero_documentou').val();

    alertify.confirm('Eliminar periodo', ' ¿Está seguro de eliminar el usuario ' + numero_documento + '?',
        function () {
            eliminarDatos(cod_usuario, numero_documento)
        },
        function () {
            alertify.error('Error, no se ha eliminado el usuario ' + numero_documento)
        });

}

function eliminarDatos(cod_usuario, numero_documento) {
    cadena = "cod_usuario=" + cod_usuario +
             "&numero_documento=" + numero_documento;

        $.ajax({
            type: "POST",
            url: "../modelo/accionesUsuario.php?accion=eliminar",
            data: cadena,
            success: function(r) {
                console.log(r);
                if (r == 0) {
                    alertify.error(mensaje_no);
                } else {
                    alertify.success(mensaje_si);
                    cargarTablaUsuario();
                  //  $('#tabla').load('../administrador/usuarios.php');
                    // location.reload();
                  
                }
            }
        });
    }