(function() {
    const form = document.querySelector('#form_olvide');
    form.addEventListener('submit', validarOlvide);

    function validarOlvide(ev) {
        ev.preventDefault();

        const email = document.querySelector('#email_olvide');
        const emailVal = email.value.trim();

        if(!emailVal) {
            mostrarAlerta('warning', '¡Importante!', 'El email es obligatorio');
            return;
        }
        emailVal = '';
    }

    function mostrarAlerta(tipo, titulo, mensaje){
        Swal.fire({
            icon: tipo,
            title: titulo,
            text: mensaje,
            allowOutsideClick: false
        });
    } 
})();