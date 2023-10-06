function restarNumeros(){
    var a = 4
    var b = 5
    var c = a - b
    document.write("Resta de "+a+" - "+b+" = "+c);
}
function restarCadenas(){
    var a = Juan
    var b = Paco
    var c = a - b
    document.write("Resta de "+a+" - "+b+" = "+c);
}
function dividir(){
    var a = 4
    var b = 5
    var c = a / b
    document.write("División de "+a+" / "+b+" = "+c);
}
function dividirCadenas(){
    var a = Paco
    var b = Juan
    var c = a / b
    document.write("División de "+a+" / "+b+" = "+c);
}
function dividirEntre0(){
    var a = 4
    var b = 0
    var c = a / b
    document.write("División de "+a+" / "+b+" = "+c);
}
function preguntarEdad(){
    var nombre = prompt("Introduce tu nombre: ")
    var edad = prompt("Introduce tu edad: ")
    document.write("Tu nombre es "+nombre+" y has vivido "+edad*365+" dias.")
}
function preguntarNumero(){
    var numero = prompt("Introcduce un numero: ")
    alert("El doble del numero: "+numero*2+", el triple: "+numero*3+", el cuadruple: "+numero*4);
}
function calcCirculo(){
    var rad = prompt("Introduce el radio del circulo: ")
    var longitud = 2*Math.PI*rad;
    var area = Math.PI*Math.pow(rad, 2);
    document.write("Longitud: "+longitud+", area: "+area);
}