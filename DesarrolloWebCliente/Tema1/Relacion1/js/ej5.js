function preguntarNumero(){
    /* Mostrar el doble, triple y cuadruple de un numero */
    var numero = prompt("Introcduce un numero: ")
    document.getElementById("ejercicio5").innerHTML=("El doble del numero: "+numero*2+", el triple: "+numero*3+", el cuadruple: "+numero*4);
}