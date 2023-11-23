public class NumerosPerfectos {

    public static void main(String[] args) {
        System.out.println("Números perfectos entre 1 y 1000:");

        for (int i = 1; i <= 1000; i++) {
            if (esNumeroPerfecto(i)) {
                System.out.println(i + " es un número perfecto. Factores: " + obtenerFactores(i));
            }
        }
    }

    // Método para verificar si un número es perfecto
    public static boolean esNumeroPerfecto(int numero) {
        int suma = 0;

        for (int i = 1; i <= numero / 2; i++) {
            if (numero % i == 0) {
                suma += i;
            }
        }

        return suma == numero;
    }

    // Método para obtener los factores de un número
    public static String obtenerFactores(int numero) {
        StringBuilder factores = new StringBuilder();

        for (int i = 1; i <= numero / 2; i++) {
            if (numero % i == 0) {
                factores.append(i).append(" ");
            }
        }

        return factores.toString();
    }
}
