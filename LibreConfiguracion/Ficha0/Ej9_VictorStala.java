import java.util.InputMismatchException;
import java.util.Scanner;

public class Ej9_VictorStala {
    public static void main(String[] args) {
        //  9.- Escriba una aplicación que reciba como entrada un código entero para un carácter y que muestre
        //  el carácter correspondiente. 
        int codigo = pedirInt();
        System.out.println("Caracter: "+(char)codigo);
    }
    public static int pedirInt(){
        int codigo=0;
        try {
            System.out.print("Introduce un codigo en int: ");
            codigo=new Scanner(System.in).nextInt();
        } catch (InputMismatchException e) {
            pedirInt();
        }
        return codigo;
    }
}
