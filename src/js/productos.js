(function() {
    let productos = [];
    let productosFiltrados = [];
    getProductos();

    const buscarProducto = document.querySelector('#buscar');
    buscarProducto.addEventListener('input', filtrarProducto);

    const param = window.location.search;

    function filtrarProducto(ev) {
        const filtro = ev.target.value.toLowerCase();
        if (filtro !== '') {
            productosFiltrados = productos.filter(producto => 
                producto.plataforma.toLowerCase().includes(filtro));
        } else {
            productosFiltrados = [];
        }
        mostrarProductos();
    }

    async function getProductos() {        
        try {
            const url = '/plataforma/productos';
            const respuesta = await fetch(url);
            const resultado = await respuesta.json();
            
            // Ordenar productos de forma alfabética por la propiedad 'plataforma'
            productos = resultado.sort((a, b) => {
                if (a.plataforma.toLowerCase() < b.plataforma.toLowerCase()) return -1;
                if (a.plataforma.toLowerCase() > b.plataforma.toLowerCase()) return 1;
                return 0;
            });
            
            productosFiltrados = productos; // Inicializar productosFiltrados con todos los productos
            mostrarProductos();

            if (param && param.length > 1) {
                const urlParam = new URLSearchParams(param);
                const idUrl = urlParam.get('id');
                comprar(idUrl);
            }

        } catch (error) {
            console.log(error);
        }
    }

    function mostrarProductos() {
        // Inicializar contadores de productos por categoría
        const productCounters = {
            streaming: 0,
            videojuegos: 0,
            recargas: 0
        };
    
        // Obtener referencias a los contenedores y contadores del DOM
        const numStreaming = document.querySelector('#num_streaming');
        const numVideo = document.querySelector('#num_video');
        const numRecarga = document.querySelector('#num_recarga');
        const contenedorStreaming = document.querySelector('.streaming_contenido');
        const contenedorVideojuegos = document.querySelector('.videojuegos_contenido');
        const contenedorRecargas = document.querySelector('.recargas_contenido');
    
        // Vaciar los contenedores antes de llenarlos nuevamente
        contenedorStreaming.innerHTML = '';
        contenedorVideojuegos.innerHTML = '';
        contenedorRecargas.innerHTML = '';
    
        // Mapeo de categorías para facilitar la selección
        const categoryMap = {
            '1': { name: 'streaming', container: contenedorStreaming, counter: numStreaming },
            '2': { name: 'videojuegos', container: contenedorVideojuegos, counter: numVideo },
            '3': { name: 'recargas', container: contenedorRecargas, counter: numRecarga }
        };
    
        // Iterar sobre los productos filtrados y construir los elementos del DOM
        const arrayProductos = productosFiltrados.length ? productosFiltrados : productos;

        arrayProductos.forEach(element => {
            const category = categoryMap[element['categoria']];
            
            if (!category) {
                console.error('Categoría no reconocida:', element['categoria']);
                return;
            }

            if(element.estado !== '0') {
        
                // Crear el contenedor del producto
                const producto = document.createElement('div');
                producto.classList.add('producto');
        
                // Crear y configurar la imagen del producto
                const imgProducto = document.createElement('img');
                imgProducto.src = `/imagenes/${category.name}/${element['imagen']}`;
                imgProducto.classList.add('producto__imagen');
                imgProducto.loading = 'lazy';
                imgProducto.alt = element['plataforma'];
        
                // Crear y configurar el nombre del producto
                const nombreProducto = document.createElement('p');
                nombreProducto.textContent = element['plataforma'];
                nombreProducto.classList.add('producto__nombre');
        
                // Crear y configurar el precio del producto
                const precioProducto = document.createElement('p');
                precioProducto.textContent = `$ ${element['precio']}`;
                precioProducto.classList.add('producto__precio');
        
                const btnComprar = document.createElement('BUTTON');
                btnComprar.classList.add('boton');
                btnComprar.textContent = "Comprar";
                btnComprar.onclick = function(){
                    console.log(element.id);
                    comprar(element.id);
                }

                // Añadir los elementos al contenedor del producto
                producto.appendChild(imgProducto);
                producto.appendChild(nombreProducto);
                producto.appendChild(precioProducto);
                producto.appendChild(btnComprar);
        
                // Añadir el producto al contenedor correspondiente y actualizar el contador
                category.container.appendChild(producto);
                productCounters[category.name]++;
            }
        });     

        // Actualizar los contadores de productos
        numStreaming.textContent = productCounters.streaming;
        numVideo.textContent = productCounters.videojuegos;
        numRecarga.textContent = productCounters.recargas;
    }

    function comprar(id) {
        const producto = productos.filter(producto => producto.id === id);
        const plataforma = producto[0];
        const saldo = 0;

        if(window.location.pathname === '/productos') {
            Swal.fire({
                title: "¡Atención!",
                text: "Para continuar con su proceso de compra usted deberá seleccionar si desea hacerlo" +
                " desde nuestra plataforma o mediante WhatsApp",
                icon: "info",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#269200",
                confirmButtonText: "Comprar en plataforma",
                cancelButtonText: "Comprar por WhatsApp",
                allowOutsideClick: false
              }).then((result) => {
                if (result.isConfirmed) {
                  Swal.fire({
                    title: "¡Atención!",
                    text: "A continuación deberá iniciar sesión para continuar con su compra",
                    icon: "info",
                    cancelButtonColor: "#d33",
                    confirmButtonText: 'Ir a inicio de sesión',
                    showCancelButton: true,
                    cancelButtonText: 'Cancelar',
                    allowOutsideClick: false
                  }).then((result) => {
                    if(result.isConfirmed) {
                        window.location.href = `/login?id=${id}`;
                    }
                  });
                } else {
                    Swal.fire({
                        title: "¡Atención!",
                        text: `Usted va a adquirir ${plataforma.plataforma} por el valor de $ ${plataforma.precio}, a continuación será redireccionado a WhatsApp para continuar con su compra`,
                        icon: "info",
                        confirmButtonColor: "#269200",
                        cancelButtonColor: "#d33",
                        confirmButtonText: 'Ir a WhatsApp',
                        showCancelButton: true,
                        cancelButtonText: 'Cancelar',
                        allowOutsideClick: false
                    }).then((result) => {
                        if(result.isConfirmed) {
                            const cel = '593963177642';
                            const msg = encodeURIComponent(`¡Hola! 👋🏼😄 \n\n` + 
                                `Estoy comprando desde la tienda online, deseo adquirir *${plataforma.plataforma}*.\n\n` + 
                                `*Nota:* El valor de mi compra es de *$ ${plataforma.precio}*`);
                            const url = `https://wa.me/${cel}?text=${msg}`;
                            window.open(url);
                        }
                    });
                }
              });
        } else {
            Swal.fire({
                title: "Confirmación de compra",
                text: `Usted va a adquirir ${plataforma.plataforma} por el valor de $ ${plataforma.precio}`,
                icon: "info",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Confirmar",
                cancelButtonText: 'Cancelar',
                allowOutsideClick: false
              }).then((result) => {
                if (result.isConfirmed) {
                    if(saldo > plataforma.precio) {
                        Swal.fire({
                            title: "Compra realizada",
                            text: "Su compra se ha realizado con éxito",
                            icon: "success",
                            cancelButtonColor: "#d33",
                            confirmButtonText: 'Ir a mis cuentas',
                            showCancelButton: true,
                            cancelButtonText: 'Cancelar',
                            allowOutsideClick: false
                        }).then(result => {
                            if(result.isConfirmed) {
                                window.location.href = '/dashboard/cuentas';
                            }
                        }); 
                    } else {
                        // Swal.fire({
                        //     title: "¡Oh no!",
                        //     text: "Su saldo es insuficiente",
                        //     icon: "error",
                        //     cancelButtonColor: "#d33",
                        //     confirmButtonText: 'Cargar Saldo',
                        //     showCancelButton: true,
                        //     cancelButtonText: 'Cancelar',
                        //     allowOutsideClick: false
                        // }).then(result => {
                        //     if(result.isConfirmed) window.location.href = '/dashboard/acreditaciones';
                        // });
                        
                        Swal.fire({
                            title: "¡Atención!",
                            text: "Funcionalidad no disponible, proximamente podrá realizar compras con su saldo. Por favor, realice su compra mediante WhatsApp",
                            icon: "info",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: 'Ir a WhatsApp',
                            cancelButtonText: 'Cancelar',
                            allowOutsideClick: false
                        }).then((result) => {
                            if(result.isConfirmed) {
                                const cel = '593963177642';
                                const msg = encodeURIComponent(`¡Hola! 👋🏼😄 \n\n` + 
                                    `Estoy comprando desde la tienda online, deseo adquirir *${plataforma.plataforma}*.\n\n` + 
                                    `*Nota:* El valor de mi compra es de *$ ${plataforma.precio}*`);
                                const url = `https://wa.me/${cel}?text=${msg}`;
                                window.open(url);
                            }
                        });
                    }
                }
              });
        }
    }

})();

document.addEventListener('DOMContentLoaded', () => {
    const scrollButtons = [
        { id: '#streaming', target: '.streaming' },
        { id: '#videojuegos', target: '.videojuegos' },
        { id: '#recargas', target: '.recargas' }
    ];

    scrollButtons.forEach(({ id, target }) => {
        document.querySelector(id).addEventListener('click', () => smoothScrollTo(target));
    });

    function smoothScrollTo(selector) {
        const targetElement = document.querySelector(selector);
        const container = document.querySelector('.principal');

        if (targetElement) {
            const scrollOptions = { top: targetElement.offsetTop, behavior: 'smooth' };
            container ? container.scrollTo(scrollOptions) : targetElement.scrollIntoView(scrollOptions);
        }
    }
});


