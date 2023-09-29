import java.util.Scanner;

public class Ej13_VictorStala {
    // 13.- Escriba una aplicación que lea una línea de texto e imprima una tabla que indique el número de
    // palabras de una letra, de dos letras, de tres letras, etcétera, que aparezcan en el texto. Por ejemplo,
    // en la siguiente tabla se muestra la cuenta para la frase:
    public static void main(String[] args) {
        String texto = pedirCad();
        int[] conteoPalabrasPorLongitud = contarPalabrasPorLongitud(texto);
        imprimirTabla(conteoPalabrasPorLongitud);
    }

    public static int[] contarPalabrasPorLongitud(String texto) {
        String[] palabras = texto.split(" ");
        int[] conteoPalabrasPorLongitud = new int[101];
        for (String palabra : palabras) {
            int longitud = palabra.length();
            conteoPalabrasPorLongitud[longitud]++;
        }
        return conteoPalabrasPorLongitud;
    }

    public static void imprimirTabla(int[] conteoPalabrasPorLongitud) {
        System.out.println("Longitud de Palabra   Cantidad de Palabras");
        System.out.println("---------------------------------------");
        for (int longitud = 1; longitud < conteoPalabrasPorLongitud.length; longitud++) {
            int cantidad = conteoPalabrasPorLongitud[longitud];
            if (cantidad > 0) {
                System.out.println(longitud + "                     " + cantidad);
            }
        }
    }
    public static String pedirCad(){
        System.out.print("Introduce una cadena: ");
        return (new Scanner(System.in).nextLine());
    }
}
