public class PruebaConjuntoEnteros {
    public static void main(String[] args) {
        // Prueba de la clase ConjuntoEnteros
        ConjuntoEnteros conjuntoA = new ConjuntoEnteros();
        conjuntoA.insertarElemento(10);
        conjuntoA.insertarElemento(20);
        conjuntoA.insertarElemento(30);

        ConjuntoEnteros conjuntoB = new ConjuntoEnteros();
        conjuntoB.insertarElemento(20);
        conjuntoB.insertarElemento(40);
        conjuntoB.insertarElemento(50);

        System.out.println("Conjunto A: " + conjuntoA.aStringConjunto());
        System.out.println("Conjunto B: " + conjuntoB.aStringConjunto());

        ConjuntoEnteros unionAB = ConjuntoEnteros.union(conjuntoA, conjuntoB);
        System.out.println("Unión de A y B: " + unionAB.aStringConjunto());

        ConjuntoEnteros interseccionAB = ConjuntoEnteros.interseccion(conjuntoA, conjuntoB);
        System.out.println("Intersección de A y B: " + interseccionAB.aStringConjunto());

        ConjuntoEnteros conjuntoC = new ConjuntoEnteros();
        System.out.println("Conjunto C: " + conjuntoC.aStringConjunto());
    }
}
