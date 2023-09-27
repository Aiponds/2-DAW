
function calcCircunferencia(){
    // Definimos el valor del radio
    var radio=5;

    // Calculamos el área de la circunferencia
    var area=Math.PI*radio*radio;

    // Calculamos la longitud de la circunferencia
    var longitud=2*Math.PI*radio;

    // Mostramos los resultados en la consola
    document.write("Área de la circunferencia: "+ area+"<br>");
    document.write("Longitud de la circunferencia: "+ longitud+"<br>");
}
function operadorTernario(){
    var edad = 18;
    var mensaje = edad >= 18 ? "Eres mayor de edad" : "Eres menor de edad";
    document.write(mensaje+"<br>");
}
function operadorTernario2(){
    var intentos = 3;
    while(intentos>0){
        var nota = prompt("Dime la nota ( "+intentos+" intentos y del 0-10 )");
        if (!isNaN(nota) && nota >= 0 && nota <= 10) {
            break;
        } else {
            alert("Nota inválida. Debes ingresar un número del 0 al 10.");
            intentos--;
        }
    }

    if (intentos === 0) {
    alert("Has agotado tus 3 intentos. Adiós.");
    }
    var mensaje = nota >=5 ? "Has aprobado" : "Has suspendido";
    document.write(mensaje+"<br>");
}
/*
-En dato1, estamos concatenando Ronaldo con los numeros 5 y 5, dando resultado a Ronaldo55.
-En dato2, estamos sumando 5 y 5 = 10 y luego se concatena con ronaldo, dando resultado a 10Ronaldo.*/
function comprobarCodigo(){
    var dato1 = "Ronaldo"+5+5;
    var dato2 = 5 + 5 + "Ronaldo";
    document.write("<br>"+dato1);
    document.write("<br>"+dato2);
}