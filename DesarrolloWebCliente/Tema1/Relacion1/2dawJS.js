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
    //Calcular la circunferencia y el area de un circulo
    var rad = prompt("Introduce el radio del circulo: ")
    //Calculamos con las formulas
    var longitud = 2*Math.PI*rad;
    var area = Math.PI*Math.pow(rad, 2);
    //Mostramos
    document.write("Longitud: "+longitud+", area: "+area);
}
function pedirNumeroSumarContador(){
    //Se introduce un numero y se suma con los contadores, se muestran tabulados
    var numero = prompt("Introduce un numero: ");
    numero = parseInt(numero);
    var contador1 = numero+5;
    var contador2 = contador1+21;
    var contador3 = contador2-4;
    document.write("<p>Número introducido: "+numero+"</p>")
    document.write("<p>Contadores:\t"+contador1+"\t"+contador2+"\t"+contador3+"</p>");
}
function numerosBase16y5(){
    //Se convierte a base 16 un numero introducido
    var numero = prompt("Introduce un numero: ");
    numero = parseInt(numero);
    var base16 = numero.toString(16);

    // Calcula el valor en base 5 (mediante un bucle)
    var base5 = "";
    var tempNumero = numero;

    while (tempNumero > 0) {
        var residuo = tempNumero % 5;
        base5 = residuo.toString() + base5;
        tempNumero = Math.floor(tempNumero / 5);
    }
     // Muestra los resultados en el documento
     document.write("<p>Número en base 16:"+base16+"</p>");
     document.write("<p>Número en base 16:"+base5+"</p>");
}
function numerosBase10y2(){
    //Se convierte a base 10 un numero introducido
    var numero = prompt("Introduce un numero en base 8: ");
    numero = parseInt(numero);
    var base10 = parseInt(numero, 8);
    //Se convierte a base 2 un numero introducido
    var base2 = base10.toString(2);
    document.write("<p>Número en base 10: "+base10+"</p>");
    document.write("<p>Número en base 2: "+base2+"</p>");
}
function numeroBaseX() {
    //Se pide un numero y la base, luego se calcula
    var numero = prompt("Introduce un numero: ");
    numero = parseInt(numero);
    var base = prompt("Introduce una base: ");
    base = parseInt(base);
    var numeroEnBase = numero.toString(base);
    document.write("<p>Número en base " + base + ": " + numeroEnBase + "</p>");
}
function calcProducto() {
    //Se piden dos numeros y se calcula el producto de ellos.
    var num1 = prompt("Introduce un numero: ");
    var num2 = prompt("Introduce otro numero: ");
    //Se comprueba que ambos sean numeros
    if ((num1 && num2 !=isNaN) && (num1 && num2 >=0 ) && (num1 && num2 <57)) {
        var producto = num1 * num2;
        document.write("<p>Producto: "+producto+"</p>");
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
function solicitarYImprimirNumeros() {
    var numero;
    //Se introducen numeros de forma recursiva hasta que se introduzca 9999, luego se muestran todos.
    numero = parseInt(prompt("Introduce un número (9999 para terminar):"));
    if (!isNaN(numero) && numero !== 9999) {
        solicitarYImprimirNumeros();
        document.write(numero+", ")
    }
}
function solicitarYSumarNumeros() {
    var numero, suma=0;
    //Se suman todos los numeros introducidos distintos a 9999.
    do {
        numero = parseInt(prompt("Introduce un número (9999 para terminar):"));
        if(numero!==9999)
            suma+=numero;
    }while(!isNaN(numero)&& numero!==9999);
    document.write("Total: "+suma);
}
function solicitarYMultiplicarNumeros() {
    var numero, producto=1;
    //Se multiplican todos los numeros introducidos distintos a 9999.
    do {
        numero = parseInt(prompt("Introduce un número (9999 para terminar):"));
        if(numero!==9999)
            producto*=numero;
    }while(!isNaN(numero)&& numero!==9999);
    document.write("Total: "+producto);
}
function multiplosYSuma() {
    var suma = 0;

    document.write("Múltiplos de 23 menores que 1000: ");
    //Se hace un bucle del 1 al 1000, se divide el indice entre 23 y si el resto es 0 lo muestra por pantalla.
    for (var i = 1; i < 1000; i++) {
        if (i % 23 === 0) {
            suma += i;
            document.write(i + " ");
        }
    }
    //Se muestra la suma de los multiplos
    document.write("<br>Suma de los múltiplos: " + suma);
}