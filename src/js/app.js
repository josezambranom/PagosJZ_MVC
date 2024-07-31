document.addEventListener('DOMContentLoaded', function(){
    iniciarApp();
});


function iniciarApp() {
    mostrarSidebarInicio();
    botonSubir();
    infoUser();
    ocultarSidebarDashboard();
}


function mostrarSidebarInicio() {
    const btnMenu = document.querySelector('#menu');
    const sidebar = document.querySelector('.sidebar');

    if(btnMenu) {
        btnMenu.addEventListener('click', function(){
            sidebar.classList.toggle('mostrar');
        });  
        
        // Elimina la clase de mostrar en un tamaño de tablet y mayores
        const anchoPantalla = document.body.clientWidth;
        window.addEventListener('resize', function() {
            const anchoPantalla = document.body.clientWidth;
            if(anchoPantalla >= 920) {
                sidebar.classList.remove('mostrar');
            }
        });
    }
}

function botonSubir() {
    const botonIrArriba = document.querySelector(".ir-arriba-btn");
    const principal = document.querySelector('.principal');

    // Determina si usar el elemento principal o la ventana
    const scrollTarget = principal || window;

    // Agrega el evento de desplazamiento al objetivo de desplazamiento
    scrollTarget.addEventListener("scroll", function() {
        // Usa scrollY si es el window, o scrollTop si es el elemento principal
        const scrollPosition = (scrollTarget === window) ? window.scrollY : principal.scrollTop;
        
        // Verifica si la página se ha desplazado más de 20px
        if (scrollPosition > 20) {
            botonIrArriba.style.display = "block"; // Muestra el botón
        } else {
            botonIrArriba.style.display = "none"; // Oculta el botón
        }
    });

    // Función para desplazar hacia arriba suavemente
    botonIrArriba.addEventListener("click", function() {
        if (scrollTarget === window) {
            window.scrollTo({top: 0, behavior: 'smooth'});
        } else {
            principal.scrollTo({top: 0, behavior: 'smooth'});
        }
    });
}



// Dashboard
function infoUser() {
    const imgPerfil = document.querySelector('#perfil_img');
    const opcionesPerfil = document.querySelector('.opciones_perfil');
    if(imgPerfil) {
        imgPerfil.addEventListener('click', function(){
            opcionesPerfil.classList.toggle('mostrar');
        });
    }
}

function ocultarSidebarDashboard() {
    const barra = document.querySelector('.barra')
    const barraMenu = document.querySelector('.barra_menu');
    const sidebarDashboard = document.querySelector('.sidebar_dashboard');
    const principal = document.querySelector('.principal');
    if(barraMenu) {
        barraMenu.addEventListener('click', function() {
            sidebarDashboard.classList.toggle('ocultar');
            principal.classList.toggle('recorrer');
            barra.classList.toggle('sidebarOculto');
        });
    }
}
  