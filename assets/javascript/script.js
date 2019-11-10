// Animación Menú
let boton = document.getElementById("menu");
let enlaces = document.getElementById("enlaces");
let contador = 0;

boton.addEventListener("click", function (event) {
    event.preventDefault();
    if (contador == 0) {
        enlaces.className = ("enlaces abierto");
        contador = 1;
    } else {
        enlaces.classList.remove("abierto");
        enlaces.className = ("enlaces cerrado");
        contador = 0;
    }
});

// Botón On / Off música
let cancion = document.getElementsByTagName("audio")[0];
let botonMusica = document.getElementById("botonMusica");
let sonido = false;

botonMusica.addEventListener("click", function () {
    if (!sonido) {
        cancion.play();
        this.innerHTML = "Pause";
        sonido = true;
    } else {
        cancion.pause();
        this.innerHTML = "Play";
        sonido = false;
    }
});