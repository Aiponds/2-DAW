function restarCadenas(){
    /* Resta dos cadenas */
    // Definimos dos cadenas que representan números
    var cadenaNumero1 = "10";
    var cadenaNumero2 = "5";

    // Intentamos restar las cadenas
    var resultado = parseFloat(cadenaNumero1) - parseFloat(cadenaNumero2);

    // Mostramos el resultado
    document.getElementById("ejercicio2").innerHTML=("Resultado de la resta: " + resultado);
}