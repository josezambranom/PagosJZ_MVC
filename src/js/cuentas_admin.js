(function(){
    let cuentas = [];
    let plataformas = [];
    let usuarios = [];

    getCuentas();

    async function getCuentas() {
        try {
            const url = '/cuentas';
            const respuesta = await fetch(url);
            const resultado = await respuesta.json();

            console.log(resultado);
            
            cuentas = resultado.cuentas.sort((a, b) => {
                if (a.fecha.toLowerCase() < b.fecha.toLowerCase()) return -1;
                if (a.fecha.toLowerCase() > b.fecha.toLowerCase()) return 1;
                return 0;
            });

            plataformas = resultado.plataformas;
            usuarios = resultado.usuarios;

            mostrarCuentas();

        } catch (error) {
            console.log(error);
        }
    }

    function mostrarCuentas() {
        const tbody = document.querySelector('#tbody');
        
        if(cuentas.length === 0) {
            const cont = document.querySelector('.cuentas');
            const p = document.createElement('P');
            p.textContent = 'Aún no ha creado cuentas';
            p.classList.add('no-cuentas');
            cont.appendChild(p);
            return;
        }

        let i = 0;
        cuentas.forEach(cuenta => {
            const contenedorCuentas = document.createElement('TR');

            const usuario = document.createElement('TD');
            const clave = document.createElement('TD');
            const pin = document.createElement('TD');
            const perfil = document.createElement('TD');
            const estado = document.createElement('TD');
            const fecha = document.createElement('TD');
            const vigencia = document.createElement('TD');
            const cliente = document.createElement('TD');
            const plataforma = document.createElement('TD');

            usuario.textContent = cuenta.usuario;
            clave.textContent = cuenta.clave;
            pin.textContent = (cuenta.pin !== '') ? cuenta.pin : 'No Aplica';
            perfil.textContent = (cuenta.perfil !== '5') ? 'Perfil ' + cuenta.perfil : 'Cuenta Completa';
            estado.textContent = (cuenta.estado === '1') ? 'Activa' : 'Inactiva';
            fecha.textContent = cuenta.fecha;
            vigencia.textContent = cuenta.vigencia;
            cliente.textContent = usuarios.find(u => u.id === cuenta.usuarioid)?.email || cuenta.usuarioid;
            plataforma.textContent = plataformas.find(p => p.id === cuenta.plataformaid)?.plataforma || cuenta.plataformaid;            

            contenedorCuentas.appendChild(usuario);
            contenedorCuentas.appendChild(clave);
            contenedorCuentas.appendChild(pin);
            contenedorCuentas.appendChild(perfil);
            contenedorCuentas.appendChild(estado);
            contenedorCuentas.appendChild(fecha);
            contenedorCuentas.appendChild(vigencia);
            contenedorCuentas.appendChild(cliente);
            contenedorCuentas.appendChild(plataforma);

            tbody.appendChild(contenedorCuentas);
            i++;
        });
    }
}())