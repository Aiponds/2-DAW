import java.util.Scanner;

public class cuadradoDeCaracter {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        System.out.print("Ingrese el lado del cuadrado: ");
        int lado = scanner.nextInt();
        System.out.print("Ingrese el caracter de relleno: ");
        char caracterRelleno = scanner.next().charAt(0);

        cuadradoDeCaracter(lado, caracterRelleno);
    }

    public static void cuadradoDeCaracter(int lado, char caracterRelleno) {
        for (int i = 0; i < lado; i++) {
            for (int j = 0; j < lado; j++) {
                System.out.print(caracterRelleno);
            }
            System.out.println();
        }
    }
}
