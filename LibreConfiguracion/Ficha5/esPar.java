import java.util.Scanner;

public class esPar {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        System.out.print("Ingrese un número entero: ");
        int numero = scanner.nextInt();

        if (esPar(numero)) {
            System.out.println("El número es par.");
        } else {
            System.out.println("El número es impar.");
        }
    }

    public static boolean esPar(int num) {
        return num % 2 == 0;
    }
}