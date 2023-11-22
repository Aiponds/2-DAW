var texto = document.getElementById('texto');
var button = document.getElementById('btnSubmit');

button.addEventListener("click", function () {
    if (document.getElementById('lepero').checked) {
        creaHistoriaLepero();
    } else {
        creaHistoriaMurciano();
    }
}, false);

function creaHistoriaMurciano() {
    texto.innerHTML = "";
    var nombre = document.getElementById('nombre').value.toString();
    var historiasMurciano = [
        "En Murcia las naranjas siempre han sido muy baratas, pero ahora le parecen muy caras.",
        "La ciudad se llena siempre en verano, pero en invierno es un desierto",
        "" + nombre + " visitaba a su abuela, ella siempre le hacía buena comida",
        "La Juventud lo dejó deprimido y ahora " + nombre + " solo tiene a su peluche",
        "No tenía ganas de hacer deporte así que " + nombre + " engordó hasta el límite.",
        "Los donuts eran su debilidad, pero últimamente estaban comportándose de forma extraña.",
        "" + nombre + " antes era calvo, pero se hizo un injerto capilar."
    ];
    while (historiasMurciano.length > 0) {
        var nAleatorio = Math.round(Math.random() * historiasMurciano.length - 1);
        if (historiasMurciano[nAleatorio] == undefined) {
            nAleatorio = Math.round(Math.random() * historiasMurciano.length - 1);
        } else {
            texto.innerHTML += historiasMurciano[nAleatorio];
            historiasMurciano.splice(nAleatorio, 1);
        }
    }
}

function creaHistoriaLepero() {
    texto.innerHTML = "";
    var nombre = document.getElementById('nombre').value.toString();

    var historiasLepero = [
        "En Lepe las flores se marchitan en Primavera, así que no había excusa.",
        "" + nombre + " era una persona modesta que conducía un Ford Ka.",
        "Cada semana " + nombre + " visitaba a sus padres.",
        "Cualquiera lo hubiera adivinado.",
        "Llovía fuerte aquella noche y " + nombre + " no podía dejar de pensar en los campos de fresas.",
        "A " + nombre + " no le gustaba la informática."
    ];
    while (historiasLepero.length > 0) {
        var nAleatorio = Math.round(Math.random() * historiasLepero.length - 1);

        if (historiasLepero[nAleatorio] == undefined) {
            nAleatorio = Math.round(Math.random() * historiasLepero.length - 1);
        } else {
            texto.innerHTML += historiasLepero[nAleatorio];
            historiasLepero.splice(nAleatorio, 1);
        }
    }
}
