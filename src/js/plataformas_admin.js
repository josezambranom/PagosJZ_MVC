(function(){
    let plataformas = [];
    getPlataformas();

    async function getPlataformas() {        
        try {
            const url = '/plataforma/productos';
            const respuesta = await fetch(url);
            const resultado = await respuesta.json();
            
            plataformas = resultado.sort((a, b) => {
                if (a.plataforma.toLowerCase() < b.plataforma.toLowerCase()) return -1;
                if (a.plataforma.toLowerCase() > b.plataforma.toLowerCase()) return 1;
                return 0;
            });
            
            mostrarPlataformas();

        } catch (error) {
            console.log(error);
        }
    }

    function mostrarPlataformas() {    
        const tbody = document.querySelector('#tbody');
        const categoryMap = {
            '1': { name: 'streaming'},
            '2': { name: 'videojuegos'},
            '3': { name: 'recargas'}
        };


        if(plataformas.length === 0) {
            const cont = document.querySelector('.plataformas');
            const p = document.createElement('P');
            p.textContent = 'Aún no ha creado plataformas';
            p.classList.add('no-plataformas');
            cont.appendChild(p);
            return;
        }
        
        plataformas.forEach(plataforma => {
            const category = categoryMap[plataforma.categoria];
            const contenedorPlataformas = document.createElement('TR');

            const imagen = document.createElement('IMG');
            const tdimagen = document.createElement('TD');
            const nombre = document.createElement('TD');
            const precio = document.createElement('TD');
            const estado = document.createElement('TD');
            const categoria = document.createElement('TD');
            const btnContainer = document.createElement('TD');
            const btnEditar = document.createElement('BUTTON');

            imagen.src = `/imagenes/${category.name}/${plataforma.imagen}`;
            imagen.classList.add('plataforma-img');
            imagen.alt = plataforma.plataforma;
            tdimagen.appendChild(imagen);

            nombre.textContent = plataforma.plataforma;

            precio.textContent = `$ ${plataforma.precio}`;

            if(plataforma.estado === '1') {
                estado.textContent = 'Disponible';
            } else {            
                estado.textContent = 'Agotado';
            }

            categoria.textContent = category.name;

            btnEditar.textContent = 'Editar';
            btnEditar.classList.add('boton');
            btnEditar.onclick = () => {
                window.location.href = `/admin/plataformas/actualizar?id=${plataforma.id}`;
            };


            btnContainer.appendChild(btnEditar);

            contenedorPlataformas.appendChild(tdimagen);
            contenedorPlataformas.appendChild(nombre);
            contenedorPlataformas.appendChild(precio);
            contenedorPlataformas.appendChild(estado);
            contenedorPlataformas.appendChild(categoria);
            contenedorPlataformas.appendChild(btnContainer);
            
            tbody.appendChild(contenedorPlataformas);
        });        
    }
})();