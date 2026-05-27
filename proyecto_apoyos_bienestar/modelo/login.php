<?php
//session_start();
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
            $_SESSION['cod_usuario'] = $row['cod_usuario'];
            $_SESSION['tipo_documento'] = $row['tipo_documento'];
            $_SESSION['numero_documento'] = $row['numero_documento'];
            $_SESSION['nombre'] = $row['nombre'];
            $_SESSION['usuario'] = $row['usuario'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['rol_id'] = $row['rol_id'];
            header("Location: ../administrador/index.php");
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
