function multiplosYSuma() {
    var suma = 0;

    document.getElementById("ejercicio16").innerHTML=("Múltiplos de 23 menores que 1000: ");
    //Se hace un bucle del 1 al 1000, se divide el indice entre 23 y si el resto es 0 lo muestra por pantalla.
    for (var i = 1; i < 1000; i++) {
        if (i % 23 === 0) {
            suma += i;
            document.getElementById("ejercicio16.1").innerHTML+=(i + " ");
        }
    }
    //Se muestra la suma de los multiplos
    document.getElementById("ejercicio16.2").innerHTML=("<br>Suma de los múltiplos: " + suma);
}