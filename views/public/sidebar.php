<aside class="sidebar">
    <h1>Menú</h1>
    <nav class="sidebar-nav">
        <a href="/" class="<?php echo ($_SERVER['REQUEST_URI'] === '/') ? 'activo' : '' ?>">Inicio</a>
        <a href="/nosotros" class="<?php echo ($_SERVER['REQUEST_URI'] === '/nosotros') ? 'activo' : '' ?>">Nosotros</a>
        <a href="/productos" class="<?php echo ($_SERVER['REQUEST_URI'] === '/productos') ? 'activo' : '' ?>">Productos</a>
        <a href="/contacto" class="<?php echo ($_SERVER['REQUEST_URI'] === '/contacto') ? 'activo' : '' ?>">Contacto</a>
    </nav>

    <div class="sidebar-login">
        <a class="boton" href="/login">Iniciar Sesión</a>
    </div>
</aside>