// Obtener el elemento div con id "zonadibujo"
var zonadibujo = document.getElementById("zonadibujo");

// Crear la tabla y asignar la clase "tablerodibujo"
var tabla = document.createElement("table");
tabla.className = "tablerodibujo";

// Crear las filas y celdas de la tabla
for (var i = 0; i < 30; i++) {
    var fila = document.createElement("tr");
    for (var j = 0; j < 30; j++) {
        var celda = document.createElement("td");
        // Agregar event listener a cada celda para pintar cuando el pincel esté activado
        celda.addEventListener("mouseover", pintarCelda);
        fila.appendChild(celda);
    }
    tabla.appendChild(fila);
}

// Agregar la tabla al div
zonadibujo.appendChild(tabla);

function seleccionar() {
    // Obtener todos los elementos con la clase "color" dentro de la tabla de la paleta
    var celdasColorPaleta = document.querySelectorAll("#paleta .color");

    // Recorrer todos los elementos y quitar la clase "seleccionado" de cada uno
    celdasColorPaleta.forEach(function (celda) {
        celda.classList.remove("seleccionado");
    });

    // Agregar la clase "seleccionado" al elemento que llama a la función (el que se hace clic)
    event.target.classList.add("seleccionado");
}

// Función para activar o desactivar el pincel
function activarPincel() {
    var pincel = document.getElementById("pincel");
    if (pincel.textContent === "PINCEL ACTIVADO") {
        pincel.textContent = "PINCEL DESACTIVADO";
    } else {
        pincel.textContent = "PINCEL ACTIVADO";
    }
}

// Función para pintar la celda cuando el pincel esté activado
function pintarCelda(event) {
    // Verificar si el pincel está activado
    var pincel = document.getElementById("pincel");
    if (pincel.textContent === "PINCEL ACTIVADO") {
        // Verificar si hay un color seleccionado en la paleta
        var colorSeleccionado = document.querySelector("#paleta .seleccionado");
        if (colorSeleccionado) {
            // Obtener el color seleccionado
            var color = window.getComputedStyle(colorSeleccionado).backgroundColor;
            // Pintar la celda con el color seleccionado
            event.target.style.backgroundColor = color;
        }
    }
}

// Agregar evento de clic al documento para alternar entre activado y desactivado
document.addEventListener("click", function (event) {
    // Verificar si el clic fue en un color de la paleta
    if (event.target.classList.contains("color")) {
        seleccionar(); // Llamar a la función seleccionar si se hace clic en un color
    } else {
        activarPincel(); // Llamar a la función activarPincel si se hace clic en otro lugar
    }
});
