var resultado = document.getElementById("info");
var selectRA = document.getElementById("raSelect");
var selectCriterio = document.getElementById("criterioSelect");
var divCriteriosSeleccionados = document.getElementById("criteriosSeleccionados");
var criteriosAgregados = {}; // Objeto para registrar los criterios agregados
var criteriosJSON = {}; // Objeto para almacenar los criterios del JSON

function cargarRA() {
    var xmlhttp;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            var datos = JSON.parse(xmlhttp.responseText);

            for (var i in datos) {
                for (var j = 0; j < datos[i].length; j++) {
                    var option = document.createElement("option");
                    option.value = datos[i][j].id;
                    option.text = datos[i][j].id + ' - ' + datos[i][j].textoRA;
                    selectRA.add(option);

                    // Almacena los criterios del JSON para su uso posterior
                    criteriosJSON[datos[i][j].id] = datos[i][j].criterios;
                }
            }
        }
    }

    xmlhttp.open("GET", "http://10.10.40.187/Sistemas%20Informaticos", true);
    xmlhttp.send();
}

function mostrarDatosRA() {
    var selectedRA = selectRA.value;
    selectCriterio.innerHTML = ""; // Limpiar el desplegable de criterios previo
    criteriosAgregados = {}; // Reiniciar el registro de criterios agregados

    if (selectedRA !== "") {
        var criterios = criteriosJSON[selectedRA];

        for (var k in criterios) {
            var optionCriterio = document.createElement("option");
            var criterioKey = selectedRA + ' - ' + k;
            if (!criteriosAgregados[criterioKey]) {
                optionCriterio.value = k;
                optionCriterio.text = criterioKey + ' - ' + criterios[k]; // incluir el código del RA antes del criterio
                selectCriterio.add(optionCriterio);
                criteriosAgregados[criterioKey] = true;
            }
        }
    }
}

function agregarCriterio() {
    var selectedCriterio = selectCriterio.value;
    var selectedCriterioText = selectCriterio.options[selectCriterio.selectedIndex].text;
    var criterioKey = selectedCriterioText.substring(0, selectedCriterioText.indexOf(' - ')); // Extraer el código del RA del texto del criterio
    var notaPorcentaje = document.getElementById("notaPorcentaje").value + "%";
    var texto = document.getElementById("texto").value.toUpperCase();
    var tipoActividad = document.getElementById("tipoActividad").value;
    var selectedRA = selectRA.value;

    if (selectedCriterio !== "" && !criteriosAgregados[selectedCriterioText]) {
        var div = document.createElement("div");
        var concatenacion = criterioKey + ' ' + selectedCriterioText.split(' - ')[1] + ' - ' + tipoActividad.charAt(0).toUpperCase() + tipoActividad.slice(1) + ' - ' + texto + ' - ' + notaPorcentaje;
        div.textContent = concatenacion; // Concatenar los valores y mostrarlos en el div de criterios
        divCriteriosSeleccionados.appendChild(div);
        criteriosAgregados[selectedCriterioText] = true; // Registrar el criterio agregado
    }
}

var usuarios = {
    "admin": "admin"
};

function iniciarSesion() {
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    if (usuarios.hasOwnProperty(username) && usuarios[username] === password) {
        var profesorRows = document.getElementsByClassName("profesor");
        for (var i = 0; i < profesorRows.length; i++) {
            profesorRows[i].style.display = "table-row"; // Mostrar campos del profesor
        }
        setTimeout(mostrarNombreProfesor, 10000); // Mostrar el nombre del profesor después de 10 segundos
    } else {
        alert("Credenciales incorrectas. Inténtalo de nuevo.");
    }
}

function mostrarNombreProfesor() {
    var nombreProfesor = document.getElementById("profesor").value;
    document.getElementById("info").textContent = nombreProfesor;
    var profesorRows = document.getElementsByClassName("profesor");
        for (var i = 0; i < profesorRows.length; i++) {
            profesorRows[i].style.display = "none"; // Ocultar campos
        }
}

// Cargar RA al cargar la página
cargarRA();