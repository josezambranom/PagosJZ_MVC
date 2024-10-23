<div class="contenedor">
    <div class="registro">
        <div class="registro_imagen">
            <img src="/build/img/logo.webp" alt="imagen logo">
        </div>
        <div class="registro_contenido">
            <h1 class="nombre-pagina">Registro</h1>
            <p class="descripcion-pagina">Complete los campos a continuación</p>

            <form id="form_registro" action="/registro" class="formulario" method="POST">
                <label for="nombre">Nombres:</label>
                <input type="text" id="nombre_registro" name="nombre" placeholder="Ingrese sus nombres" />

                <label for="apellido">Apellidos:</label>
                <input type="text" id="apellido_registro" name="apellido" placeholder="Ingrese sus apellidos" />

                <label for="telefono">Teléfono:</label>
                <input type="text" id="telefono_registro" name="telefono" placeholder="Ingrese su teléfono" />

                <label for="genero">Género:</label>
                <select name="persona" id="genero_registro">
                    <option selected value="">-- Seleccione una opción --</option>
                    <option value="1">Hombre</option>
                    <option value="0">Mujer</option>
                    <option value="2">Otro</option>
                </select>

                <label for="email">Email:</label>
                <input type="email" id="email_registro" name="email" placeholder="Ingrese su email" />

                <label for="password">Password:</label>
                <input type="password" id="clave_registro" name="password" placeholder="Ingrese su password" />

                <input class="boton" type="submit" value="Registrarme">

            </form>

            <div class="acciones">
                <a href="/login">¿Ya tienes una cuenta? Inicia sesión aquí</a>
                <a href="/olvide">¿Olvidaste tu clave?</a>
            </div>
        </div>
    </div>
</div>

<?php 
    $script = '
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="build/js/registro.js"></script>
    ';
?>