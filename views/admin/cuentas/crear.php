<?php include_once __DIR__ . '/../../dashboard/header-user.php'; ?>

<div class="contenedor">
    <a href="/admin/cuentas" class="boton-guia">Volver</a>

    <h2>Crear Cuenta</h2>

    <form class="formulario" action="/admin/cuentas/crear" method="POST">
        <?php include_once __DIR__ . '/formulario.php'; ?>
        <input type="submit" class="boton" value="Crear Cuenta">
    </form>

</div>


<?php include_once __DIR__ . '/../../dashboard/footer-user.php'; ?>