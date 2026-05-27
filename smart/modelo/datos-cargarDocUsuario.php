<?php

class cargarDocUsuario
{

    // Retorna una empresa por id de la empresa
    function cargarArchivoUsuario($codigo, $nombre_archivo_usu)
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $target_dir = "../documentos_usuarios/";
        $nombre_archivo = $nombre_archivo_usu;
        $target_file = $target_dir . basename($nombre_archivo);
        $uploadOk = 1;
        $PDFFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $error = "";
        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            // Varificamos si el archivo subido es un PDF
            // $check = getimagesize($_FILES["pdf_empresa"]["tmp_name"]);
            if ($_FILES['archivo']['type']=='application/pdf'){
                echo 'Es un archivo pdf';
                $check = true;
            }
            else{
                $check = false;
            }
            if ($check) {
                echo "File is an pdf";
                $uploadOk = 1;
            } else {
                echo "File is not an PDF.";
                $uploadOk = 0;
            }
        } else {
            echo '<script language = javascript>
            alert ("La información no corresponde, por favor verifique.")
            self.location="../administrador/docUsuarios.php"
            </script>';
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            $error += "<br/>- El archivo no existe.";
            echo "<br/>- Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size - 2Mb
        if ($_FILES["archivo"]["size"] > 2000000) {
            $error += "<br/>- El archivo es demasiado grande.";
            echo "- Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if (
            $PDFFileType != "pdf"
        ) {
            echo "Sorry, only PDF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "<br/>- Sorry, your file was not uploaded.";
            echo '<script language = javascript>
            alert ("Por favor verifique la infomación a registrar\n"' . $error . '")
            self.location="../administrador/docUsuarios.php"
            </script>';
            // if everything is ok, try to upload file
        } else {
            // Nuevo nombre del archivo
            $nuevo_nombre_documento = "Documento-" . $codigo . "." . $PDFFileType;
            $new_target_file = $target_dir . basename($nuevo_nombre_documento);
            echo "<br/>Codigo: " . $codigo;
            echo "<br/>Nombre Documento: " . $nombre_archivo_usu;
            if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $new_target_file)) {
                echo "<br/>El archivo se ha subido correctamente...";
                echo "The file " . htmlspecialchars(basename($nombre_archivo_usu)) . " has been uploaded.";
                // Sentencias SQL - UPDATE
                $sql = "UPDATE documentos_usuarios SET
					   archivo=:archivo
				WHERE codigo = :codigo;";
                $uptd = $conexion->prepare($sql);
                $uptd->bindParam(":archivo", $nuevo_nombre_documento);
                $uptd->bindParam(":codigo", $codigo);
                if ($uptd->execute()) {
                    echo '<script language = javascript>
                    alert ("Los archivos se cargaron correctamente.")
                    self.location="../administrador/docUsuarios.php";
                    </script>';
                    
                } else {
                    echo '<script language = javascript>
                    alert ("Los archivos se cargaron correctamente.")
                    self.location="../administrador/docUsuarios.php";
                    </script>';
                }
            } else {
                echo "<br/>Sorry, there was an error uploading your file.";
                echo '<script language = javascript>
                    alert ("Los archivos se cargaron correctamente.")
                    self.location="../administrador/docUsuarios.php";
                    </script>';
            }
        }
    }
}
