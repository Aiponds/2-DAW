function numerosBase16y5(){
    //Se convierte a base 16 un numero introducido
    var numero = prompt("Introduce un numero: ");
    numero = parseInt(numero);
    var base16 = numero.toString(16);

    // Calcula el valor en base 5 (mediante un bucle)
    var base5 = "";
    var tempNumero = numero;

    while (tempNumero > 0) {
        var residuo = tempNumero % 5;
        base5 = residuo.toString() + base5;
        tempNumero = Math.floor(tempNumero / 5);
    }
     // Muestra los resultados en el documento
     document.getElementById("ejercicio8").innerHTML=("<p>Número en base 16:"+base16+"</p>");
     document.getElementById("ejercicio8.1").innerHTML=("<p>Número en base 5:"+base5+"</p>");
}