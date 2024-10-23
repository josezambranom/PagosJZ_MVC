<?php include_once __DIR__ . '/../dashboard/header-user.php'; ?>

<div class="contenedor">
    <div class="plataformas">
        <h1>Plataformas</h1>

        <a class="boton-guia" href="/admin/plataformas/crear">Añadir Plataforma</a>
        
        <table class="tabla">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Plataforma</th>
                    <th>Precio</th>
                    <th>Estado</th>
                    <th>Categoría</th>
                    <th>Admin</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="tbody">
            </tbody>
        </table>

    </div>
</div>

<?php include_once __DIR__ . '/../dashboard/footer-user.php'; ?>