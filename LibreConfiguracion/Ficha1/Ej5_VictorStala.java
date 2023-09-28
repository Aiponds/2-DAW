package Ficha1;

import java.util.Scanner;

public class Ej5_VictorStala {
    public static void main(String[] args) {
        // 5.- Escriba una aplicación que reciba como entrada una línea de texto y un carácter de búsqueda, y
        // que utilice el método indexOf de la clase String para determinar el número de ocurrencias de ese carácter en el texto
        String cad1;
        char c;
        int indice=-1, contador=0; // inicio indice a -1 para que cuente desde la posicion 0 en la búsqueda.
        cad1 = pedirCad();
        System.out.println("Introduce un caracter de búsqueda: ");
        c = new Scanner(System.in).next().charAt(0);
        do {
            indice = cad1.indexOf(c, indice+1); //sumo 1 a indice para que avance la busqueda.
            if(indice!=-1){
                contador++;
            }
        } while (indice!=-1);
        System.out.println("La letra "+c+" se encuentra "+contador+" veces en la cadena.");
    }
    public static String pedirCad(){
        System.out.print("Introduce una cadena: ");
        return (new Scanner(System.in).nextLine());
    }
}
