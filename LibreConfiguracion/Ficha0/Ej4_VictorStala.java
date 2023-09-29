import java.util.Scanner;

public class Ej4_VictorStala {
    public static void main(String[] args) {
        // 4.- Escriba una aplicación que reciba como entrada una línea de texto y que la imprima dos veces;
        // una vez en letras mayúsculas y otra en letras minúsculas.
        String cad1;
        cad1 = pedirCad();
        System.out.println("Cadena en minuscula: "+cad1.toLowerCase());
        System.out.println("Cadena en mayúsculas: "+cad1.toUpperCase());
    }
    public static String pedirCad(){
        System.out.print("Introduce una cadena: ");
        return (new Scanner(System.in).nextLine());
    }
}
