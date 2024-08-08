(function(){

    const form = document.querySelector('#formlogin');
    form.addEventListener('submit', validarLogin);

    const param = window.location.search ?? false;

    function validarLogin(ev) {
        ev.preventDefault();

        const email = document.querySelector('#email_login');
        const clave = document.querySelector('#clave_login');

        const emailval = email.value.trim();
        const claveval = clave.value.trim();

        if(!emailval || !claveval) {
            mostrarAlerta('warning', '¡Importante!', 'Todos los campos son obligatorios');
            email.value = "";
            clave.value = "";
            return;
        }
        
        email.value = "";
        clave.value = "";
        requestLogin(emailval, claveval);
    }

    async function requestLogin(email, clave) {
        const datos = new FormData();
        datos.append('email', email);
        datos.append('clave', clave);

        try {
            const url = '/usuario/login';
            const respuesta = await fetch(url, {
                method: 'POST',
                body: datos
            });
            const resultado = await respuesta.json();
            // console.log(resultado);

            if(resultado.error) {
                mostrarAlerta('error', '¡Oh no!', resultado.error);
                return;
            }

            if(resultado.tipousuario === '0') {
                if (param && param.length > 1) {
                    window.location.href = `/dashboard/productos${param}`;
                } else {
                    window.location.href = '/dashboard';
                }
            } else {
                window.location.href = '/admin';
            }


        } catch (error) {
            console.log(error);
            mostrarAlerta('error', '¡Oh no!', 'Se ha producido un error interno, comuniquese con el administrador.');
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