import java.util.Scanner;

public class Ej15_VictorStala {

    public static void main(String[] args) {
        boolean[] asientos = new boolean[10];
        Scanner scanner = new Scanner(System.in);

        while (true) {
            mostrarMenu();
            int eleccion = scanner.nextInt();

            if (eleccion == 1) {
                asignarAsientoPrimeraClase(asientos);
            } else if (eleccion == 2) {
                asignarAsientoEconomico(asientos);
            } else {
                System.out.println("Selección no válida. Por favor, elija 1 o 2.");
            }
        }
    }

    public static void mostrarMenu() {
        System.out.println("Por favor, escriba 1 para Primera Clase y 2 para Económico:");
    }

    public static void asignarAsientoPrimeraClase(boolean[] asientos) {
        for (int i = 0; i < 5; i++) {
            if (!asientos[i]) {
                asientos[i] = true;
                System.out.println("Asiento asignado en la sección de Primera Clase. Número de asiento: " + (i + 1));
                return;
            }
        }
        System.out.println("Lo siento, la sección de Primera Clase está llena. ¿Desea ser colocado en la sección de Económico? (Sí/No):");
        Scanner scanner = new Scanner(System.in);
        String respuesta = scanner.next();
        if (respuesta.equalsIgnoreCase("Sí")) {
            asignarAsientoEconomico(asientos);
        } else {
            System.out.println("El próximo vuelo sale en 3 horas.");
        }
    }

    public static void asignarAsientoEconomico(boolean[] asientos) {
        for (int i = 5; i < 10; i++) {
            if (!asientos[i]) {
                asientos[i] = true;
                System.out.println("Asiento asignado en la sección Económica. Número de asiento: " + (i + 1));
                return;
            }
        }
        System.out.println("Lo siento, la sección Económica está llena. ¿Desea ser colocado en la sección de Primera Clase? (Sí/No):");
        Scanner scanner = new Scanner(System.in);
        String respuesta = scanner.next();
        if (respuesta.equalsIgnoreCase("Sí")) {
            asignarAsientoPrimeraClase(asientos);
        } else {
            System.out.println("El próximo vuelo sale en 3 horas.");
        }
    }
}
