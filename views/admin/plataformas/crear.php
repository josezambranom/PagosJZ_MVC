<?php include_once __DIR__ . '/../../dashboard/header-user.php'; ?>

<div class="contenedor">
    <a href="/admin/plataformas" class="boton-guia">Volver</a>

    <h2>Crear Plataforma</h2>

    <form class="formulario" action="/admin/plataformas/crear" enctype="multipart/form-data" method="POST">
        <?php include_once __DIR__ . '/formulario.php'; ?>
        <input type="submit" class="boton" value="Crear Plataforma">
    </form>

</div>


<?php include_once __DIR__ . '/../../dashboard/footer-user.php'; ?>