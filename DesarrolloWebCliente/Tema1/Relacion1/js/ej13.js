function solicitarYImprimirNumeros() {
    var numero;
    //Se introducen numeros de forma recursiva hasta que se introduzca 9999, luego se muestran todos.
    numero = parseInt(prompt("Introduce un número (9999 para terminar):"));
    if (!isNaN(numero) && numero !== 9999) {
        solicitarYImprimirNumeros();
        document.getElementById("ejercicio13").innerHTML+=(numero+", ")
    }
}