<?php
class misEnvios
{
    // Enviar correo al comprador
    public  function enviarCorreoAdministrador()
    {
        // Información Correo para administrador de Jaziz
        $para  = 'cordinadorjaziz@gmail.com';
        $titulo = 'Notificación alerta de mecanismo';
        $mensaje1 = 'Para revisarla ingresa a tu cuenta a través del siguiente link:';
        // Inicio del correo
        $mensaje = '<html>
                    <head>
                        <title>Prueba de mecanismo</title>
                    </head>
                    <body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; text-align: center;">
                        <div style="max-width: 600px; background: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0px 0px 10px #ccc; margin: auto;">
                        <img src="https://jazizbiologico.com/web/smart/imagenes/logo-jaziz_sf.png" alt="Logo de la empresa" style="max-width: 200px; margin-top: 20px;">
                            <h2 style="color: #333;">📌 Se generó una alerta de mecanismo</h2>
                            <p style="font-size: 16px; color: #666;">' . $mensaje1 . '</p>
                            <br/>
                            <a href="https://jazizbiologico.com/web/smart/index.php" target="_blank"
                            style="display: inline-block; background: #E85D0F; color: #ffffff; font-weight: bold; padding: 15px 30px;
                                    text-decoration: none; border-radius: 30px; font-size: 18px; box-shadow: 2px 2px 5px rgba(0,0,0,0.2);">
                            INGRESAR
                            </a>
                        </div>
                    </body>
                    </html>';
        $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
        $cabeceras .= "Content-type: text/html; charset=UTF-8" . "\r\n";
        $cabeceras .= 'From: JazizBiológico <cordinador@jazizbiologico.com>' . "\r\n";


        $enviado = mail($para, $titulo, $mensaje, $cabeceras);
        if ($enviado) {
            echo "<br>enviado a: " . $para . "<br>";
            return 1;
        } else {
            echo "<br>no envio" . "<br>" . $para;
            return 0;
        }
    }

    // Enviar correo al comprador
    public function enviarCorreoTecnicos()
    {
        date_default_timezone_set("America/Bogota");
        require_once './datos-usuarios.php';
        $misUsuarios = new misUsuarios();
        $res = $misUsuarios->viewUsuarioRol("tecnico");

        // Verificar que hay resultados
        if (!$res || count($res) == 0) {
            echo "No hay técnicos registrados.";
            return 0;
        }
        // Construir la lista de destinatarios
        $para = [];
        foreach ($res as $usuario) {
            $para[] = $usuario['correo'];
        }
        $destinatarios = implode(',', $para);


        // Información Correo para administrador de Jaziz
        $titulo = 'Notificación alerta de mecanismo';
        $mensaje1 = 'Para revisarla ingresa a tu cuenta a través del siguiente link:';
        // Inicio del correo
        $mensaje = '<html>
                    <head>
                        <title>Prueba de mecanismo</title>
                    </head>
                    <body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; text-align: center;">
                        <div style="max-width: 600px; background: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0px 0px 10px #ccc; margin: auto;">
                        <img src="https://jazizbiologico.com/web/smart/imagenes/logo-jaziz_sf.png" alt="Logo de la empresa" style="max-width: 200px; margin-top: 20px;">
                            <h2 style="color: #333;">📌 Se generó una alerta de mecanismo</h2>
                            <p style="font-size: 16px; color: #666;">' . $mensaje1 . '</p>
                            <br/>
                            <a href="https://jazizbiologico.com/web/smart/index.php" target="_blank"
                            style="display: inline-block; background: #E85D0F; color: #ffffff; font-weight: bold; padding: 15px 30px;
                                    text-decoration: none; border-radius: 30px; font-size: 18px; box-shadow: 2px 2px 5px rgba(0,0,0,0.2);">
                            INGRESAR
                            </a>
                        </div>
                    </body>
                    </html>';
        $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
        $cabeceras .= "Content-type: text/html; charset=UTF-8" . "\r\n";
        $cabeceras .= 'From: JazizBiológico <cordinador@jazizbiologico.com>' . "\r\n";


        $enviado = mail($destinatarios, $titulo, $mensaje, $cabeceras);
        if ($enviado) {
            echo "<br>tecnicos: " . $destinatarios . "<br>";
            return 1;
        } else {
            echo "<br>no envio" . "<br>" . $destinatarios;
            return 0;
        }
    }

    public function enviarCorreoUsuario($identificacion_cliente)
    {
        date_default_timezone_set("America/Bogota");
        require_once './datos-usuarios.php';
        $misUsuarios = new misUsuarios();
        $res = $misUsuarios->viewUsuarioDocumento($identificacion_cliente);

        // Verificar que hay resultados
        if (!$res || count($res) == 0) {
            echo "No hay técnicos registrados.";
            return 0;
        }
        // Construir la lista de destinatarios
        $para = [];
        foreach ($res as $usuario) {
            $para[] = $usuario['correo'];
        }
        $destinatarios = implode(',', $para);


        // Información Correo para administrador de Jaziz
        $titulo = 'Notificación alerta de mecanismo';
        $mensaje1 = 'Para revisarla ingresa a tu cuenta a través del siguiente link:';
        // Inicio del correo
        $mensaje = '<html>
                    <head>
                        <title>Prueba de mecanismo</title>
                    </head>
                    <body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; text-align: center;">
                        <div style="max-width: 600px; background: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0px 0px 10px #ccc; margin: auto;">
                        <img src="https://jazizbiologico.com/web/smart/imagenes/logo-jaziz_sf.png" alt="Logo de la empresa" style="max-width: 200px; margin-top: 20px;">
                            <h2 style="color: #333;">📌 Se generó una alerta de mecanismo</h2>
                            <p style="font-size: 16px; color: #666;">' . $mensaje1 . '</p>
                            <br/>
                            <a href="https://jazizbiologico.com/web/smart/index.php" target="_blank"
                            style="display: inline-block; background: #E85D0F; color: #ffffff; font-weight: bold; padding: 15px 30px;
                                    text-decoration: none; border-radius: 30px; font-size: 18px; box-shadow: 2px 2px 5px rgba(0,0,0,0.2);">
                            INGRESAR
                            </a>
                        </div>
                    </body>
                    </html>';
        $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
        $cabeceras .= "Content-type: text/html; charset=UTF-8" . "\r\n";
        $cabeceras .= 'From: JazizBiológico <cordinador@jazizbiologico.com>' . "\r\n";


        $enviado = mail($destinatarios, $titulo, $mensaje, $cabeceras);
        if ($enviado) {
            echo "<br>usuarios: " . $destinatarios . "<br>";
            return 1;
        } else {
            echo "<br>no envio" . "<br>" . $destinatarios;
            return 0;
        }
    }
}
