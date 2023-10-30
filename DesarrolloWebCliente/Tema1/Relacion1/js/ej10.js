function numeroBaseX() {
    //Se pide un numero y la base, luego se calcula
    var numero = prompt("Introduce un numero: ");
    numero = parseInt(numero);
    var base = prompt("Introduce una base: ");
    base = parseInt(base);
    var numeroEnBase = numero.toString(base);
    document.getElementById("ejercicio10").innerHTML=("<p>Número en base " + base + ": " + numeroEnBase + "</p>");
}