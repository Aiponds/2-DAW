import java.util.Scanner;

public class cuadradoDeAsteriscos {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        System.out.print("Ingrese el lado del cuadrado: ");
        int lado = scanner.nextInt();

        cuadradoDeAsteriscos(lado);
    }

    public static void cuadradoDeAsteriscos(int lado) {
        for (int i = 0; i < lado; i++) {
            for (int j = 0; j < lado; j++) {
                System.out.print("*");
            }
            System.out.println();
        }
    }
}
