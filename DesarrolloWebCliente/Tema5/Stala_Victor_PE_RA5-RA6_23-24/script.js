// Recogemos los datos de los campos Nombre, apellidos y código verificación, ademas de los botones.
var nombre = document.querySelector("#nombre");
var apellido = document.querySelector("#apellido");
var codigo = document.querySelector("#codigoVerificacion");
var info = document.querySelector("#info");
var info2 = document.querySelector("#info2");
var botonEnviar = document.querySelector("#enviar");
botonEnviar = addEventListener('click', comprobarCampos);
var botonLogin = document.querySelector("#login");
botonLogin = addEventListener('click', comprobarLogin);
var loginCorrecto = false;
var idioma = false;

// Indicamos las expresiones regulares
var expresionTextos = /^[A-Za-z]+$/;
var expresionCodigo = /^(?=.*[0-9]{4})(?=.*[A-Za-z]).{5,}$/;

// Comprobamos los campos con las expresiones regulares
function comprobarNombre() {
    if (!expresionTextos.test(nombre.value)) {
        info.innerHTML += "El nombre solo puede contener letras. ";
        nombre.focus();
    }
}

function comprobarApellido() {
    if (!expresionTextos.test(apellido.value)) {
        info.innerHTML += "El apellido solo puede contener letras. ";
        apellido.focus();
    }
}

function comprobarCodigo() {
    if (!expresionCodigo.test(codigo.value)) {
        info.innerHTML += "El código debe contener 4 números y 1 letra. ";
        codigo.focus();
    }
}

function comprobarCampos() {
    info.innerHTML = ""; // Limpiamos el contenido anterior de info
    comprobarCodigo();
    comprobarApellido();
    comprobarNombre();
    if (info.innerHTML === "") {
        info.innerHTML = "Se ha enviado exitosamente el formulario.";
    }
}

//Comprobar el login
function comprobarLogin() {
    //Vaciamos el texto de info2.
    info2.innerHTML = "";
    //Especificamos las credenciales del login y tambien recogemos el usuario y contraseña.
    var usuario = document.getElementById("usuario").value.trim();
    var claveIntroducida = document.getElementById("clave").value;
    //Nos quedamos solo con los digitos.
    var clave = codigo.value.match(/\d/g).join('');
    //Comprobamos si ha introducido bien los datos.
    if (usuario === "Admin" && claveIntroducida == clave) {
        info2.innerHTML = "Usuario y claves correctas."
        loginCorrecto = true;
    } else {
        info2.innerHTML = "Inténtelo de nuevo";
        loginCorrecto = false;
    }
}

function login() {
    // Si el inicio de sesión es correcto, se muestra el botón de cambiar de idioma
    if (loginCorrecto === true) {
        var botonIdioma = document.getElementById("idioma");
        var botonSalir = document.getElementById("salir");
        var numero = document.getElementById("cronometro");

        // Cambiamos el estilo de los botones de "none" a "block"
        botonSalir.style.display = "block";
        botonIdioma.style.display = "block";
        numero.style.display = "block";

        // Añadimos un evento al botón de idioma
        botonIdioma.addEventListener("click", function () {
            if (idioma === false) {
                // Cambiamos de español a inglés
                document.getElementById("labelNombre").innerHTML = "Name: ";
                document.getElementById("labelApellido").innerHTML = "Last Name: ";
                document.getElementById("labelCodigo").innerHTML = "Verification Code: ";
                document.getElementById("enviar").innerHTML = "Send";
                document.getElementById("labelUsuario").innerHTML = "Administrator user: ";
                document.getElementById("labelClave").innerHTML = "Password: ";
                document.getElementById("login").innerHTML = "Login";
                document.getElementById("idioma").innerHTML = "Change to Spanish";
                document.getElementById("salir").innerHTML = "Exit";
                idioma = true;
            } else {
                // Cambiamos de inglés a español
                document.getElementById("labelNombre").innerHTML = "Nombre: ";
                document.getElementById("labelApellido").innerHTML = "Apellidos: ";
                document.getElementById("labelCodigo").innerHTML = "Codigo Verificación: ";
                document.getElementById("enviar").innerHTML = "Enviar";
                document.getElementById("labelUsuario").innerHTML = "Usuario Administrador: ";
                document.getElementById("labelClave").innerHTML = "Clave de Acceso: ";
                document.getElementById("login").innerHTML = "Iniciar Sesión";
                document.getElementById("idioma").innerHTML = "Cambiar a ingés";
                document.getElementById("salir").innerHTML = "Salir";
                idioma = false;
            }
        });
        // Iniciamos el cronómetro para ocultar los botones después de 10 segundos
        var reloj = setInterval(function () {
            // Restamos el cronómetro
            var numero = document.getElementById("cronometro").innerHTML = "10";
            var numero = parseInt(document.getElementById('cronometro').innerHTML);
            numero--;
            document.getElementById('cronometro').innerHTML = numero;

            // Si el cronómetro llega a cero, ocultamos los botones y paramos el cronómetro
            if (numero <= 0) {
                clearInterval(reloj);
                botonSalir.style.display = "none";
                botonIdioma.style.display = "none";
                var numero = document.getElementById("cronometro").innerHTML = "Sesión cerrada.";
            }
        }, 1000); // Ejecutamos cada segundo
    }
}
//Funcion del cronómetro
function cronometro() {
    // Esta función se encargará de restar el cronometro hasta llegar a 0.
    var numero = parseInt(document.getElementById('cronometro').innerHTML);
    numero--;
    document.getElementById('cronometro').innerHTML = numero;
    if (numero == 0) {
        salirAdmin();
    }
}
function salirAdmin() {
    var botonIdioma = document.getElementById("idioma");
    var botonSalir = document.getElementById("salir");
    var numero = document.getElementById("cronometro");

    // Cambiamos el estilo de los botones de "none" a "block"
    botonSalir.style.display = "block";
    botonIdioma.style.display = "block";
    numero.style.display = "block";
}
