import java.util.Scanner;

public class Ej10_VictorStala {
    public static void main(String[] args) {
        // 10.- Modifique la aplicación anterior de manera que genere todos los posibles códigos de tres
        // dígitos en el rango de 000 a 255, y que intente imprimir los caracteres correspondientes.
        for (int codigo = 0; codigo <= 255; codigo++) {
            System.out.println("Código: " + codigo + ", Caracter: " + (char) codigo);
        }
    }
}
