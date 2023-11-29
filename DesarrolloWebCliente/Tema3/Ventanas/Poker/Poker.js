function contarPatrones(matricula) {
    // Inicializar contadores
    let doblePareja = 0;
    let trio = 0;
    let escaleraSimple = 0;
    let escaleraCompleta = 0;
    let poker = 0;

    // Convertir la matrícula a un array de dígitos
    const digitos = matricula.toString().split('').map(Number);

    // Contar doble pareja, tríos, escaleras y póker
    for (let i = 0; i < 10; i++) {
        const count = digitos.filter(d => d === i).length;

        if (count === 2) {
            doblePareja++;
        } else if (count === 3) {
            trio++;
        } else if (count === 4) {
            poker++;
        }
    }

    for (let i = 0; i <= 6; i++) {
        if (digitos.includes(i) && digitos.includes(i + 1) && digitos.includes(i + 2)) {
            escaleraSimple++;
        }
    }

    if (digitos.includes(0) && digitos.includes(1) && digitos.includes(2) && digitos.includes(3)) {
        escaleraCompleta++;
    }

    // Calcular porcentajes
    const totalPosibilidades = 10 * 9 * 8 * 7; // Todas las combinaciones posibles
    const porcentajeDoblePareja = (doblePareja / totalPosibilidades) * 100;
    const porcentajeTrio = (trio / totalPosibilidades) * 100;
    const porcentajeEscaleraSimple = (escaleraSimple / totalPosibilidades) * 100;
    const porcentajeEscaleraCompleta = (escaleraCompleta / totalPosibilidades) * 100;
    const porcentajePoker = (poker / totalPosibilidades) * 100;

    // Mostrar resultados
    const resultadosLista = document.getElementById('resultados-lista');
    resultadosLista.innerHTML = `
        <li>Doble Pareja: ${doblePareja} números. Aparece un ${porcentajeDoblePareja.toFixed(2)}% de las veces.</li>
        <li>Trio: ${trio} números. Aparece un ${porcentajeTrio.toFixed(2)}% de las veces.</li>
        <li>Escalera Simple: ${escaleraSimple} números. Aparece un ${porcentajeEscaleraSimple.toFixed(2)}% de las veces.</li>
        <li>Escalera Completa: ${escaleraCompleta} números. Aparece un ${porcentajeEscaleraCompleta.toFixed(2)}% de las veces.</li>
        <li>Poker: ${poker} números. Aparece un ${porcentajePoker.toFixed(2)}% de las veces.</li>`;
}

// Ejemplo de uso
contarPatrones(1234);