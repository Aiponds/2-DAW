var miVentana;
const usuarioObj = {
    nombre: "alumno",
    contrasena: "bueno",
    ultimaFechaHora: "",
    cambiarContrasena(contrasena) {
        this.contrasena = contrasena;
    },
};
var arrayNumeros = [];
function abrirVentana1() {
    // Abre una nueva ventana
    // Al no poner coordenadas ya se abre arriba a la izquierda.
    var miVentana = window.open('ventana1.html', 'Ventana 1', 'width=300,height=300,resizable=no');
    // Espera a que la ventana se cargue completamente
    miVentana.onload = function () {
        //Pongo el color de fondo verde claro.
        miVentana.document.body.style.backgroundColor = 'lightgreen';
    };
}
function abrirVentana2() {
    // Abre una nueva ventana
    var miVentana = window.open('ventana2.html', 'Ventana 2', 'width=300,height=300,resizable=no, left=1920 ');
    // Espera a que la ventana se cargue completamente
    miVentana.onload = function () {
        //Pongo el color de fondo azul claro.
        miVentana.document.body.style.backgroundColor = 'lightblue';
        // 
        var longitudLista = document.getElementById(numeros);
        var numValoresAleatorios = document.getElementById(numerosAle);
        //Creo un array y le meto valores de 1 a X.
        for (var i = 1; i < longitudLista; i++) {
            arrayNumeros.push(i);
        }
        //Lo paso a string para visualizarlo.
        var arrayString = arrayNumeros.toString;
        document.getElementById("arrayMuestra").innerHTML = arrayString;
    };
}
function abrirVentana3() {
    // Abre una nueva ventana
    var miVentana = window.open('ventana3.html', 'Ventana 3', 'width=300,height=300,resizable=no, top=1080');
    // Espera a que la ventana se cargue completamente
    miVentana.onload = function () {
        //Pongo el color de fondo rosa claro.
        miVentana.document.body.style.backgroundColor = 'lightpink';
        
    };
}
function abrirVentana4() {
    // Abre una nueva ventana
    var miVentana = window.open('ventana4.html', 'Ventana 4', 'width=300,height=300,resizable=no, top=1080, left=1920');
    // Espera a que la ventana se cargue completamente
    miVentana.onload = function () {
        //Pongo el color de fondo naranja.
        miVentana.document.body.style.backgroundColor = 'orange';
        mostrarCredenciales();
    };
}
//Funcion para cerrar la ventana. (no se porque no funciona)
function cerrarVentana() {
    if (miVentana) {
        miVentana.close();
    }
}

function verificarUsuario() {
    //Recogo las variables del objeto y de la ventana.
    var usuario = document.getElementById("usuario").value;
    var contrasena = document.getElementById("contrasena").value;
    var contrasenaNueva = document.getElementById("contrasenaNueva").value;
    var usuarioCorrecto = usuarioObj.nombre;
    var contrasenaCorrecto = usuarioObj.contrasena
    //Si coincide con el usuario y contraseña almacenados le cambia la contraseña a la nueva.
    if (usuario == usuarioCorrecto && contrasena == contrasenaCorrecto) {
        alert("Datos correctos, ¿Deseas cambiar la contraseña?");
        usuarioObj.cambiarContrasena(contrasenaNueva);
        usuarioObj.ultimaFechaHora = obtenerFechaHoraActual();
    } else {
        alert("Datos incorrectos ¿Quieres intentarlo de nuevo?");
    }
}
function obtenerFechaHoraActual() {
    //Metodo que recoga la fecha y hora completa.
    return new Date.now();
}
function mostrarCredenciales() {
    var usuarioCorrecto = usuarioObj.nombre;
    var contrasenaCorrecto = usuarioObj.contrasena
    var fecha = usuarioObj.ultimaHora;
    document.getElementById("user").innerHTML = usuarioCorrecto;
    document.getElementById("pass").innerHTML = contrasenaCorrecto;
    document.getElementById("date").innerHTML = fecha;
}