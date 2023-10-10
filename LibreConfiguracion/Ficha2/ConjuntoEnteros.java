import java.util.Arrays;

public class ConjuntoEnteros {
    private boolean[] conjunto;

    // Constructor sin argumentos
    public ConjuntoEnteros() {
        conjunto = new boolean[101]; // El rango es de 0 a 100
    }

    // Método para insertar un elemento en el conjunto
    public void insertarElemento(int elemento) {
        if (elemento >= 0 && elemento <= 100) {
            conjunto[elemento] = true;
        }
    }

    // Método para eliminar un elemento del conjunto
    public void eliminarElemento(int elemento) {
        if (elemento >= 0 && elemento <= 100) {
            conjunto[elemento] = false;
        }
    }

    // Método para verificar si un elemento está en el conjunto
    public boolean esta(int elemento) {
        if (elemento >= 0 && elemento <= 100) {
            return conjunto[elemento];
        }
        return false;
    }

    // Método para obtener una representación en cadena del conjunto
    public String aStringConjunto() {
        StringBuilder sb = new StringBuilder();
        boolean isEmpty = true;

        for (int i = 0; i <= 100; i++) {
            if (conjunto[i]) {
                if (!isEmpty) {
                    sb.append(" ");
                }
                sb.append(i);
                isEmpty = false;
            }
        }

        if (isEmpty) {
            return "---";
        }

        return sb.toString();
    }

    // Método para determinar si dos conjuntos son iguales
    public boolean esIgualA(ConjuntoEnteros otroConjunto) {
        return Arrays.equals(this.conjunto, otroConjunto.conjunto);
    }

    // Método estático para realizar la unión de dos conjuntos
    public static ConjuntoEnteros union(ConjuntoEnteros conjunto1, ConjuntoEnteros conjunto2) {
        ConjuntoEnteros resultado = new ConjuntoEnteros();

        for (int i = 0; i <= 100; i++) {
            resultado.conjunto[i] = conjunto1.conjunto[i] || conjunto2.conjunto[i];
        }

        return resultado;
    }

    // Método estático para realizar la intersección de dos conjuntos
    public static ConjuntoEnteros interseccion(ConjuntoEnteros conjunto1, ConjuntoEnteros conjunto2) {
        ConjuntoEnteros resultado = new ConjuntoEnteros();

        for (int i = 0; i <= 100; i++) {
            resultado.conjunto[i] = conjunto1.conjunto[i] && conjunto2.conjunto[i];
        }

        return resultado;
    }
}