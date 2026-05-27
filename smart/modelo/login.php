<?php
// session_start();
require 'conexion.php';
$conexion = new Conexion();

if (isset($_POST['usuario']) && isset($_POST['contrasena'])) {
    $loginNombre = $_POST["usuario"];
    $loginPassword = $_POST["contrasena"];
    $sql = "SELECT * FROM usuarios WHERE usuario=:usuario AND contrasena=:contrasena";
    $modules = $conexion->prepare($sql);
    $modules->bindParam(":usuario", $loginNombre);
    $modules->bindParam(":contrasena", $loginPassword);
    $modules->execute();
    $total = $modules->rowCount();

    if ($total > 0) {
        $row = $modules->fetch(PDO::FETCH_ASSOC);
        if (($row['usuario'] == $loginNombre) && ($row['contrasena'] == $loginPassword)) {
            session_start();
            $_SESSION['codigo'] = $row['codigo'];
            $_SESSION['tipo_id'] = $row['tipo_id'];
            $_SESSION['identificacion'] = $row['identificacion'];
            $_SESSION['nombre'] = $row['nombre'];
            $_SESSION['apellido'] = $row['apellido'];
            $_SESSION['usuario'] = $row['usuario'];
            $_SESSION['correo'] = $row['correo'];
            $_SESSION['telefono'] = $row['telefono'];
            $_SESSION['direccion'] = $row['direccion'];
            $_SESSION['rol'] = $row['rol'];
            if ($row['rol'] == "administrador") { 
                header("Location: ../administrador/reporte.php");
            } else  if ($row['rol'] == "usuario"){
                header("Location: ../administrador/indexUsuario.php");
               
            } else if ($row['rol'] == "tecnico"){
                header("Location: ../administrador/reporte.php");
            }
        } else {
            // session_destroy();
            echo '<script language = javascript>
            alert("Datos incorectos del usuario.");
            self.location = "../index.php"
            </script>';
        }
    } else {
        // session_destroy();
        echo '<script language = javascript>
        alert("Por favor verifique la información registrada.");
        self.location = "../index.php"
        </script>';
    }
} else {
    // session_destroy();
    echo '<script language = javascript>
	alert("Por favor verifique la información registrada.");
	self.location = "../index.php"
	</script>';
}
