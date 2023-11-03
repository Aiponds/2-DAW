import java.util.Scanner;

public class Multiplos {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);

        while (true) {
            System.out.print("Ingrese el primer número (o -1 para salir): ");
            int primerNumero = scanner.nextInt();

            if (primerNumero == -1) {
                break;
            }

            System.out.print("Ingrese el segundo número: ");
            int segundoNumero = scanner.nextInt();

            boolean esMultiplo = esMultiplo(primerNumero, segundoNumero);

            if (esMultiplo) {
                System.out.println(segundoNumero + " es múltiplo de " + primerNumero);
            } else {
                System.out.println(segundoNumero + " no es múltiplo de " + primerNumero);
            }
        }
    }

    public static boolean esMultiplo(int primerNumero, int segundoNumero) {
        // Usar el operador de residuo para verificar si el segundo número es múltiplo del primero
        return segundoNumero % primerNumero == 0;
    }
}
