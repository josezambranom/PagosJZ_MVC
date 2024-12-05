(function(){
    const form = document.querySelector('#form_plataforma');
    form.addEventListener('submit', validarForm);

    const queryParam = window.location.search ?? false;
    let idUrl = '';
    if (queryParam && queryParam.length > 1) {
        const urlParam = new URLSearchParams(queryParam);
        idUrl = urlParam.get('id');
        rellenarForm(idUrl);
    }

    async function rellenarForm(id) {
        const url = '/plataforma/productos';
        const imgContainer = document.querySelector('.img_form');
        const categoryMap = {
            '1': { name: 'streaming'},
            '2': { name: 'videojuegos'},
            '3': { name: 'recargas'}
        };
        try {
            respuesta = await fetch(url);
            resultado = await respuesta.json();

            resultado.forEach(plataforma => {
                if(plataforma.id === id) {
                    const category = categoryMap[plataforma.categoria];

                    document.querySelector('#plataforma').value = plataforma.plataforma;
                    document.querySelector('#precio').value = plataforma.precio;
                    document.querySelector('#estado').value = plataforma.estado;
                    document.querySelector('#categoria').value = plataforma.categoria;

                    const img = document.createElement('img');
                    img.src = `/imagenes/${category.name}/${plataforma.imagen}`;
                    img.classList.add('form-img');
                    img.alt = plataforma.plataforma;
                    imgContainer.appendChild(img);
                }
            });

        } catch (error) {
            console.log(error);
            
        }

    }

    function validarForm(ev) {
        ev.preventDefault();

        const plataforma = document.querySelector('#plataforma');
        const precio = document.querySelector('#precio');
        const estado = document.querySelector('#estado');
        const categoria = document.querySelector('#categoria');
        const imagen = document.querySelector('#imagen');

        const plataformaVal = plataforma.value.trim();
        const precioVal = precio.value.trim();
        const estadoVal = estado.value;
        const categoriaVal = categoria.value;
        const imagenVal = imagen.files[0];

        if(!plataformaVal || !precioVal || !estadoVal || !categoriaVal || (!idUrl) ? !imagenVal : '') {
            mostrarAlerta('warning', '¡Importante!', 'Todos los campos son obligatorios');
            return;
        }

        const regex = /^-?\d*\.?\d+$/; // Expresión regular para números enteros o decimales

        if (!regex.test(precioVal)) {
            mostrarAlerta('error', '¡Oh no!', 'El formato del precio es incorrecto. Debe ser un número válido (entero o decimal)');
            precio.value = "";  // Limpiar el campo de precio
            return;
        }

        //console.log(imagenVal);

        plataforma.value = "";
        precio.value = "";
        estado.value = "";
        categoria.value = "";
        imagen.value = "";

        requestPlataformas(plataformaVal, precioVal, estadoVal, categoriaVal, imagenVal);
    }

    async function requestPlataformas(plataforma, precio, estado, categoria, imagen) {
        datos = new FormData();
        datos.append('plataforma', plataforma);
        datos.append('precio', precio);
        datos.append('estado', estado);
        datos.append('categoria', categoria);
        (imagen) ? datos.append('imagen', imagen) : '';

        let url = '', msg = '', red = false;

        if(idUrl) {
            datos.append('id', idUrl);
            url = '/plataforma/actualizar';
            msg = 'Plataforma actualizada con éxito';
            red = true;
        } else {
            url = '/plataforma/crear';
            msg = 'La plataforma se ha creado con éxito';
        }

        try {
            respuesta = await fetch(url, {
                method: 'POST',
                body: datos
            });
            resultado = await respuesta.json();

            if(resultado.error) {
                mostrarAlerta('error', '¡Oh no!', resultado.error);
                return;
            }

            mostrarAlerta('success', '¡Bien hecho!', msg, red, '/admin/plataformas');

        } catch (error) {
            mostrarAlerta('error', '¡Oh no!', 'Ocurrió un error al procesar esta solicitud');
            console.log(error);
        }
    }

    function mostrarAlerta(tipo, titulo, mensaje, redireccionar = false, ruta = '') {
        Swal.fire({
            icon: tipo,
            title: titulo,
            text: mensaje,
            allowOutsideClick: false
        }).then((result) => {
            if(result.isConfirmed) {
                if(redireccionar) {
                    window.location.href = ruta;
                }
            }
        });
    }
})();