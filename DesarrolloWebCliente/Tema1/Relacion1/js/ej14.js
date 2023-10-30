function solicitarYSumarNumeros() {
    var numero, suma=0;
    //Se suman todos los numeros introducidos distintos a 9999.
    do {
        numero = parseInt(prompt("Introduce un número (9999 para terminar):"));
        if(numero!==9999)
            suma+=numero;
    }while(!isNaN(numero)&& numero!==9999);
    document.getElementById("ejercicio14").innerHTML=("Total: "+suma);
}