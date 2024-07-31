<?php include_once __DIR__ . '/sidebar.php' ?>

<header class="header">
    <div class="enlace-logo">
        <a href="/"><img src="build/img/logo-nombre.webp" alt="imagen principal"></a>
    </div>

    <img class="menu" id="menu" src="build/img/menu.webp" alt="imagen menu">
    
    <nav class="navegacion">
        <a href="/" class="enlace-nav <?php echo ($_SERVER['REQUEST_URI'] === '/') ? 'activo' : '' ?>">Inicio</a>
        <a href="/nosotros" class="enlace-nav <?php echo ($_SERVER['REQUEST_URI'] === '/nosotros') ? 'activo' : '' ?>">Nosotros</a>
        <a href="/productos" class="enlace-nav <?php echo ($_SERVER['REQUEST_URI'] === '/productos') ? 'activo' : '' ?>">Productos</a>
        <a href="/contacto" class="enlace-nav <?php echo ($_SERVER['REQUEST_URI'] === '/contacto') ? 'activo' : '' ?>">Contacto</a>
    </nav>

    
    <a class="boton" href="/login">Iniciar Sesión</a>
</header>