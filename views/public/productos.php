<?php include_once __DIR__ . '/header-inicio.php'; ?>

<div class="contenedor_inicio">
    <?php include_once __DIR__ . '/../templates/layout-productos.php' ?>
</div>

<?php 
    include_once __DIR__ . '/footer-inicio.php';
    $script = '
        <script src="build/js/productos.js"></script>
    ';
?>