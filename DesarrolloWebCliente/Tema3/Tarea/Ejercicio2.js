function coche(modelo,color,kms,combustible){
    this.modelo = modelo;
    this.color = color;
    this.kms = kms;
    this.combustible = combustible;
}
var elmio = new coche("Mercedes E330","negro",120000,"diésel");
var eltuyo = new coche("BMW 318","blanco",210000,"gasolina");

//delete elmio.matriculoa; no funciona porque el atributo matricula no existe
// Imprimir estado antes de eliminar el atributo
console.log("Estado antes de eliminar el atributo:");
console.log(elmio);

// Intentar borrar el atributo modelo
delete elmio.modelo;

// Imprimir estado después de intentar eliminar el atributo
console.log("\nEstado después de intentar eliminar el atributo 'modelo':");
console.log(elmio);