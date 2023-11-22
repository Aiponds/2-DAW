var texto = document.getElementById('texto');
var button = document.getElementById('btnSubmit');

button.addEventListener("click", function () {
    if (document.getElementById('catalan').checked) {
        creaHistoriaCatalan();
    } else {
        creaHistoriaAndaluz();
    }
}, false);

function creaHistoriaAndaluz() {
    texto.innerHTML = "";
    var nombre = document.getElementById('nombre').value.toString();
    var historiasAndaluz = [
        "En Andalucia el aceite siempre ha sido muy barato, pero ahora le parece muy caro.",
        "En Las Norias hay muchos moros.",
        "" + nombre + " visitaba a su abuela, ella siempre le hacía buena comida",
        "El grado lo dejó deprimido y ahora " + nombre + " solo tiene al LoL",
        "No tenía ganas de hacer deporte así que " + nombre + " engordó hasta el límite.",
        "Los pies eran su debilidad, pero últimamente estaban comportándose de forma extraña.",
        "" + nombre + " antes era calvo, pero ahora lo es más."
    ];
    while (historiasAndaluz.length > 0) {
        var nAleatorio = Math.round(Math.random() * historiasAndaluz.length - 1);
        if (historiasAndaluz[nAleatorio] == undefined) {
            nAleatorio = Math.round(Math.random() * historiasAndaluz.length - 1);
        } else {
            texto.innerHTML += historiasAndaluz[nAleatorio];
            historiasAndaluz.splice(nAleatorio, 1);
        }
    }
}

function creaHistoriaCatalan() {
    texto.innerHTML = "";
    var nombre = document.getElementById('nombre').value.toString();

    var historiasCatalan = [
        "En Cataluña los moros inmigran todo el año.",
        "" + nombre + " era una persona modesta que conducía un Ford Fiesta.",
        "Cada semana " + nombre + " visitaba a sus padres.",
        "Era muy malo jugando.",
        "Llovía fuerte aquella noche y " + nombre + " no podía dejar de pensar en los fardos.",
        "A " + nombre + " no le gustaba la informática."
    ];
    while (historiasCatalan.length > 0) {
        var nAleatorio = Math.round(Math.random() * historiasCatalan.length - 1);

        if (historiasCatalan[nAleatorio] == undefined) {
            nAleatorio = Math.round(Math.random() * historiasCatalan.length - 1);
        } else {
            texto.innerHTML += historiasCatalan[nAleatorio];
            historiasCatalan.splice(nAleatorio, 1);
        }
    }
}
