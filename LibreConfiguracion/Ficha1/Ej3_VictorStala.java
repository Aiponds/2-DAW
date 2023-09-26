package LibreConfiguracion.Ficha1;

import java.util.Scanner;

public class Ej3_VictorStala {
    public static void main(String[] args) {
        // 3.- Escriba una aplicación que utilice el método compareTo de la clase String para comparar dos
        // cadenas introducidas por el usuario. Muestre si la primera cadena es menor, igual o mayor que la segunda.
        String cad1,cad2;
        cad1 = pedirCad();
        cad2 = pedirCad();
        int resultado = cad1.compareTo(cad2);

        if (resultado < 0) {
            System.out.println("La cadena 1 es mayor que cadena 2");
        } else if (resultado == 0) {
            System.out.println("La cadena 1 y cadena 2 son iguales");
        } else {
            System.out.println("La cadena 1 es menor que cadena 2");
        }
    }
    public static String pedirCad(){
        System.out.print("Introduce una cadena: ");
        return (new Scanner(System.in).nextLine());
    }
}
