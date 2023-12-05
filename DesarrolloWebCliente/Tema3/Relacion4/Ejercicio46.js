// Función para generar un vector con números de rifa
function generarRifa() {
    const rifa = new Array(1000).fill(false); // Inicializa un vector de 1000 elementos, todos en falso
    const premios = [1000, 2000, 3000, 4000, 5000, 6000, 7000, 8000, 9000, 10000];

    // Asigna aleatoriamente los premios en el vector de rifa
    for (const premio of premios) {
        const posicionPremio = Math.floor(Math.random() * 1000);
        rifa[posicionPremio] = premio;
    }

    return rifa;
}

// Obtén la rifa generada
const rifa = generarRifa();

// Filtra los números con premio y las cantidades de los mismos
const numerosConPremio = rifa.filter(premio => premio !== false);
const cantidadesPremios = numerosConPremio.map(premio => `\$${premio}`);

// Muestra los resultados en el documento
document.write('<p>Números con premio: ' + numerosConPremio.join(', ') + '</p>');
document.write('<p>Cantidades de premios: ' + cantidadesPremios.join(', ') + '</p>');
