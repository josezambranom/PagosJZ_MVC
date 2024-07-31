(function(){
    const nombre = document.querySelector('#nombre_perfil');
    const apellido = document.querySelector('#apellido_perfil');
    const telefono = document.querySelector('#telefono_perfil');
    const genero = document.querySelector('#genero_perfil');
    const claveActual = document.querySelector('#clave_actual');
    const claveNueva = document.querySelector('#clave_nueva');

    if(nombre) {
        getUsuario();
    }

    const form = document.querySelector('#form_perfil');

    if(form) {
        form.addEventListener('submit', actualizarDatos);
    }

    const formClave = document.querySelector('#form_clave');
    if(formClave) {
        formClave.addEventListener('submit', cambiarClave);
    }

    async function getUsuario() {
        try {
            const url = '/perfil';
            const request = await fetch(url);
            const respuesta = await request.json();

            nombre.value = respuesta.nombre;
            apellido.value = respuesta.apellido;
            telefono.value = respuesta.telefono;
            genero.value = respuesta.genero;


        } catch (error) {
            console.log(error);
        }
    }

    async function actualizarDatos(ev) {
        ev.preventDefault();
        
        const nombreval = nombre.value.trim();
        const apellidoval = apellido.value.trim();
        const telefonoval = telefono.value.trim();
        const generoval = genero.value.trim();

        if(validarPerfil()) {
            const datos = new FormData();
            datos.append('nombre', nombreval);
            datos.append('apellido', apellidoval);
            datos.append('telefono', telefonoval);
            datos.append('genero', generoval);

            try {
                const url = '/perfil';
                const request = await fetch(url, {
                    method: 'POST',
                    body: datos
                });

                const respuesta = await request.json();
                if(respuesta.respuesta) {
                    mostrarAlerta('success', 'Actualizado con éxito', 'Sus datos se actualizaron correctamente');
                }

            } catch (error) {
                console.log(error);
                mostrarAlerta('error', '¡Oh no!', 'Se ha producido un error interno, comuniquese con el administrador.');
            }
        }

    }

    async function cambiarClave(ev) {
        ev.preventDefault();
        
        const claveActualVal = claveActual.value.trim();
        const claveNuevaVal = claveNueva.value.trim();

        if(validarClave()) {
            const datos = new FormData();
            datos.append('clave_actual', claveActualVal);
            datos.append('clave_nueva', claveNuevaVal);

            try {
                const url = '/cambiar-clave';
                const request = await fetch(url, {
                    method: 'POST',
                    body: datos
                });

                const respuesta = await request.json();
                console.log(respuesta);

                if(respuesta.respuesta) {
                    mostrarAlerta('success', 'Actualizado con éxito', 'Su clave se actualizó correctamente');
                    claveActual.value = '';
                    claveNueva.value = '';
                } else {
                    mostrarAlerta('error', '¡Oh no!', respuesta.error);
                }

            } catch (error) {
                console.log(error);
                mostrarAlerta('error', '¡Oh no!', 'Se ha producido un error interno, comuniquese con el administrador.');
                claveActual.value = '';
                claveNueva.value = '';
            }
        }
    }

    function validarClave() {
        const claveActualVal = claveActual.value.trim();
        const claveNuevaVal = claveNueva.value.trim();

        if(!claveActualVal) {
            mostrarAlerta('warning', '¡Importante!', 'La clave actual es obligatoria');
            claveActual.value = '';
            claveNueva.value = '';
            return;
        }
        if(!claveNuevaVal) {
            mostrarAlerta('warning', '¡Importante!', 'La clave nueva es obligatoria');
            claveNueva.value = '';
            claveActual.value = '';
            return;
        }

        if(claveNuevaVal.length < 6) {
            mostrarAlerta('error', '¡Oh no!', 'La clave nueva debe contener al menos 6 carácteres');
            claveNueva.value = '';
            claveActual.value = '';
            return;
        }

        return true;
    }

    function validarPerfil() {
        const nombreval = nombre.value.trim();
        const apellidoval = apellido.value.trim();
        const telefonoval = telefono.value.trim();
        const generoval = genero.value.trim();

        if(!nombreval || !apellidoval || !telefonoval || generoval === '') {
            mostrarAlerta('warning', '¡Importante!', 'Todos los campos son obligatorios');
            return;
        } 
        if (telefono.length < 10) {
            mostrarAlerta('error', '¡Oh no!', 'El teléfono debe contener al menos 10 carácteres');
            return;
        }
        return true;
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