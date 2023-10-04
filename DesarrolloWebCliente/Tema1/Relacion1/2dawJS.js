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