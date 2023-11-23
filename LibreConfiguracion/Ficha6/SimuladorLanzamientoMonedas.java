import java.util.Random;
import java.util.Scanner;

public class SimuladorLanzamientoMonedas {

    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);

        int caras = 0;
        int cruces = 0;

        System.out.println("Simulador de Lanzamiento de Monedas");

        while (true) {
            System.out.println("1. Lanzar moneda");
            System.out.println("2. Salir");

            int opcion = scanner.nextInt();

            if (opcion == 1) {
                boolean resultado = tirar();
                if (resultado) {
                    System.out.println("Cruz");
                    cruces++;
                } else {
                    System.out.println("Cara");
                    caras++;
                }
            } else if (opcion == 2) {
                break;
            } else {
                System.out.println("Opción no válida. Por favor, seleccione 1 o 2.");
            }
        }

        System.out.println("Resultados:");
        System.out.println("Caras: " + caras);
        System.out.println("Cruces: " + cruces);

        scanner.close();
    }

    // Método para simular el lanzamiento de una moneda
    public static boolean tirar() {
        Random random = new Random();
        return random.nextBoolean();
    }
}
