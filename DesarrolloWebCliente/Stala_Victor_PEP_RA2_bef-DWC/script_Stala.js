//Victor Stala
function ejercicioTriangulo(){
    //Inicio los contadores de la cantidad de triangulos de un tipo según sus lados
    var equilatero = 0;
    var isosceles = 0;
    var escaleno = 0;

    //Hago las 4 peticiones de triangulos.
    pedirTriangulo();
    pedirTriangulo();
    pedirTriangulo();
    pedirTriangulo();
    
    var mensaje = ("Equilateros: "+equilatero+", Escalenos: "+escaleno+", Isosceles: "+isosceles);
    alert(mensaje);

    //Comprueba cual es el que menor cantidad aparece y lo muestra con un alert.
    if((equilatero<isosceles)&&(equilatero<escaleno)){
        alert("El triángulo en menor cantidad es el equilatero: "+equilatero);
    } else if((isosceles<equilatero)&&(isosceles<escaleno)){
        alert("El triángulo en menor cantidad es el isósceles: "+isosceles);
    } else {
        alert("El triángulo en menor cantidad es el escaleno: "+escaleno);
    }
    function pedirTriangulo(){
        //Recibo números y comprobar que sea válido el lado.
        var numsValido = false;
        do {
            //Introduce un numero y lo fuerzo a entero
            var numAB = prompt("Introduce el valor del lado AB del triángulo: ");
            numAB = parseInt(numAB);
            //Introduce un numero y lo fuerzo a entero
            var numCA = prompt("Introduce el valor del lado CA del triángulo: ");
            numCA = parseInt(numCA);
            //Introduce un numero y lo fuerzo a entero
            var numBC = prompt("Introduce el valor del lado CA del triángulo: ");
            numBC = parseInt(numBC);
            if((numAB>0) && (numAB!=isNaN) && (numBC>0) && (numBC!=isNaN) && (numCA>0) && (numCA!=isNaN)){
                numsValido=true;
            } else {
                numsValido=false;
            }
            //Si cumple las condiciones previas, sale del bucle y devuelve el numero.
        }while(numsValido==false);
        //Clasificamos segun los lados
        //si todos sus lados son iguales
        if((numAB==numBC)&&(numBC==numCA)){
            equilatero=equilatero+1;
        //si dos de sus lados son iguales y el otro es distinto
        } else if(((numAB==numBC)&&(numCA!=numAB)&&(numCA!=numBC)) || ((numAB==numCA)&&(numBC!=numAB)&&(numBC!=numCA))|| ((numBC==numCA)&&(numAB!=numBC)&&(numAB!=numCA))){
            isosceles=isosceles+1;
        // si ninguno de los lados es igual
        } else if((numAB!=numBC)&&(numBC!=numCA)){
            escaleno=escaleno+1;
        }
    }
}
//Se ejecuta cuando se carga la pagina
ejercicioTriangulo();