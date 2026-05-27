/*
Reemplazar el nombre del archivo modalClases.php

    **************************
    * Variables a reemplazar *
    **************************

Reemplazar la palabra "clases" de:

agregardatosClases
../modelo/accionesClases.php?accion=registrar
cargarTablaClases
agregarformClases
modificarClases
../modelo/accionesClases.php?accion=modificar
../administrador/componentes/vista_Clases.php
tablaClases
preguntarSiNoclases
../modelo/accionesClases.php?accion=eliminar

*******
Reemplazar todo:

mensaje_si = "El usuario registrado correctamente.";
mensaje_no = "Error, No se registró el usuario.";
accion = "modificar";
mensaje_si = "El usuario modificado con exito";
mensaje_no = "Error de registro";
Eliminar periodo', ' ¿Está seguro de eliminar el usuario '
Error, no se ha eliminado el usuario '

*********

Borrar cuando esté modificado todo e ir a ../modelo/accionesClases.php
*/


function agregardatosClases() {
    tipo_documento = $('#tipo_documento').val();
    numero_documento = $('#numero_documento').val();
    nombre = $('#nombre').val();
    usuario = $('#usuario').val();
    contrasena = $('#contrasena').val();
    email = $('#email').val();
    telefono = $('#telefono').val();
    ciudad = $('#ciudad').val();
    regional_cod = $('#regional_cod').val();
    centro_formacion_cod = $('#centro_formacion_cod').val();
    direccion_sede = $('#direccion_sede').val();
    cargo = $('#cargo').val();
    area = $('#area').val();
    rol_id = $('#rol_id').val();

    cadena = "tipo_documento=" + tipo_documento +
                "&numero_documento=" + numero_documento +
                "&nombre=" + nombre +
                "&usuario=" + usuario +
                "&contrasena=" + contrasena +
                "&email=" + email +
                "&telefono=" + telefono +
                "&ciudad=" + ciudad +
                "&regional_cod=" + regional_cod +
                "&centro_formacion_cod=" + centro_formacion_cod +
                "&direccion_sede=" + direccion_sede +
                "&cargo=" + cargo +
                "&area=" + area +
                "&rol_id=" + rol_id;

    accion = "registrar";
    mensaje_si = "El usuario registrado correctamente.";
    mensaje_no = "Error, No se registró el usuario.";
   
    $.ajax({
        type: "POST",
        url: "../modelo/accionesClases.php?accion=registrar",
        data: cadena,
        success: function(r) {
            console.log(r);
            if (r == 0) {
                alertify.error(mensaje_no);
            } else {
                alertify.success(mensaje_si);
                cargarTablaClases();
      
           
            }
        }
    });
}
// Función para cargar información  a modificar
function agregarformClases(datos) {
    d = datos.split('||');
    $('#codigou').val(d[0]);
    $('#tipo_documentou').val(d[1]);
    $('#numero_documentou').val(d[2]);
    $('#nombreu').val(d[3]);
    $('#usuariou').val(d[4]);
    $('#contrasenau').val(d[5]);
    $('#emailu').val(d[6]);
    $('#telefonou').val(d[7]);
    $('#ciudadu').val(d[8]);
    $('#regional_codu').val(d[9]);
    $('#centro_formacion_codu').val(d[10]);
    $('#direccion_sedeu').val(d[11]);
    $('#cargou').val(d[12]);
    $('#areau').val(d[13]);
    $('#rol_idu').val(d[14]);
}
// Función para modificar 
function modificarClases() {
    codigo = $('#codigou').val();
    tipo_documento = $('#tipo_documentou').val();
    numero_documento = $('#numero_documentou').val();
    nombre = $('#nombreu').val();
    usuario = $('#usuariou').val();
    contrasena = $('#contrasenau').val();
    email = $('#emailu').val();
    telefono = $('#telefonou').val();
    ciudad = $('#ciudadu').val();
    regional_cod = $('#regional_codu').val();
    centro_formacion_cod = $('#centro_formacion_codu').val();
    direccion_sede = $('#direccion_sedeu').val();
    cargo = $('#cargou').val();
    area = $('#areau').val();
    rol_id = $('#rol_idu').val();

    cadena = "codigo=" + codigo +
                "&tipo_documento=" + tipo_documento +
                "&numero_documento=" + numero_documento +
                "&nombre=" + nombre +
                "&usuario=" + usuario +
                "&contrasena=" + contrasena +
                "&email=" + email +
                "&telefono=" + telefono +
                "&ciudad=" + ciudad +
                "&regional_cod=" + regional_cod +
                "&centro_formacion_cod=" + centro_formacion_cod +
                "&direccion_sede=" + direccion_sede +
                "&cargo=" + cargo +
                "&area=" + area +
                "&rol_id=" + rol_id;

        accion = "modificar";
        mensaje_si = "El usuario modificado con exito";
        mensaje_no = "Error de registro";
    
        $.ajax({
            type: "POST",
            url: "../modelo/accionesClases.php?accion=modificar",
            data: cadena,
            success: function(r) {
                console.log(r);
                if (r == 0) {
                    alertify.error(mensaje_no);
                } else {
                    alertify.success(mensaje_si);
                    cargarTablaClases();
                   // $('#tabla').load('../administrador/usuarios.php');
                    //location.reload();
                }
            }
        });
    }
    // Función para cargar información de la vista
function cargarTablaClases() {
    $.ajax({
        type: "POST",
        url: "../administrador/componentes/vista_Clases.php",
        async: true,
        success: function(respuesta) {
           // console.log(respuesta);
            $("#tablaClases").html("");
            $("#tablaClases").html(respuesta);
        },
        error: function(request, error) {
            alertify.success(error);
        }
    });
}
// Función apra confirmar la eliminación de un registro
function preguntarSiNoclases() {

    codigo = $('#codigou').val();
    numero_documento = $('#numero_documentou').val();

    alertify.confirm('Eliminar periodo', ' ¿Está seguro de eliminar el usuario ' + numero_documento + '?',
        function () {
            eliminarDatos(codigo, numero_documento)
        },
        function () {
            alertify.error('Error, no se ha eliminado el usuario ' + numero_documento)
        });

}

function eliminarDatos(codigo, numero_documento) {
    cadena = "codigo=" + codigo +
             "&numero_documento=" + numero_documento;

        $.ajax({
            type: "POST",
            url: "../modelo/accionesClases.php?accion=eliminar",
            data: cadena,
            success: function(r) {
                console.log(r);
                if (r == 0) {
                    alertify.error(mensaje_no);
                } else {
                    alertify.success(mensaje_si);
                    cargarTablaClases();
                  //  $('#tabla').load('../administrador/usuarios.php');
                    // location.reload();
                  
                }
            }
        });
    }