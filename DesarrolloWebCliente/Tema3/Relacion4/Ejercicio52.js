// Función para generar un vector con 10 valores aleatorios entre 0 y 1000
function generarVectorAleatorio() {
    const vector = [];
    for (let i = 0; i < 10; i++) {
        vector.push(Math.floor(Math.random() * 1001));
    }
    return vector;
}

// Función para encontrar el índice del menor elemento en un vector
function encontrarIndiceMenor(vector) {
    let indiceMenor = 0;
    for (let i = 1; i < vector.length; i++) {
        if (vector[i] < vector[indiceMenor]) {
            indiceMenor = i;
        }
    }
    return indiceMenor;
}

// Función para generar un nuevo vector a partir de la posición del menor hasta el final
function generarNuevoVectorDesdeMenor(vector, indiceMenor) {
    return vector.slice(indiceMenor);
}

// Crear un vector con 10 valores aleatorios entre 0 y 1000
const vectorOriginal = generarVectorAleatorio();

// Mostrar el vector original
document.write("<h2>Vector Original</h2>");
document.write(`<p>${vectorOriginal.join(', ')}</p>`);

// Encontrar el índice del menor elemento en el vector
const indiceMenor = encontrarIndiceMenor(vectorOriginal);

// Generar un nuevo vector desde la posición del menor hasta el final
const nuevoVectorDesdeMenor = generarNuevoVectorDesdeMenor(vectorOriginal, indiceMenor);

// Mostrar el nuevo vector generado desde la posición del menor hasta el final
document.write("<h2>Nuevo Vector Desde el Menor Hasta el Final</h2>");
document.write(`<p>${nuevoVectorDesdeMenor.join(', ')}</p>`);
