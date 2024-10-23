<?php include_once __DIR__ . '/header-user.php'; ?>

<div class="contenedor">
    <h1>Mi perfil</h1>

        <a class="boton-guia" href="/dashboard/cambiar-clave">Cambiar Clave</a>

    <form id="form_perfil" class="formulario" method="POST">
            <label for="nombre">Nombres:</label>
            <input type="text" id="nombre_perfil" name="nombre" placeholder="Ingrese sus nombres" />

            <label for="apellido">Apellidos:</label>
            <input type="text" id="apellido_perfil" name="apellido" placeholder="Ingrese sus apellidos" />

            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono_perfil" name="telefono" placeholder="Ingrese su teléfono" />

            <label for="genero">Género:</label>
            <select name="persona" id="genero_perfil">
                <option selected value="">-- Seleccione una opción --</option>
                <option value="1">Hombre</option>
                <option value="0">Mujer</option>
                <option value="2">Otro</option>
            </select>
        <input class="boton" type="submit" value="Guardar Cambios">
    </form>
</div>


<?php 
    include_once __DIR__ . '/footer-user.php'; 

    $script = '
        <script src="/build/js/perfil.js"></script>
    ';    
?>