function solicitarYMultiplicarNumeros() {
    var numero, producto=1;
    //Se multiplican todos los numeros introducidos distintos a 9999.
    do {
        numero = parseInt(prompt("Introduce un número (9999 para terminar):"));
        if(numero!==9999)
            producto*=numero;
    }while(!isNaN(numero)&& numero!==9999);
    document.getElementById("ejercicio15").innerHTML=("Total: "+producto);
}