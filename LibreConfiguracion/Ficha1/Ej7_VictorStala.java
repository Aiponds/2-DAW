package Ficha1;

import java.util.Scanner;

public class Ej7_VictorStala {
    public static void main(String[] args) {
        // 7.- Escriba una aplicación que lea una línea de texto y que imprima sólo aquellas palabras que
        // comiencen con la letra "b"
        String cad1 = pedirCad();
        String[] palabras = cad1.split(" ");

        for (String palabra : palabras) {
            if (!palabra.isEmpty() && palabra.charAt(0) == 'b') {
                System.out.println(palabra);
            }
        }
    }
    public static String pedirCad(){
        System.out.print("Introduce una cadena: ");
        return (new Scanner(System.in).nextLine().toLowerCase());
    }
}
