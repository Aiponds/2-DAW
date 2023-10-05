import java.util.Scanner;

public class Ej16_VictorStala {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);

        double[][] ventas = new double[5][4]; // 5 productos x 4 vendedores

        System.out.println("Ingrese la información de las ventas del último mes:");

        while (true) {
            System.out.print("Número del vendedor (1-4, o 0 para salir): ");
            int vendedor = scanner.nextInt();

            if (vendedor == 0) {
                break; // Salir del bucle si el usuario ingresa 0
            }

            if (vendedor < 1 || vendedor > 4) {
                System.out.println("Número de vendedor no válido. Intente de nuevo.");
                continue;
            }

            System.out.print("Número del producto (1-5): ");
            int producto = scanner.nextInt();

            if (producto < 1 || producto > 5) {
                System.out.println("Número de producto no válido. Intente de nuevo.");
                continue;
            }

            System.out.print("Valor total en euros: ");
            double valor = scanner.nextDouble();

            ventas[producto - 1][vendedor - 1] += valor;
        }

        // Imprimir encabezados de vendedores
        System.out.print("\tVendedor 1\tVendedor 2\tVendedor 3\tVendedor 4\tTotal por Producto\n");

        // Imprimir ventas por producto
        for (int i = 0; i < 5; i++) {
            double totalPorProducto = 0;
            System.out.print("Producto " + (i + 1) + ":\t");

            for (int j = 0; j < 4; j++) {
                System.out.print(ventas[i][j] + "\t\t");
                totalPorProducto += ventas[i][j];
            }

            System.out.println(totalPorProducto);
        }

        // Calcular y mostrar total por vendedor
        System.out.print("Total por Vendedor:\t");
        double totalPorVendedor = 0;
        for (int j = 0; j < 4; j++) {
            double totalPorVendedorActual = 0;
            for (int i = 0; i < 5; i++) {
                totalPorVendedorActual += ventas[i][j];
            }
            System.out.print(totalPorVendedorActual + "\t\t");
            totalPorVendedor += totalPorVendedorActual;
        }
        System.out.println(totalPorVendedor);
    }
}
