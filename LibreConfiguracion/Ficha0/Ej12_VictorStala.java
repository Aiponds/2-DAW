import java.util.Scanner;

public class Ej12_VictorStala {
    public static void main(String[] args) {
        // 12.- Escriba una aplicación que lea una línea de texto desde el teclado e imprima una tabla que
        // indique el número de ocurrencias de cada letra del alfabeto en el texto. Por ejemplo, la frase:
        // Ser o no ser: ése es el dilema:
        // contiene una “a”, ninguna “b”, ninguna “c”, etcétera.
        String texto = pedirCad();
        int[] ocurrencias = contarLetras(texto);
        imprimirTabla(ocurrencias);
    }

    public static int[] contarLetras(String texto) {
        int[] ocurrencias = new int[26];

        for (char caracter : texto.toCharArray()) {
            caracter = Character.toLowerCase(caracter);
            if (Character.isLetter(caracter)) {
                int indice = caracter - 'a';
                ocurrencias[indice]++;
            }
        }
        return ocurrencias;
    }

    public static void imprimirTabla(int[] ocurrencias) {
        System.out.println("Letra   Ocurrencias");
        System.out.println("-------------------");
        for (char letra = 'a'; letra <= 'z'; letra++) {
            int indice = letra - 'a';
            int cantidad = ocurrencias[indice];
            System.out.println(letra + "       " + cantidad);
        }

    }    
    public static String pedirCad(){
        System.out.print("Introduce una cadena: ");
        return (new Scanner(System.in).nextLine());
    }
}
