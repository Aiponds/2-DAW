import java.util.Random;
import java.util.Scanner;

public class AdivinaElNumero {

    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        Random random = new Random();

        do {
            jugarJuego(random);

            System.out.println("¿Quieres jugar de nuevo? (1 para Sí, 0 para No):");
        } while (scanner.nextInt() == 1);

        System.out.println("Gracias por jugar. ¡Hasta luego!");
        scanner.close();
    }

    public static void jugarJuego(Random random) {
        int numeroAdivinar = random.nextInt(1000) + 1;
        int intento;
        int intentosRealizados = 0;

        System.out.println("Adivina el número entre 1 y 1000.");

        do {
            System.out.print("Introduce tu intento: ");
            intento = obtenerIntento();

            if (intento > numeroAdivinar) {
                System.out.println("Demasiado alto. Inténtalo de nuevo.");
            } else if (intento < numeroAdivinar) {
                System.out.println("Demasiado bajo. Inténtalo de nuevo.");
            }

            intentosRealizados++;
        } while (intento != numeroAdivinar);

        System.out.println("¡Felicidades! Adivinaste el número en " + intentosRealizados + " intentos.");
    }

    public static int obtenerIntento() {
        Scanner scanner = new Scanner(System.in);
        while (!scanner.hasNextInt()) {
            System.out.println("Por favor, ingresa un número válido.");
            scanner.next();
        }
        return scanner.nextInt();
    }
}
