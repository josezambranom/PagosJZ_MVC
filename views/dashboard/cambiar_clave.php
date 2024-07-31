<?php include_once __DIR__ . '/header-user.php'; ?>

<div class="contenedor">
    <h1>Cambio de Clave</h1>

    <div class="cambiar-clave">
        <a class="boton" href="/dashboard/perfil">Volver al perfil</a>
    </div>

    <form id="form_clave" class="formulario" method="POST">
        <div class="campo">
            <label for="clave_actual">Clave Actual:</label>
            <input type="password" id="clave_actual" name="clave_actual" placeholder="Ingrese su clave actual" />
        </div>

        <div class="campo">
            <label for="clave_nueva">Nueva Clave:</label>
            <input type="password" id="clave_nueva" name="clave_nueva" placeholder="Ingrese su nueva clave" />
        </div>

        <input class="boton" type="submit" value="Guardar Cambios">
    </form>
</div>


<?php 
    include_once __DIR__ . '/footer-user.php'; 

    $script = '
        <script src="/build/js/perfil.js"></script>
    ';    
?>