<?php 
    include_once __DIR__ . '/../dashboard/header-user.php'
?>

<div class="contenedor">
    <?php include_once __DIR__ . '/../templates/layout-productos.php' ?>
</div>

<?php 
    include_once __DIR__ . '/../dashboard/footer-user.php'; 
    $script = '
        <script src="/build/js/productos.js"></script>
    '
?>