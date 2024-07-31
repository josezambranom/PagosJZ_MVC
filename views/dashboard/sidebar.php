<aside class="sidebar_dashboard">
    <img src="/build/img/logo.webp" alt="imagen logo">
    <?php if($tipousuario === '0'){ ?>
        <nav class="sidebar-nav">
            <a href="/dashboard" class="<?php echo ($_SERVER['REQUEST_URI'] === '/dashboard') ? 'activo' : '' ?>">Inicio</a>
            <a href="/dashboard/productos" class="<?php echo ($_SERVER['REQUEST_URI'] === '/dashboard/productos') ? 'activo' : '' ?>">Productos</a>
            <a href="/dashboard/cuentas" class="<?php echo ($_SERVER['REQUEST_URI'] === '/dashboard/cuentas') ? 'activo' : '' ?>">Cuentas</a>
            <a href="/dashboard/acreditaciones" class="<?php echo ($_SERVER['REQUEST_URI'] === '/dashboard/acreditaciones') ? 'activo' : '' ?>">Acreditaciones</a>
            <a href="/dashboard/soporte" class="<?php echo ($_SERVER['REQUEST_URI'] === '/dashboard/soporte') ? 'activo' : '' ?>">Soporte</a>
        </nav>
    <?php } else { ?>
        <nav class="sidebar-nav">
            <a href="/admin" class="<?php echo ($_SERVER['REQUEST_URI'] === '/admin') ? 'activo' : '' ?>">Inicio</a>
            <a href="/admin/plataformas" class="<?php echo ($_SERVER['REQUEST_URI'] === '/admin/plataformas') ? 'activo' : '' ?>">Gestión de Plataformas</a>
            <a href="/admin/cuentas" class="<?php echo ($_SERVER['REQUEST_URI'] === '/admin/cuentas') ? 'activo' : '' ?>">Gestión de Cuentas</a>
            <a href="/admin/acreditaciones" class="<?php echo ($_SERVER['REQUEST_URI'] === '/admin/acreditaciones') ? 'activo' : '' ?>">Gestión de Acreditaciones</a>
            <a href="/admin/soporte" class="<?php echo ($_SERVER['REQUEST_URI'] === '/admin/soporte') ? 'activo' : '' ?>">Gestión de Soporte</a>
        </nav>
    <?php } ?>
</aside>