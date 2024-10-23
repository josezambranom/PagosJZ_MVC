<?php include_once __DIR__ . '/../../dashboard/header-user.php'; ?>

<div class="contenedor">
    <a href="/admin/plataformas" class="boton-guia">Volver</a>

    <h2>Actualizar Plataforma</h2>

    <form class="formulario" enctype="multipart/form-data" method="POST">
        <?php include_once __DIR__ . '/formulario.php'; ?>
        <input type="submit" class="boton" value="Actualizar Plataforma">
    </form>

</div>


<?php include_once __DIR__ . '/../../dashboard/footer-user.php'; ?>