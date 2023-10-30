function pedirNumeroSumarContador(){
    //Se introduce un numero y se suma con los contadores, se muestran tabulados
    var numero = prompt("Introduce un numero: ");
    numero = parseInt(numero);
    var contador1 = numero+5;
    var contador2 = contador1+21;
    var contador3 = contador2-4;
    document.getElementById("ejercicio7").innerHTML=("<p>Número introducido: "+numero+"</p>")
    document.getElementById("ejercicio7.1").innerHTML=("<p>Contadores:\t"+contador1+"\t"+contador2+"\t"+contador3+"</p>");
}