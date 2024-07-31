(function() {    
    const form = document.querySelector('#form_registro');
    form.addEventListener('submit', validarRegistro);

    function validarRegistro(ev) {
        ev.preventDefault();


        const nombre = document.querySelector('#nombre_registro');
        const apellido = document.querySelector('#apellido_registro');
        const telefono = document.querySelector('#telefono_registro');
        const genero = document.querySelector('#genero_registro');
        const email = document.querySelector('#email_registro');
        const clave = document.querySelector('#clave_registro');

        const nombreval = nombre.value.trim();
        const apellidoval = apellido.value.trim();
        const telefonoval = telefono.value.trim();
        const generoval = genero.value.trim();
        const emailval = email.value.trim();
        const claveval = clave.value.trim();

        if(!nombreval || !apellidoval || !telefonoval || generoval === '' || !emailval || !claveval) {
            mostrarAlerta('warning', '¡Importante!', 'Todos los campos son obligatorios');
            clave.value = "";
            return;
        } 
        if (telefono.length < 10) {
            mostrarAlerta('error', '¡Oh no!', 'El teléfono debe contener al menos 10 carácteres');
            clave.value = "";
            return;
        }
        if(clave.length < 6) {
            mostrarAlerta('error', '¡Oh no!', 'La clave debe contener al menos 6 carácteres');
            clave.value = "";
            return;
        } 

        nombre.value = "";
        apellido.value = "";
        telefono.value = "";
        genero.value = "";
        email.value = "";
        clave.value = "";

        requestRegistro(nombreval, apellidoval, telefonoval, generoval, emailval, claveval);
    }

    async function requestRegistro(nombre, apellido, telefono, genero, email, clave) {
        datos = new FormData();
        datos.append('nombre', nombre);
        datos.append('apellido', apellido);
        datos.append('telefono', telefono);
        datos.append('genero', genero);
        datos.append('email', email);
        datos.append('clave', clave);

        try {
            url = '/usuario/registro';
            respuesta = await fetch(url, {
                method: 'POST',
                body: datos
            });
            resultado = await respuesta.json();
            console.log(resultado);

            if(resultado.error) {
                mostrarAlerta('error', '¡Oh no!', resultado.error);
                return;
            }

            mostrarAlerta('success', 'Usuario registrado correctamente', 'Por favor verifique su cuenta ingresando a su email');

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