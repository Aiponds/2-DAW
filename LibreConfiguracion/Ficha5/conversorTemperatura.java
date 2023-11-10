import java.util.Scanner;

public class conversorTemperatura {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        System.out.println("Seleccione la conversión:");
        System.out.println("1. Fahrenheit a Celsius");
        System.out.println("2. Celsius a Fahrenheit");
        int opcion = scanner.nextInt();

        if (opcion == 1) {
            System.out.print("Ingrese la temperatura en Fahrenheit: ");
            double fahrenheit = scanner.nextDouble();
            double celsius = fahrenheitACelsius(fahrenheit);
            System.out.println("La temperatura en Celsius es: " + celsius);
        } else if (opcion == 2) {
            System.out.print("Ingrese la temperatura en Celsius: ");
            double celsius = scanner.nextDouble();
            double fahrenheit = celsiusAFahrenheit(celsius);
            System.out.println("La temperatura en Fahrenheit es: " + fahrenheit);
        } else {
            System.out.println("Opción no válida");
        }
    }

    public static double fahrenheitACelsius(double fahrenheit) {
        return (fahrenheit - 32) * 5.0 / 9.0;
    }

    public static double celsiusAFahrenheit(double celsius) {
        return (celsius * 9.0 / 5.0) + 32;
    }
}
