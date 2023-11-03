import java.util.Scanner;

public class Estacionamiento {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        double totalRecibos = 0;

        while (true) {
            System.out.print("Ingrese las horas de estacionamiento (-1 para salir): ");
            double horasEstacionamiento = scanner.nextDouble();

            if (horasEstacionamiento == -1) {
                break;
            }

            double pagoCliente = calcularPagos(horasEstacionamiento);
            System.out.printf("El pago para este cliente es: %.2f€%n", pagoCliente);
            totalRecibos += pagoCliente;
        }

        System.out.printf("El total de recibos de ayer es: %.2f€%n", totalRecibos);
    }

    public static double calcularPagos(double horasEstacionamiento) {
        double tarifaMinima = 2.00;
        double tarifaPorHora = 0.50;
        double tarifaMaxima = 10.00;
        double pagoCliente = 0;

        if (horasEstacionamiento <= 3) {
            pagoCliente = tarifaMinima;
        } else if (horasEstacionamiento <= 24) {
            pagoCliente = tarifaMinima + Math.min(21, horasEstacionamiento - 3) * tarifaPorHora;
        } else {
            pagoCliente = tarifaMaxima;
        }

        return pagoCliente;
    }
}
