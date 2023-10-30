function numerosBase10y2(){
    //Se convierte a base 10 un numero introducido
    var numero = prompt("Introduce un numero en base 8: ");
    numero = parseInt(numero);
    var base10 = parseInt(numero, 8);
    //Se convierte a base 2 un numero introducido
    var base2 = base10.toString(2);
    document.getElementById("ejercicio9").innerHTML=("<p>Número en base 10: "+base10+"</p>");
    document.getElementById("ejercicio9.1").innerHTML=("<p>Número en base 2: "+base2+"</p>");
}