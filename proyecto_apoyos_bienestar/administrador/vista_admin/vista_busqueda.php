<?php
require_once '../../modelo/val-admin.php';
// Validamos el rol de usuario para evitar intrusos
if ($rol_id == 1 || $rol_id == 2 || $rol_id == 3 || $rol_id == 4 ){

} else{
    echo '<script language = javascript>
    alert ("No es un usuario valido.") 
    self.location="../index.php"
    </script>';
}
?>
<div class="col-sm-12">
    <!-- Inicio titulos de la pagina-->
    <div class="page-head">
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Apoyos Socioeconomicos
                    <small>SENA</small>
                </h1>
            </div>
            <!-- END PAGE TITLE -->
        </div>
    </div>

    <!-- END PAGE HEAD-->
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="index.php">Inicio</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span class="active">Búsqueda</span>
        </li>
    </ul>
    <!-- END PAGE BREADCRUMB -->
    <!-- Inicio Línea horizontal -->
    <!-- <hr style="border:0px; border-top: 5px double #999999;" /> -->
    <!-- Fin Línea horizontal -->
    <!-- INICIO FORMULARIO PARA BÚSQUEDA -->
    <div class="row">
        <div class="col-sm-12 text-center mt-5">
            <h1>Centro de Formación para el Desarrollo Rural y Minero - CEDRUM<br /></h1>
            <h2 class="titulo_app">Seguimiento y consulta de aprendices con apoyos Socioeconómicos</h2>
        </div>
    </div>
    <div class="row">
        <div class="row">
            <div class="col-sm-5"></div>
            <div class="col-sm-2 mt-5">
                <!--Titulos-->
                <h3 class="text-center">Seleccione el tipo de búsqueda: </h3>
                <!--Input1-->
                <form id="signup" action="./datos_busqueda.php" method="POST">
                    <div>
                        <label for="tipo_busqueda">Tipo de búsqueda:</label>
                        <select id="tipo_busqueda" name="tipo_busqueda" class="form-control" required>
                            <option selected></option>
                            <option value="1">Número de Documento</option>
                            <option value="2">Número de Ficha</option>
                        </select>
                    </div>
                    </br>
                    <!--Input2-->
                    <div class="form-group ">
                        <label for="datoBusqueda" class="form-label">Número:</label>
                        <input type="text" class="form-control" id="datoBusqueda" name="datoBusqueda" placeholder="Digíte el dato a buscar" required>
                    </div>
                    </br>
                    <!--Boton-->
                    <div class="text-center">
                        <button type="submit" class="btn btn-success" title="btnBusqueda">
                            Buscar
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-sm-5"></div>
        </div>
    </div>
</div>
<!-- FIN FORMULARIO PARA BÚSQUEDA -->
</div>

<!--Footer-->
<footer>
    <!-- <div class="col-sm-12 text-center"> -->
    <span>Desarrollado: Tecnoparque Nodo Cúcuta</span>
    <span> - CEDRUM</span>
    <!-- </div> -->
</footer>