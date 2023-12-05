// Función para generar un vector con valores aleatorios entre 1 y 500
function generarVectorAleatorio(longitud) {
    const vector = [];
    for (let i = 0; i < longitud; i++) {
        vector.push(Math.floor(Math.random() * 500) + 1);
    }
    return vector;
}

// Función para separar elementos en dos vectores según su valor
function separarElementos(vector, umbral) {
    const vectorMenor = [];
    const vectorMayorIgual = [];

    for (const elemento of vector) {
        if (elemento < umbral) {
            vectorMenor.push(elemento);
        } else {
            vectorMayorIgual.push(elemento);
        }
    }

    return [vectorMenor, vectorMayorIgual];
}

// Crear un vector con 10 valores aleatorios entre 1 y 500
const vectorOriginal = generarVectorAleatorio(10);

// Separar elementos en dos vectores según el umbral 250
const umbral = 250;
const [vectorMenor250, vectorMayorIgual250] = separarElementos(vectorOriginal, umbral);

// Mostrar tamaños de los vectores en el documento
document.write(`<p>Tamaño del vectorMenor250: ${vectorMenor250.length}</p>`);
document.write(`<p>Tamaño del vectorMayorIgual250: ${vectorMayorIgual250.length}</p>`);

// Mostrar los tres vectores en el documento
document.write('<p>Vector Original: ' + vectorOriginal.join(', ') + '</p>');
document.write('<p>Vector Menor a 250: ' + vectorMenor250.join(', ') + '</p>');
document.write('<p>Vector Mayor o Igual a 250: ' + vectorMayorIgual250.join(', ') + '</p>');
