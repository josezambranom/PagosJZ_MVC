<div class="contenedor">
    <div class="auth">
        <img src="/build/img/logo.webp" alt="logo">
        <form id="formlogin" class="formulario" method="POST">            
            <div class="campo">
                <label for="email">Email:</label>
                <input type="email" id="email_login" name="email" placeholder="&#128100; Ingrese su email" />
            </div>

            <div class="campo">
                <label for="password">Clave:</label>
                <input type="password" id="clave_login" name="clave" placeholder="&#128274; Ingrese su clave" />
            </div>

            <input class="boton" type="submit" value="Iniciar Sesión">

        </form>
        <div class="acciones">
            <a href="/registro">¿Aún no tienes una cuenta? Crea una aquí</a>
            <a href="/olvide">¿Olvidaste tu clave?</a>
        </div>
    </div>
</div>

<?php 
    $script = '
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="build/js/login.js"></script>
    ';
?>