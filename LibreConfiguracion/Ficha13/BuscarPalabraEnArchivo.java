import java.io.BufferedReader;
import java.io.File;
import java.io.FileReader;
import java.io.IOException;
import java.util.Scanner;

public class BuscarPalabraEnArchivo {

    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);

        System.out.print("Ingrese el nombre del archivo de texto: ");
        String nombreArchivo = scanner.nextLine();

        System.out.print("Ingrese la palabra que desea buscar: ");
        String palabraBuscar = scanner.nextLine();

        boolean encontrada = buscarPalabraEnArchivo(nombreArchivo, palabraBuscar);

        if (encontrada) {
            System.out.println("La palabra '" + palabraBuscar + "' está presente en el archivo.");
        } else {
            System.out.println("La palabra '" + palabraBuscar + "' no se encontró en el archivo.");
        }

        scanner.close();
    }

    private static boolean buscarPalabraEnArchivo(String nombreArchivo, String palabraBuscar) {
        try {
            File archivo = new File(nombreArchivo);
            BufferedReader br = new BufferedReader(new FileReader(archivo));

            String linea;
            int numeroLinea = 0;

            while ((linea = br.readLine()) != null) {
                numeroLinea++;

                if (linea.contains(palabraBuscar)) {
                    System.out.println("La palabra '" + palabraBuscar + "' se encuentra en la línea " + numeroLinea + ".");
                    br.close();
                    return true;
                }
            }

            br.close();
            return false;
        } catch (IOException e) {
            System.out.println("Error al leer el archivo: " + e.getMessage());
            return false;
        }
    }
}
