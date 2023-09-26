
function calcCircunferencia(){
    // Definimos el valor del radio
    var radio=5;

    // Calculamos el área de la circunferencia
    var area=Math.PI*radio*radio;

    // Calculamos la longitud de la circunferencia
    var longitud=2*Math.PI*radio;

    // Mostramos los resultados en la consola
    console.log("Área de la circunferencia:", area);
    console.log("Longitud de la circunferencia:", longitud);
}
function operadorTernario(){
    var edad = 18;
    var mensaje = edad >= 18 ? "Eres mayor de edad" : "Eres menor de edad";
    console.log(mensaje);
}
/*
-En dato1, estamos concatenando Ronaldo con los numeros 5 y 5, dando resultado a Ronaldo55.
-En dato2, estamos sumando 5 y 5 = 10 y luego se concatena con ronaldo, dando resultado a 10Ronaldo.*/
function comprobarCodigo(){
    var dato1 = "Ronaldo"+5+5;
    var dato2 = 5 + 5 + "Ronaldo";
    console.log(dato1);
    console.log(dato2);
}