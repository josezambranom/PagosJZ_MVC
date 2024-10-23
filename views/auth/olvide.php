<div class="contenedor">
    <div class="auth">
        <img src="/build/img/logo.webp" alt="logo">
        <form id="form_olvide" class="formulario" method="POST">
                <label for="email">Email:</label>
                <input type="email" id="email_olvide" name="email" placeholder="&#128100; Ingrese su email" />

            <input class="boton" type="submit" value="Enviar Instrucciones">

        </form>
        <div class="acciones">
            <a href="/registro">¿Aún no tienes una cuenta? Crea una aquí</a>
            <a href="/login">¿Ya tienes una cuenta? Inicia sesión aquí</a>
        </div>

    </div>
</div>

<?php 
    $script = '
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="build/js/olvide.js"></script>
    ';
?>