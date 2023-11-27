//Para cerrar menú desplegable en móvil si se pulsa Inicio, Precios o Valoraciones
window.addEventListener("load", function () {
    const a = document.getElementById("bInicio");
    const b = document.getElementById("bPrecios");
    const c = document.getElementById("bValoraciones");
    const d = document.getElementById('cerrarMenu');

    a.addEventListener("click", function () {
        d.click();
    });

    b.addEventListener("click", function () {
        d.click();
    });

    c.addEventListener("click", function () {
        d.click();
    });
});