<?php include_once __DIR__ . '/../dashboard/header-user.php'; ?>

<div class="contenedor">
<div class="cuentas">
    <h1>Mis Cuentas</h1>

    <table class="tabla">
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Plataforma</th>
                <th>Precio</th>
                <th>Usuario</th>
                <th>Clave</th>
                <th>Perfil</th>
                <th>Pin</th>
                <th>Fecha de Compra</th>
            </tr>
        </thead>
        <tbody id="tbody">
        </tbody>
    </table>
</div>
</div>


<?php 
    include_once __DIR__ . '/../dashboard/footer-user.php'; 
    $script = '
        <script src="/build/js/cuentas.js"></script>
    '
?>