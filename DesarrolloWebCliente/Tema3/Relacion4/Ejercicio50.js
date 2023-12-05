// Función para cargar sueldos y mostrarlos ordenados
function cargarSueldos() {
    const sueldos = [];

    // Loop para ingresar sueldos hasta que se ingrese 0
    while (true) {
        const sueldo = parseFloat(prompt("Ingrese el sueldo (0 para finalizar):"));

        // Verificar si se ingresó 0 para finalizar la carga
        if (sueldo === 0) {
            break;
        }

        sueldos.push(sueldo);
    }

    // Ordenar los sueldos de mayor a menor
    const sueldosOrdenados = sueldos.sort((a, b) => b - a);

    // Mostrar los sueldos ordenados en la consola
    document.write("<h2>Sueldos Ordenados de Mayor a Menor</h2>");
    document.write("<ul>");

    for (const sueldo of sueldosOrdenados) {
        document.write(`<li>${sueldo}</li>`);
    }

    document.write("</ul>");
}

// Llama a la función principal
cargarSueldos();
