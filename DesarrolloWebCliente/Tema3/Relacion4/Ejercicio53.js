// Crear un vector con los nombres de 5 personas
const nombres = ['Paco', 'Victor', 'Antonio', 'Alfredo', 'Manolo'];

// Imprimir los nombres por pantalla uno debajo de otro con <br> entre elementos
const nombresConBr = nombres.join('<br>');

// Mostrar los nombres en el documento
document.write("<h2>Nombres</h2>");
document.write(`<p>${nombresConBr}</p>`);
