import java.util.Scanner;

public class Redondeo {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);

        while (true) {
            System.out.print("Ingrese un número double (o -1 para salir): ");
            double numero = scanner.nextDouble();

            if (numero == -1) {
                break;
            }

            double redondeado = Math.floor(numero + 0.5);

            System.out.printf("Número original: %.2f, Redondeado: %.0f%n", numero, redondeado);
        }
    }
}
