<div class="barra">
    <img class="barra_menu" src="/build/img/menu.webp" alt="icono menú">
    <div class="opciones_usuario">
        <div class="saldo">
                <p><span>Saldo: </span> $ 0.00</p>
        </div>
        <div class="perfil">
            <img class="perfil_img" id="perfil_img" src="/build/img/usuario.webp" alt="icono usuario">
            <div class="opciones_perfil">
                <div class="datos">
                    <p class="usuario"><?php echo $nombre ?? ''; ?></p>
                    <p class="tipo"><?php echo ($tipousuario === '0') ? 'Cliente' : 'Administrador'  ;?></p>
                </div>
                <ul>
                    <li><a href="/dashboard/perfil">Mi Perfil</a></li>
                    <li><a href="/logout">Cerrar Sesión</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>