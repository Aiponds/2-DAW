var perrillos = ["Rocket", "Flash", "Bella", "Slugger"];
console.log(perrillos.toString());
var ciudades = 'Manchester,London,Liverpool,Birmingham,Leeds,Carlisle';
perrillos = ciudades.split(',');
console.log(perrillos.toString());

//Explica si funciona correctamente (corrige lo que está mal) y realiza un procedimiento que elimine del array perrilos toods los elementos que contengan una C sin importar si está en mayuscula o minuscula
for (var i = perrillos.length - 1; i >= 0; i--) {
    if (perrillos[i].toLowerCase().includes('c')) {
        perrillos.splice(i, 1);
    }
}
// Imprime el array 'perrillos' después de eliminar elementos con la letra 'C'
console.log(perrillos.toString());

//Modifica el programa para que perrillos contenga los nombres de los perros y las ciudades(ambos).
var nuevosPerrillos = ["Rocket", "Flash", "Bella", "Slugger", "Estepona", "Manchester", "London", "Liverpool", "Birmingham", "Leeds", "Carlisle"];
perrillos = perrillos.concat(nuevosPerrillos);
// Imprime el array 'perrillos' después de agregar nombres de perros y ciudades
console.log(perrillos.toString());

//Comprueba si funciona lo siguiente:
perrillos.unshift('Estepona');

// Imprime el array 'perrillos' después de agregar 'Estepona'
console.log(perrillos.toString());