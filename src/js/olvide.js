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
        email.value = '';
        requestOlvide(emailVal);
    }

    async function requestOlvide(email) {
        const datos = new FormData();
        datos.append('email', email);

        try {
            url = '/usuario/olvide';
            request = await fetch(url, {
                method: 'POST',
                body: datos
            });

            respuesta = await request.json();

            if(respuesta.error) {
                mostrarAlerta('error', '¡Oh no!', respuesta.error);
                return;
            }
            mostrarAlerta('success', 'El email de recuperación se ha enviado con éxito', 'Por favor revise las instrucciones enviadas a su email');

        } catch (error) {
            console.log(error);
        }
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