import java.util.Scanner;

public class mostrarDigitos {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        System.out.print("Ingrese un número entre 1 y 99999: ");
        int numero = scanner.nextInt();

        mostrarDigitos(numero);
    }

    public static void mostrarDigitos(int numero) {
        String numeroStr = String.valueOf(numero);
        for (int i = 0; i < numeroStr.length(); i++) {
            System.out.print(numeroStr.charAt(i) + "  ");
        }
        System.out.println();
    }
}
