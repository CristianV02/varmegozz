<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Proyectos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./miestilo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
    <?php
    $claseContainer = "container";
    include 'header.php';
    ?>

    <div class="dashboard-wrapper">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-center g-4">

                <div class="col-12 col-xl-2 text-center">
                    <div class="contenedor-foto-perfil">
                        <img src="./imagenes/cris.jpg" class="foto-dashboard" alt="Cristian Vargas">
                    </div>
                </div>

                <div class="col-12 col-xl-8">
                    <div class="text-center">
                        <h2>Proyectos</h2>
                    </div>

                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4 mt-2">

                        <div class="col">
                            <a href="/web/smart/" class="card-link">
                                <div class="tarjeta-proyecto">
                                    <div class="franja"></div>
                                    <div class="recuadros">
                                        <i class="bi bi-bug-fill"></i>
                                        <p>Jaziz Biológico</p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col">
                            <a href="/web/carnet/" class="card-link">
                                <div class="tarjeta-proyecto">
                                    <div class="franja"></div>
                                    <div class="recuadros">
                                        <i class="bi bi-mortarboard-fill"></i>
                                        <p>Proyecto Unilibre</p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col">
                            <a href="/web/icoplas_20/" class="card-link">
                                <div class="tarjeta-proyecto">
                                    <div class="franja"></div>
                                    <div class="recuadros">
                                        <i class="bi bi-recycle"></i>
                                        <p>Página Icoplast</p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col">
                            <a href="/web/ficha_tecnica/" class="card-link">
                                <div class="tarjeta-proyecto">
                                    <div class="franja"></div>
                                    <div class="recuadros">
                                        <i class="bi bi-laptop"></i>
                                        <p>Página Mantenimiento</p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col">
                            <a href="#" class="card-link">
                                <div class="tarjeta-proyecto">
                                    <div class="franja"></div>
                                    <div class="recuadros">
                                        <i class="bi bi-people-fill"></i>
                                        <p>Apoyos Bienestar</p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col">
                            <a href="/web/grafos/grafos.html" class="card-link">
                                <div class="tarjeta-proyecto">
                                    <div class="franja"></div>
                                    <div class="recuadros">
                                        <i class="bi bi-graph-up-arrow"></i>
                                        <p>Proyecto Grafos</p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col">
                            <a href="/web/derivadas/derivadas.html" class="card-link">
                                <div class="tarjeta-proyecto">
                                    <div class="franja"></div>
                                    <div class="recuadros">
                                        <i class="bi bi-calculator"></i>
                                        <p>Página Derivadas</p>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>

                <div class="col-12 col-xl-2 text-center">
                    <div class="contenedor-foto-perfil">
                        <img src="./imagenes/santi.jpg" class="foto-dashboard" alt="Santi">
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>