// Función principal que realiza el cálculo de combinaciones y muestra los resultados en el documento HTML
function contarPatrones() {
    // Inicializar contadores
    let doblePareja = 0;
    let trio = 0;
    let escaleraSimple = 0;
    let escaleraCompleta = 0;
    let poker = 0;

    // Llama a la función calcularCombinaciones para contar la frecuencia de cada combinación
    calcularCombinaciones();

    // Calcular porcentajes dividiendo entre 100
    const porcentajeDoblePareja = doblePareja / 100;
    const porcentajeTrio = trio / 100;
    const porcentajeEscaleraSimple = escaleraSimple / 100;
    const porcentajeEscaleraCompleta = escaleraCompleta / 100;
    const porcentajePoker = poker / 100;

    // Mostrar resultados en elementos HTML específicos
    document.getElementById("dobles").innerHTML = 'Doble Pareja: ' + doblePareja + ' números. Aparece un ' + porcentajeDoblePareja.toFixed(2) + '% de las veces.';
    document.getElementById("triples").innerHTML = 'Trio: ' + trio + ' números. Aparece un ' + porcentajeTrio.toFixed(2) + '% de las veces.';
    document.getElementById("escaleraSimple").innerHTML = 'Escalera Simple: ' + escaleraSimple + ' números. Aparece un ' + porcentajeEscaleraSimple.toFixed(2) + '% de las veces.';
    document.getElementById("escaleraCompleja").innerHTML = 'Escalera Completa: ' + escaleraCompleta + ' números. Aparece un ' + porcentajeEscaleraCompleta.toFixed(2) + '% de las veces.';
    document.getElementById("poker").innerHTML = 'Poker: ' + poker + ' números. Aparece un ' + porcentajePoker.toFixed(2) + '% de las veces.';

    // Obtener el contador almacenado en la cookie
    const contador = getContadorFromCookie();

    // Mostrar el contador en el elemento HTML
    document.getElementById("contador").innerHTML = 'Contador de matrículas: ' + contador;

    // Función interna para contar la frecuencia de cada combinación
    function calcularCombinaciones() {
        for (let i = 1111; i <= 9999; i++) {
            // Se suma 1 a los contadores si la combinación es verdadera
            doblePareja += esDoblePareja(i) ? 1 : 0;
            trio += esTrio(i) ? 1 : 0;
            poker += esPoker(i) ? 1 : 0;
            escaleraSimple += esEscaleraSimple(i) ? 1 : 0;
            escaleraCompleta += esEscaleraCompleta(i) ? 1 : 0;
        }
        doblePareja -= poker; // Restamos la cantidad de pokers a las dobles parejas para evitar duplicidad porque son el mismo número
    }
}
function comprobarMano() {
    let numero = parseInt(document.getElementById("mano").value);
    let texto;

    // Verifica si el número está dentro del rango deseado
    if (numero >= 1111 && numero <= 9999) {
        if (esDoblePareja(numero)) {
            texto = "La matrícula " + numero + " es una mano de doble pareja.";
        } else if (esTrio(numero)) {
            texto = "La matrícula " + numero + " es una mano de trío.";
        } else if (esPoker(numero)) {
            texto = "La matrícula " + numero + " es una mano de póker.";
        } else if (esEscaleraSimple(numero)) {
            texto = "La matrícula " + numero + " es una mano escalera simple.";
        } else if (esEscaleraCompleta(numero)) {
            texto = "La matrícula " + numero + " es una mano escalera completa.";
        } else {
            texto = "La matrícula " + numero + " no es ninguna mano especial.";
        }

        // Incrementa y almacena el contador en la cookie
        let contador = getContadorFromCookie() + 1;
        setContadorInCookie(contador);
    } else {
        texto = "Por favor, ingresa un número entre 1111 y 9999.";
    }

    abrirVentana(texto);
}


function abrirVentana(texto) {
    // Abre una nueva ventana con algunas opciones
    var miVentana = window.open('resultadoPoker.html', 'NuevaVentana', 'width=500,height=450,resizable=no,menubar=no,toolbar=no,directories=no,location=no,scrollbars=no,status=no');

    // Espera a que la ventana se cargue completamente
    miVentana.onload = function() {
        // Modifica el contenido de la ventana
        miVentana.document.body.innerHTML = '<p style="color: green; font-size: 30px;">' + texto + '</p>';
        
        // Cierra la ventana después de 10 segundos
        setTimeout(function () {
            miVentana.close();
        }, 10000); // 10000 milisegundos = 10 segundos
    };
}

// Funciones para verificar si un número cumple con cada combinación específica
function esDoblePareja(n) {
    // Funcion para verificar si un número tiene una doble pareja
    var num = n.toString();
    var repeticiones = 0;
    for (let i = 0; i < num.length - 1; i++) {
        for (let j = i + 1; j < num.length; j++) {
            if (num.charAt(i) == num.charAt(j)) {
                repeticiones++;
                break; // Rompemos el bucle si ya encontramos una pareja
            }
        }
    }
    return repeticiones == 2;
}

function esTrio(n) {
    // Funcion para verificar si un número tiene un trío
    var num = n.toString();
    for (let i = 0; i < num.length - 2; i++) {
        if (num.charAt(i) == num.charAt(i + 1) && num.charAt(i) == num.charAt(i + 2)) {
            return true; // Devuelve true si encuentra un trío
        }
    }
    return false;
}

function esPoker(n) {
    // Funcion para verificar si un número tiene un póker
    var num = n.toString();
    if (num.charAt(0) == num.charAt(1) && num.charAt(0) == num.charAt(2) && num.charAt(0) == num.charAt(3)) {
        return true; // Devuelve true si encuentra un póker
    } else {
        return false;
    }
}

function esEscaleraSimple(n) {
    // Funcion para verificar si un número tiene una escalera simple
    var num = n.toString();
    if (
        (num.charAt(3) == parseInt(num.charAt(2)) + 1 && num.charAt(2) == parseInt(num.charAt(1)) + 1) ||
        (num.charAt(2) == parseInt(num.charAt(1)) + 1 && num.charAt(1) == num.charAt(0) + 1) ||
        (num.charAt(3) == parseInt(num.charAt(2)) - 1 && num.charAt(2) == parseInt(num.charAt(1)) - 1) ||
        (num.charAt(2) == parseInt(num.charAt(1)) - 1 && num.charAt(1) == parseInt(num.charAt(0)) - 1)
    ) {
        return true; // Devuelve true si encuentra una escalera simple
    } else {
        return false;
    }
}

function esEscaleraCompleta(n) {
    // Funcion para verificar si un número tiene una escalera completa
    var num = n.toString();
    if (
        (num.charAt(3) == parseInt(num.charAt(2)) + 1 && num.charAt(2) == parseInt(num.charAt(1)) + 1 && num.charAt(1) == parseInt(num.charAt(0)) + 1) ||
        (num.charAt(3) == parseInt(num.charAt(2)) - 1 && num.charAt(2) == parseInt(num.charAt(1)) - 1 && num.charAt(1) == parseInt(num.charAt(0)) - 1)
    ) {
        return true; // Devuelve true si encuentra una escalera completa
    } else {
        return false;
    }
}

// Función para obtener el contador almacenado en la cookie
function getContadorFromCookie() {
    let contador = parseInt(getCookie("contador")) || 0;
    return contador;
}

// Función para establecer el contador en la cookie
function setContadorInCookie(contador) {
    document.cookie = "contador=" + contador;
    contarPatrones(); // Llama a la función para actualizar la interfaz después de establecer la cookie
}


// Función auxiliar para obtener el valor de una cookie por su nombre
function getCookie(name) {
    const value = "; " + document.cookie;
    const parts = value.split("; " + name + "=");
    if (parts.length === 2) return parts.pop().split(";").shift();
}
