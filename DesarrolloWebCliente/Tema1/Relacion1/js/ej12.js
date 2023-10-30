function calcProducto() {
    //Se piden dos numeros y se calcula el producto de ellos.
    var num1 = prompt("Introduce un numero: ");
    var num2 = prompt("Introduce otro numero: ");
    //Se comprueba que ambos sean numeros
    if ((num1 && num2 !=isNaN) && (num1 && num2 >=0 ) && (num1 && num2 <57)) {
        var producto = num1 * num2;
        document.getElementById("ejercicio12").innerHTML=("<p>Producto: "+producto+"</p>");
    } else {
        alert("Los numeros introducidos no son válidos.");
    }
    //Se pide confirmacion al usuario, si acepta hace recursivo el programa y pide dos numeros de nuevo.
    var reiniciar = confirm("¿Deseas volver a empezar?");
        if (reiniciar) {
            calcProducto();
        } else {
            alert("Gracias por usar el programa.");
        }
}