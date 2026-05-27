<div class="row g-3 my-2">
    <?php
    $cards = [
        ["titulo" => "Proyectos Activos", "valor" => "12", "icono" => "bi-layer-forward", "color" => "b-gradient-blue"],
        ["titulo" => "Tareas Completadas", "valor" => "48", "icono" => "bi-check-circle-fill", "color" => "b-gradient-green"],
        ["titulo" => "Horas de Desarrollo", "valor" => "160h", "icono" => "bi-clock-history", "color" => "b-gradient-purple"],
        ["titulo" => "Rendimiento", "valor" => "96%", "icono" => "bi-lightning-charge-fill", "color" => "b-gradient-orange"]
    ];

    foreach ($cards as $card) {
        echo '
        <div class="col-md-3">
            <div class="p-4 bg-white shadow-sm d-flex justify-content-between align-items-center rounded-3 card-custom">
                <div>
                    <h3 class="fs-2 fw-bold text-dark">' . $card['valor'] . '</h3>
                    <p class="fs-6 text-muted m-0">' . $card['titulo'] . '</p>
                </div>
                <div class="icon-box ' . $card['color'] . ' text-white p-3 rounded-3">
                    <i class="bi ' . $card['icono'] . ' fs-3"></i>
                </div>
            </div>
        </div>';
    }
    ?>
</div>