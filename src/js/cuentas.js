(function(){
    let cuentas = [];
    let plataformas = [];
    getCuentas();

    async function getCuentas() {
        try {
            url = '/cuentas';
            respuesta = await fetch(url);
            resultado = await respuesta.json();

            if(resultado.error) {
                return;
            }
            
            console.log(resultado);
            cuentas = resultado.cuentas;
            plataformas = resultado.plataformas;
            mostrarCuentas();

        } catch (error) {
            console.log(error);
        }
    }


    function mostrarCuentas() {
        const tbody = document.querySelector('#tbody');
        const categoryMap = {
            '1': { name: 'streaming'},
            '2': { name: 'videojuegos'},
            '3': { name: 'recargas'}
        };

        cuentas.forEach(cuenta => {

            const tr = document.createElement('TR');

            const plataformaCont = document.createElement('TD');
            const plataformaContImg = document.createElement('TD');
            const precio = document.createElement('TD');

            plataformas.forEach(plataforma => {
                const category = categoryMap[plataforma.categoria];
                if(plataforma.id === cuenta.plataformaid) {
                    const imgPlataforma = document.createElement('IMG');
                    imgPlataforma.src = `/imagenes/${category.name}/${plataforma.imagen}`;
                    imgPlataforma.classList.add('plataforma-img');
                    plataformaContImg.appendChild(imgPlataforma);

                    plataformaCont.textContent = plataforma.plataforma;
                    plataformaCont.classList.add('plataforma');

                    precio.textContent = `$ ${plataforma.precio}`;

                    tr.appendChild(plataformaContImg);
                    tr.appendChild(plataformaCont);
                    tr.appendChild(precio);
                }
            });

            const usuario = document.createElement('TD');
            usuario.classList.add('usuario');
            usuario.textContent = cuenta.usuario;

            const clave = document.createElement('TD');
            clave.textContent = cuenta.clave;

            const perfil = document.createElement('TD');
            perfil.classList.add('perfil')
            if(cuenta.perfil != '5') {
                perfil.textContent = cuenta.perfil;
            } else {
                perfil.textContent = 'Cuenta Completa';
            }

            const pin = document.createElement('TD');
            pin.classList.add('pin');
            if(cuenta.pin != '') {
                pin.textContent = cuenta.pin;
            } else {
                pin.textContent = 'No aplica';
            }

            const fecha = document.createElement('TD');
            fecha.classList.add('fecha');
            fecha.textContent = cuenta.fecha;

            tr.appendChild(usuario);
            tr.appendChild(clave);
            tr.appendChild(perfil);
            tr.appendChild(pin);
            tr.appendChild(fecha);

            tbody.appendChild(tr);
        });
    }

})();