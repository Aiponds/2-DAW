import java.util.Scanner;

public class Ej8_VictorStala {
    public static void main(String[] args) {
        // 8.- Escriba una aplicación que lea una línea de texto y que imprima sólo aquellas palabras que
        // comiencen con las letras "ED"
        String cad1 = pedirCad();
        String[] palabras = cad1.split(" ");

        for (String palabra : palabras) {
            if (!palabra.isEmpty() && palabra.startsWith("ED")) {
                System.out.println(palabra);
            }
        }
    }
    public static String pedirCad(){
        System.out.print("Introduce una cadena: ");
        return (new Scanner(System.in).nextLine());
    }
}
