function calcCirculo(){
    // Calcular la circunferencia y el área de un círculo
    var rad = prompt("Introduce el radio del círculo: ");
    // Calculamos con las fórmulas
    var longitud = 2 * Math.PI * rad;
    var area = Math.PI * Math.pow(rad, 2);
    // Mostramos
    document.getElementById("ejercicio6").innerHTML = "Longitud: " + longitud + ", área: " + area;
}