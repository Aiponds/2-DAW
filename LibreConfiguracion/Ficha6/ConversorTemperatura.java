import java.util.Scanner;

public class ConversorTemperatura {

    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);

        System.out.println("Seleccione la conversión que desea realizar:");
        System.out.println("1. Fahrenheit a Centígrados");
        System.out.println("2. Centígrados a Fahrenheit");

        int opcion = scanner.nextInt();

        if (opcion == 1) {
            System.out.println("Ingrese la temperatura en grados Fahrenheit:");
            double fahrenheit = scanner.nextDouble();
            double centigrados = convertirFahrenheitACentigrados(fahrenheit);
            System.out.println("Equivalente en grados Centígrados: " + centigrados);
        } else if (opcion == 2) {
            System.out.println("Ingrese la temperatura en grados Centígrados:");
            double centigrados = scanner.nextDouble();
            double fahrenheit = convertirCentigradosAFahrenheit(centigrados);
            System.out.println("Equivalente en grados Fahrenheit: " + fahrenheit);
        } else {
            System.out.println("Opción no válida. Por favor, seleccione 1 o 2.");
        }

        scanner.close();
    }

    // Método para convertir de Fahrenheit a Centígrados
    public static double convertirFahrenheitACentigrados(double fahrenheit) {
        return 5.0 / 9.0 * (fahrenheit - 32);
    }

    // Método para convertir de Centígrados a Fahrenheit
    public static double convertirCentigradosAFahrenheit(double centigrados) {
        return 9.0 / 5.0 * centigrados + 32;
    }
}