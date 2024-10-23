<?php include_once __DIR__ . '/header-inicio.php'; ?>

<div class="contenedor_inicio">
    <h1>Contacto</h1>
    <div class="contacto">
        <form class="formulario" method="POST">
            <fieldset>
                <?php include_once __DIR__ . '/../templates/alertas.php' ?>
                <legend>Contáctenos llenando todos los campos</legend>

                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" placeholder="Escribe tu Nombre" />
                <label for="telefono">Teléfono</label>
                <input  type="tel" name="telefono" placeholder="Escribe tu Teléfono" />
                <label for="email">Correo</label>
                <input  type="email" name="email" placeholder="Escribe tu Email">
                <label for="mensaje">Mensaje</label>
                <textarea name="mensaje"></textarea>

                <input class="boton" type="submit" value="Enviar">
            </fieldset>
        </form>
    </div>
</div>

<?php include_once __DIR__ . '/footer-inicio.php'; ?>