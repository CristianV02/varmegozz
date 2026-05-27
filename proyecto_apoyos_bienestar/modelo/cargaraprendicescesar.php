<?php
require_once '../modelo/val-bienestar.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Registro masivo de aprendices</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    include 'librerias-css.php';
    ?>
</head>

<body>
    <!--Inicio menu-->
    <?php
    include 'menu.php';
    ?>
    <!--Fin menu-->
    <div class="container">
        <!-- Inicio titulos de la pagina-->
        <div class="page-head">
            <div class="page-title">
                <h3>CEDRUM - Cargar aprendices en formato masivo
                    <small>Bienestar al aprendiz</small>
                </h3>
            </div>
            <div class="page-toolbar"></div>
        </div>
        <!-- Fin titulos de la pagina-->
        <!-- Inicio de ruta-->
        <ul class="page-breadcrumb breadcrumb">
            <li><a href="index.php"><i class=" fa fa-home fa-sm"></i> Inicio</a></li>
            <li><span class="active"><a href="fichas.php">Programas de formación</a></span></li>
            <li><span class="active">Cargar aprendices en formato masivo</span></li>
        </ul>
        <div class="row">
            <div class="col-sm-12">
                <div class="col-sm-3"></div>
                <div class="col-sm-6 text-center">
                    <h3>SELECCIONAR ARCHIVO EN EXCEL</h3>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <form name="importa" method="post" action="cargarapsavecesar.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="coordinacion">Coordinación</label>
                        <select name="coordinacion" id="coordinacion" required="" class="form-control">
                            <option selected="selected"></option>
                            <option value="CEDRUM">CEDRUM</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jornada">Jornada (Diurna, Tarde, Nocturna)</label>
                        <select name="jornada" id="jornada" required="" class="form-control">
                            <option></option>
                            <option value="1">DIURNA</option>
                            <option value="2" selected="selected">MIXTA</option>
                            <option value="3">NOCTURNA</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ubicacion">Ubicación - Sede</label>
                        <input name="ubicacion" id="ubicacion" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="tpformacion">Tipo de formación</label>
                        <select name="tpformacion" id="tpformacion" class="form-control">
                            <option selected="selected"></option>
                            <option value="TECNOLOGO">TECNOLOGO</option>
                            <option value="TECNICO">TECNICO</option>
                            <option value="OPERARIO">OPERARIO</option>
                            <option value="AUXILIAR">AUXILIAR</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="archivo"></label>
                        <input type="file" name="excel" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" name='enviar' value="Importar" class="btn btn-success">Importar</button>
                        <!--<input type='submit' name='enviar'  value="Importar" />-->
                        <input type="hidden" value="upload" name="action" />
                    </div>
                </form>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>
    </div><br />
    <!--Fin contenido-->
    <?php
    include 'footer.php';
    include 'librerias-js.php';
    ?>
</body>

</html>