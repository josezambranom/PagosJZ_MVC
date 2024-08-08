<?php include_once __DIR__ . '/header-inicio.php'; ?>

<div class="contenedor_inicio">
    <h1>Contacto</h1>
    <div class="contacto">
        <form class="formulario" method="POST">
            <fieldset>
                <?php include_once __DIR__ . '/../templates/alertas.php' ?>
                <legend>Contáctenos llenando todos los campos</legend>
                <div class="contenedor-campos">
                    <div class="campo">
                        <label>Nombre</label>
                        <input type="text" name="nombre" placeholder="Escribe tu Nombre" />
                    </div>
                    <div class="campo">
                        <label>Teléfono</label>
                        <input  type="tel" name="telefono" placeholder="Escribe tu Teléfono" />
                    </div>
                    <div class="campo">
                        <label>Correo</label>
                        <input  type="email" name="email" placeholder="Escribe tu Email">
                    </div>
                    <div class="campo">
                        <label>Mensaje</label>
                        <textarea name="mensaje"></textarea>
                    </div>
                </div><!-- .contenedor-campos -->
                <input class="boton" type="submit" value="Enviar">
            </fieldset>
        </form>
    </div>
</div>

<?php include_once __DIR__ . '/footer-inicio.php'; ?>