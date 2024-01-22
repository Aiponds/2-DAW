var tabla = document.getElementById("tabla1");
var valorBorder = parseInt(tabla.getAttribute("border"));

function mostrarValor() {
    alert('Borde: ' + valorBorder);
}

function aumentarGrosor() {
    valorBorder++;
    tabla.setAttribute("border", valorBorder.toString());
}

function reducirGrosor() {
    if (valorBorder > 0) {
        valorBorder--;
        tabla.setAttribute("border", valorBorder.toString());
    }
}
