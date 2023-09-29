import java.util.Scanner;

public class Ej6_VictorStala {
    public static void main(String[] args) {
        // 6.- Escriba una aplicación con base en el programa del ejercicio anterior, que reciba como entrada
        // una línea de texto y utilice el método indexOf de la clase String para determinar el número total de
        // ocurrencias de cada letra del alfabeto en ese texto. Las letras mayúsculas y minúsculas deben
        // contarse como una sola. Imprima los valores en formato tabular.
        String cad1=pedirCad();
        int indice,cantidad;
        int[] conteoLetras = new int[26];

        for (char letra = 'a'; letra <= 'z'; letra++) {
            indice = cad1.indexOf(letra);
            cantidad = 0;
            while (indice != -1) {
                cantidad++;
                indice = cad1.indexOf(letra, indice + 1);
            }
            if (cantidad > 0) {
                System.out.println(letra + "\t" + cantidad);
            }
        }
    }
    public static String pedirCad(){
        System.out.print("Introduce una cadena: ");
        return (new Scanner(System.in).nextLine().toLowerCase());
    }
}
