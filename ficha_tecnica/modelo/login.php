<?php
// session_start();
require 'conexion.php';
$conexion = new Conexion();

if (isset($_POST['usuario']) && isset($_POST['contrasena'])) {
    $loginNombre = $_POST["usuario"];
    $loginPassword = $_POST["contrasena"];
    $sql = "SELECT * FROM usuario WHERE usuario=:usuario AND contrasena=:contrasena";
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
            $_SESSION['nombres'] = $row['nombres'];
            $_SESSION['apellidos'] = $row['apellidos'];
            $_SESSION['usuario'] = $row['usuario'];
            $_SESSION['rol'] = $row['rol'];
            header("Location: ../administrador/dashBoard.php");
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

