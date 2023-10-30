function dividir(){
    /* Dividir nos numeros */
    var a = 4
    var b = 5
    var c = a / b
    document.getElementById("ejercicio3").innerHTML=("División de "+a+" / "+b+" = "+c);
    /* Dividir dos cadenas */
    var d = Paco
    var e = Juan
    var f = d / e
    document.getElementById("ejercicio3.1").innerHTML=("División de "+d+" / "+e+" = "+f);
    /* Dividir entre 0 */
    var g = 4
    var h = 0
    var i = g / h
    document.getElementById("ejercicio3.2").innerHTML=("División de "+g+" / "+h+" = "+i);
}