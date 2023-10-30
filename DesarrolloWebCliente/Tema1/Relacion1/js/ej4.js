function preguntarEdad(){
    /* Muestra los dias vividos y el nombre. */
    var nombre = prompt("Introduce tu nombre: ")
    var edad = prompt("Introduce tu edad: ")
    document.getElementById("ejercicio4").innerHTML=("Tu nombre es "+nombre+" y has vivido "+edad*365+" dias.")
}