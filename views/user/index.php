<?php 
    include_once __DIR__ . '/../dashboard/header-user.php'
?>

<div class="contenedor">
    <h1>Inicio</h1>
    <div class="contenido-dashboard">
        <div class="promociones-dashboard">
            <h3>Promociones Activas</h3>
            <p>Se reflejan las promociones más recientes de nuestros productos</p>
        </div>

        <div class="saldo-dashboard">
            <h3>Saldo Actual</h3>
            <p>A continuación se muestra el detalle de su saldo activo en nuestra plataforma</p>
        </div>

        <div class="ultimas-compras">
            <h3>Últimas Transacciones</h3>
            <p>Se muestran los movimientos de saldo realizados dentro de las últimas 24 horas</p>
        </div>
    </div>
</div>

<?php include_once __DIR__ . '/../dashboard/footer-user.php'; ?>