import java.util.Scanner;

public class Ej11_VictorStala {
    public static void main(String[] args) {
        // 11.- Escriba sus propias versiones de los métodos de búsqueda indexOf y lastIndexOf de la clase String
        String texto = pedirCad();
        String busqueda = pedirCad();

        int indexOfResult = indexOf(texto, busqueda);
        int lastIndexOfResult = lastIndexOf(texto, busqueda);

        System.out.println("indexOf: " + indexOfResult);
        System.out.println("lastIndexOf: " + lastIndexOfResult);
    }
    public static int indexOf(String texto, String busqueda) {
        int textoLength = texto.length();
        int busquedaLength = busqueda.length();

        for (int i = 0; i <= textoLength - busquedaLength; i++) {
            boolean encontrado = true;
            for (int j = 0; j < busquedaLength; j++) {
                if (texto.charAt(i + j) != busqueda.charAt(j)) {
                    encontrado = false;
                    break;
                }
            }
            if (encontrado) {
                return i;
            }
        }

        return -1;
    }

    public static int lastIndexOf(String texto, String busqueda) {
        int textoLength = texto.length();
        int busquedaLength = busqueda.length();

        for (int i = textoLength - busquedaLength; i >= 0; i--) {
            boolean encontrado = true;
            for (int j = 0; j < busquedaLength; j++) {
                if (texto.charAt(i + j) != busqueda.charAt(j)) {
                    encontrado = false;
                    break;
                }
            }
            if (encontrado) {
                return i;
            }
        }

        return -1;
    }
    public static String pedirCad(){
        System.out.print("Introduce una cadena: ");
        return (new Scanner(System.in).nextLine());
    }
}

