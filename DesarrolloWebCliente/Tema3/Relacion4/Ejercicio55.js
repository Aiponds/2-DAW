// Crear un vector de 10 elementos e inicializar los valores
const vector = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

// Inicializar la primera variable con el método toString()
const toStringResult = vector.toString();

// Inicializar la segunda variable con el método join() sin parámetros
const joinResult = vector.join();

// Comparar los resultados de los dos métodos y mostrar un mensaje
if (toStringResult === joinResult) {
    document.write("<p>Los resultados de toString() y join() son iguales.</p>");
} else {
    document.write("<p>Los resultados de toString() y join() son diferentes.</p>");
}
