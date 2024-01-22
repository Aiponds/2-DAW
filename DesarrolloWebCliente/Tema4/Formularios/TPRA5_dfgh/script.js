window.onload = function () {
    // Obtenemos todos los elementos.
    var nombre = document.getElementById('nombre');
    var apellidos = document.getElementById('apellidos');
    var edad = document.getElementById('edad');
    var nif = document.getElementById('nif');
    var provincia = document.getElementById('provincia');
    var fecha = document.getElementById('fecha');
    var telefono = document.getElementById('telefono');
    var hora = document.getElementById('hora');
    var errores = document.getElementById('errores');
    var formulario = document.getElementById('formulario'); // Asegúrate de tener un id 'formulario' en tu elemento de formulario

    // Verificamos los elementos con eventos y un metodo para cada uno.
    nombre.addEventListener('blur', validarTexto);
    apellidos.addEventListener('blur', validarTexto);
    edad.addEventListener('blur', validarEdad);
    nif.addEventListener('blur', validarNIF);
    provincia.addEventListener('change', validarProvincia);
    fecha.addEventListener('blur', validarFecha);
    telefono.addEventListener('blur', validarTelefono);
    hora.addEventListener('blur', validarHora);
    // Hacemos comprobación al enviar el formulario.
    formulario.addEventListener('submit', function(event) {
        // Pide confirmación de envío del formulario
        var confirmar = confirm('¿Estás seguro de que quieres enviar el formulario?');
        if (!confirmar) {
            // Si el usuario no confirma, cancela el envío
            event.preventDefault();
            return;
        }

        // Comprueba que no haya campos vacíos
        var campos = [nombre, apellidos, edad, nif, provincia, fecha, telefono, hora];
        for (var i = 0; i < campos.length; i++) {
            if (campos[i].value.trim() === '') {
                // Si hay un campo vacío, muestra un mensaje de error y cancela el envío
                errores.textContent = 'El campo ' + campos[i].id + ' no puede estar vacío';
                campos[i].focus();
                event.preventDefault();
                return;
            }
        }

        // Si no hay errores, limpia el mensaje de error
        errores.textContent = '';
    });
}

// Función para validar el campo
function validarTexto() {
    try {
        this.value = this.value.toUpperCase();
        // Expresión regular para validar que solo contenga letras y espacios
        var regex = /^[A-ZÁÉÍÓÚÑ ]+$/;
        // Si el campo está vacío 
        if (this.value.trim() === '') {
            throw new Error('El campo ' + this.id + ' no puede estar vacío');
        }
        // Si no cumple con la expresión regular
        if (!regex.test(this.value)) {
            throw new Error('El campo ' + this.id + ' no cumple la expresión regular')
        }
        // Si no hay error, limpia el mensaje de error
        errores.textContent = '';
    } catch (error) {
        // Muestra el mensaje de error
        errores.textContent = error.message;
        // Pone el foco en el campo
        this.focus();
    }
}
function validarEdad() {
    try {
        var regex = /^\d+$/;
        // Si el campo está vacío 
        if (this.value.trim() === '') {
            throw new Error('El campo ' + this.id + ' no puede estar vacío');
        }
        // Si no cumple con la expresión regular
        if (!regex.test(this.value)) {
            throw new Error('El campo ' + this.id + ' no es un numero')
        }
        // Validamos que el campo cumpla el rango de 0 a 105
        if (regex.test(this.value)) {
            // Convierte la cadena a un número
            var numero = parseInt(this.value, 10);
            // Si no esta en el rango del 0 al 105
            if (!(numero >= 0 && numero <= 105)) {
                throw new Error('El campo ' + this.id + ' no esta en el rango de 0 a 105')
            }
        }
        // Si no hay error, limpia el mensaje de error
        errores.textContent = '';
    } catch (error) {
        // Muestra el mensaje de error
        errores.textContent = error.message;
        // Pone el foco en el campo
        this.focus();
    }
}
function validarNIF() {
    try {
        // Expresión regular para validar el NIF
        // ^: Inicio de la cadena
        // \d{8}: Exactamente 8 dígitos
        // -: Un guión
        // [A-Z]: Una letra mayúscula
        // $: Fin de la cadena
        var regex = /^\d{8}-[A-Z]$/;
        // Si el campo está vacío 
        if (this.value.trim() === '') {
            throw new Error('El campo ' + this.id + ' no puede estar vacío');
        }
        if (!regex.test(this.value)) {
            throw new Error('El campo ' + this.id + ' debe contener exactamente 8 números, un guión y una letra mayúscula');
        }
        // Si no hay error, limpia el mensaje de error
        errores.textContent = '';
    } catch (error) {
        // Muestra el mensaje de error
        errores.textContent = error.message;
        // Pone el foco en el campo
        this.focus();
    }
}
function validarEmail() {
    try {
        // Expresión regular para validar el email
        // ^: Inicio de la cadena
        // [^@]+: Uno o más caracteres que no sean '@'
        // @: Un '@'
        // [^@]+: Uno o más caracteres que no sean '@'
        // \.: Un '.'
        // [a-z]{2,}: Dos o más caracteres en minúsculas
        // $: Fin de la cadena
        var regex = /^[^@]+@[^@]+\.[a-z]{2,}$/;
        if (this.value.trim() === '') {
            throw new Error('El campo ' + this.id + ' no puede estar vacío');
        }
        if (!regex.test(this.value)) {
            throw new Error('El campo ' + this.id + ' debe seguir un formato correcto (ejemplo: nombre@dominio.com)');
        }
        // Si no hay error, limpia el mensaje de error
        errores.textContent = '';
    } catch (error) {
        // Muestra el mensaje de error
        errores.textContent = error.message;
        // Pone el foco en el campo
        this.focus();
    }
}
function validarProvincia() {
    try {
        // Si el valor seleccionado es '0', significa que no se ha seleccionado ninguna provincia
        if (this.value === '0') {
            throw new Error('Debes seleccionar una provincia');
        }
        // Si no hay error, limpia el mensaje de error
        errores.textContent = '';
    } catch (error) {
        // Muestra el mensaje de error
        errores.textContent = error.message;
        // Pone el foco en el campo
        this.focus();
    }
}
function validarFecha() {
    try {
        // Expresión regular para validar la fecha
        // ^: Inicio de la cadena
        // (0[1-9]|[12][0-9]|3[01]): Día (01-31)
        // (\/|-): Separador '/' o '-'
        // (0[1-9]|1[012]): Mes (01-12)
        // (\/|-): Separador '/' o '-'
        // (19|20)\d\d: Año (1900-2099)
        // $: Fin de la cadena
        var regex = /^(0[1-9]|[12][0-9]|3[01])(\/|-)(0[1-9]|1[012])\2(19|20)\d\d$/;
        if (this.value.trim() === '') {
            throw new Error('El campo ' + this.id + ' no puede estar vacío');
        }
        if (!regex.test(this.value)) {
            throw new Error('El campo ' + this.id + ' debe seguir un formato correcto (dd/mm/aaaa o dd-mm-aaaa)');
        }
        // Si no hay error, limpia el mensaje de error
        errores.textContent = '';
    } catch (error) {
        // Muestra el mensaje de error
        errores.textContent = error.message;
        // Pone el foco en el campo
        this.focus();
    }
}
function validarTelefono() {
    try {
        // Expresión regular para validar el teléfono
        // ^: Inicio de la cadena
        // [678]: El primer dígito debe ser un 6, 7 u 8
        // \d{8}: Los siguientes 8 dígitos pueden ser cualquier número
        // $: Fin de la cadena
        var regex = /^[678]\d{8}$/;
        if (this.value.trim() === '') {
            throw new Error('El campo ' + this.id + ' no puede estar vacío');
        }
        if (!regex.test(this.value)) {
            throw new Error('El campo ' + this.id + ' debe comenzar con 6, 7 u 8 y contener exactamente 9 dígitos');
        }
        // Si no hay error, limpia el mensaje de error
        errores.textContent = '';
    } catch (error) {
        // Muestra el mensaje de error
        errores.textContent = error.message;
        // Pone el foco en el campo
        this.focus();
    }
}
function validarHora() {
    try {
        // Expresión regular para validar la hora
        // ^: Inicio de la cadena
        // ([01]?[0-9]|2[0-3]): Hora (00-23)
        // : Un ':'
        // [0-5][0-9]: Minutos (00-59)
        // $: Fin de la cadena
        var regex = /^([01]?[0-9]|2[0-3]):[0-5][0-9]$/;
        if (this.value.trim() === '') {
            throw new Error('El campo ' + this.id + ' no puede estar vacío');
        }
        if (!regex.test(this.value)) {
            throw new Error('El campo ' + this.id + ' debe seguir un formato correcto (hh:mm)');
        }
        // Si no hay error, limpia el mensaje de error
        errores.textContent = '';
    } catch (error) {
        // Muestra el mensaje de error
        errores.textContent = error.message;
        // Pone el foco en el campo
        this.focus();
    }
}