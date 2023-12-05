// Función para generar un vector con 10 valores aleatorios
function generarVectorAleatorio() {
    const vector = [];
    for (let i = 0; i < 10; i++) {
        vector.push(Math.floor(Math.random() * 10) + 1);
    }
    return vector;
}

// Función para borrar los componentes con el valor 2 e insertar dos elementos con el valor 1
function modificarVector(vector) {
    // Borrar los componentes con el valor 2
    for (let i = vector.length - 1; i >= 0; i--) {
        if (vector[i] === 2) {
            vector.splice(i, 1);
        }
    }

    // Insertar dos elementos con el valor 1
    vector.push(1, 1);

    return vector;
}

// Crear un vector con 10 valores aleatorios
const vectorOriginal = generarVectorAleatorio();

// Mostrar el vector original
document.write("<h2>Vector Original</h2>");
document.write(`<p>${vectorOriginal.join(', ')}</p>`);

// Modificar el vector según las condiciones dadas
const vectorModificado = modificarVector([...vectorOriginal]);

// Mostrar el vector modificado
document.write("<h2>Vector Modificado</h2>");
document.write(`<p>${vectorModificado.join(', ')}</p>`);
