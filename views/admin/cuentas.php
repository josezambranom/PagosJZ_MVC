<?php include_once __DIR__ . '/../dashboard/header-user.php'; ?>

<div class="contenedor">
    <h1>Cuentas</h1>

    <a class="boton-guia" href="/admin/cuentas/crear">Añadir Cuenta</a>

    <table class="tabla">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Clave</th>
                <th>Pin</th>
                <th>Perfil</th>
                <th>Estado</th>
                <th>Fecha de Compra</th>
                <th>Vigencia</th>
                <th>Cliente</th>
                <th>Plataforma</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="tbody">
        </tbody>
    </table>
</div>
        
<?php include_once __DIR__ . '/../dashboard/footer-user.php'; ?>