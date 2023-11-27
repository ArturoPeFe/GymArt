// Función para comprobar si el div está visible
function isElementInViewport(elemento) {
    const rect = elemento.getBoundingClientRect();

    return (
        rect.top >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight)
    );
}

// Función para actualizar la clase del menú-pc
function actualizarClaseMenuPc() {
    const preciosDiv = document.getElementById("precios");
    const inicioLink = document.querySelector("#opcionesMenu a[href='#inicio']");
    const preciosLink = document.querySelector("#opcionesMenu a[href='#precios']");

    if (isElementInViewport(preciosDiv)) {
        inicioLink.classList.remove("pagActiva");
        preciosLink.classList.add("pagActiva");
    } else {
        inicioLink.classList.add("pagActiva");
        preciosLink.classList.remove("pagActiva");
    }
}

// Función para actualizar la clase del menú-móvil
function actualizarClaseMenuMovil() {

    const preciosDiv = document.getElementById("precios");

    const inicioLinkMovil = document.querySelector("#opMM a[href='#inicio']");
    const preciosLinkMovil = document.querySelector("#opMM a[href='#precios']");


    if (isElementInViewport(preciosDiv)) {

        inicioLinkMovil.classList.remove("naranja");
        preciosLinkMovil.classList.add("naranja");

    } else {

        inicioLinkMovil.classList.add("naranja");
        preciosLinkMovil.classList.remove("naranja");
    }
}

// Escuchar eventos de scroll
window.addEventListener("scroll", function () {
    actualizarClaseMenuPc();
    actualizarClaseMenuMovil();
});

// Llamar a la función inicialmente para verificar la clase en la carga de la página
actualizarClaseMenuPc();
actualizarClaseMenuMovil();