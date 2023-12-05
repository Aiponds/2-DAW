// Función para generar un vector con 5 valores aleatorios entre 1 y 1000
function generarVectorAleatorio() {
    const vector = [];
    for (let i = 0; i < 5; i++) {
        vector.push(Math.floor(Math.random() * 1000) + 1);
    }
    return vector;
}

// Crear un vector con 5 valores aleatorios
const vectorOriginal = generarVectorAleatorio();

// Extraer los dos últimos elementos del vector
const dosUltimosElementos = vectorOriginal.slice(-2);

// Sumar los dos últimos elementos
const sumaDosUltimosElementos = dosUltimosElementos.reduce((a, b) => a + b, 0);

// Mostrar la suma de los dos últimos elementos y el tamaño final del vector
document.write(`<p>Suma de los dos últimos elementos: ${sumaDosUltimosElementos}</p>`);
document.write(`<p>Tamaño final del vector: ${vectorOriginal.length}</p>`);
