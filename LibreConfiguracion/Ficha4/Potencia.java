import java.util.Scanner;

public class Potencia {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);

        System.out.print("Ingrese la base: ");
        int base = scanner.nextInt();
        System.out.print("Ingrese el exponente (debe ser un entero positivo distinto de cero): ");
        int exponente = scanner.nextInt();

        int resultado = enteroPotencia(base, exponente);
        System.out.printf("%d elevado a la %d es igual a %d%n", base, exponente, resultado);

        int resultadoRecursivo = enteroPotenciaRecursivo(base, exponente);
        System.out.printf("(Recursivo) %d elevado a la %d es igual a %d%n", base, exponente, resultadoRecursivo);
    }

    public static int enteroPotencia(int base, int exponente) {
        int resultado = 1;
        for (int i = 1; i <= exponente; i++) {
            resultado *= base;
        }
        return resultado;
    }

    public static int enteroPotenciaRecursivo(int base, int exponente) {
        if (exponente == 0) {
            return 1;
        } else {
            return base * enteroPotenciaRecursivo(base, exponente - 1);
        }
    }
}
