<div class="contenedor">
    <div class="auth">
        <img src="/build/img/logo.webp" alt="logo">
        <form id="form_recuperar" class="formulario" method="POST"> 
            <?php 
                include_once __DIR__ . '/../templates/alertas.php';
                if($mostrar):
            ?>           
            <div class="campo">
                <label for="password">Nueva Clave:</label>
                <input type="password" id="clave_recuperar" name="clave" placeholder="&#128274; Ingrese su nueva clave" />
            </div>

            <input class="boton" type="submit" value="Cambiar clave">
            <?php endif; ?>
        </form>
        <div class="acciones">
            <a href="/login">Iniciar Sesión</a>
        </div>
    </div>
</div>