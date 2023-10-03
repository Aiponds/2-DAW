document.addEventListener("DOMContentLoaded", function() {
    const tablaBody = document.getElementById("tabla-body");
    const nombreInput = document.getElementById("nombre");
    const precioInput = document.getElementById("precio");
    const agregarBtn = document.getElementById("agregar-btn");
    const totalElement = document.getElementById("total"); // Elemento para mostrar el total

    // Objeto para almacenar nombres y precios acumulados
    const nombresYPrecios = {};

    function calcularTotal() {
        let total = 0;

        // Recorre todas las filas de la tabla y suma los precios con descuento
        const filas = tablaBody.querySelectorAll("tr");
        filas.forEach((fila) => {
            const precioConDescuento = parseFloat(fila.querySelector("td:nth-child(3)").textContent);
            total += precioConDescuento;
        });

        totalElement.textContent = total.toFixed(2); // Actualiza el total en el elemento HTML
    }

    // Función para agregar desayuno al presionar "Enter" en los campos de entrada
    function agregarConEnter(event) {
        if (event.key === "Enter") {
            if (document.activeElement === precioInput) {
                agregarDesayuno();
            } else if (document.activeElement === nombreInput) {
                precioInput.focus();
            }
        }
    }

    agregarBtn.addEventListener("click", function() {
        agregarDesayuno();
    });

    precioInput.addEventListener("keydown", agregarConEnter);

    function agregarDesayuno() {
        const nombre = nombreInput.value;
        const precio = parseFloat(precioInput.value);

        if (nombre && !isNaN(precio)) {
            if (nombresYPrecios.hasOwnProperty(nombre)) {
                // Si el nombre ya existe, suma el precio al acumulado
                nombresYPrecios[nombre] += precio;
                // Actualiza la fila existente en la tabla
                const filaExistente = document.querySelector(`#tabla-body tr[data-nombre="${nombre}"]`);
                const precioUnitario = nombresYPrecios[nombre];
                const descuento = precioUnitario * 0.25;
                const precioConDescuento = precioUnitario - descuento;

                filaExistente.querySelector("td:nth-child(2)").textContent = precioUnitario.toFixed(2);
                filaExistente.querySelector("td:nth-child(3)").textContent = precioConDescuento.toFixed(2);
            } else {
                // Si el nombre no existe, agrega una nueva fila a la tabla
                const descuento = precio * 0.25;
                const precioConDescuento = precio - descuento;

                const fila = document.createElement("tr");
                fila.setAttribute("data-nombre", nombre); // Añade un atributo data para identificar la fila
                fila.innerHTML = `
                    <td>${nombre}</td>
                    <td>${precio.toFixed(2)}</td>
                    <td>${precioConDescuento.toFixed(2)}</td>
                `;

                tablaBody.appendChild(fila);
                nombresYPrecios[nombre] = precio;
            }

            // Llama a la función para calcular el total
            calcularTotal();

            // Limpiar los campos de entrada
            // nombreInput.value = "";
            precioInput.value = "";
        } else {
            alert("Por favor, ingresa un nombre y un precio válido.");
        }
    }
});
