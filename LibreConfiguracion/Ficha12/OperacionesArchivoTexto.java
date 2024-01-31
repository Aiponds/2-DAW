import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.File;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;
import java.util.Scanner;

public class OperacionesArchivoTexto {

    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);

        System.out.println("Bienvenido al programa de operaciones con archivos de texto.");

        while (true) {
            System.out.println("\nMenú:");
            System.out.println("1. Leer y mostrar el contenido del archivo.");
            System.out.println("2. Escribir una frase al final del archivo.");
            System.out.println("3. Triturar el archivo para quedarse con una frase.");
            System.out.println("4. Salir");

            System.out.print("Seleccione una opción: ");
            int opcion = scanner.nextInt();
            scanner.nextLine();  // Consumir el salto de línea después de la opción

            switch (opcion) {
                case 1:
                    leerYMostrarArchivo();
                    break;
                case 2:
                    System.out.print("Ingrese la frase que desea agregar al final del archivo: ");
                    String fraseAgregar = scanner.nextLine();
                    escribirAlFinalDelArchivo(fraseAgregar);
                    break;
                case 3:
                    System.out.print("Ingrese la frase con la que desea triturar el archivo: ");
                    String fraseTriturar = scanner.nextLine();
                    triturarArchivo(fraseTriturar);
                    break;
                case 4:
                    System.out.println("Saliendo del programa. ¡Hasta luego!");
                    scanner.close();
                    System.exit(0);
                default:
                    System.out.println("Opción no válida. Por favor, seleccione una opción válida.");
            }
        }
    }

    private static void leerYMostrarArchivo() {
        try {
            File archivo = new File("archivo.txt");
            BufferedReader br = new BufferedReader(new FileReader(archivo));

            String linea;
            System.out.println("\nContenido del archivo:");
            while ((linea = br.readLine()) != null) {
                System.out.println(linea);
            }

            br.close();
        } catch (IOException e) {
            System.out.println("Error al leer el archivo: " + e.getMessage());
        }
    }

    private static void escribirAlFinalDelArchivo(String frase) {
        try {
            File archivo = new File("archivo.txt");
            BufferedWriter bw = new BufferedWriter(new FileWriter(archivo, true));

            bw.newLine();  // Agregar una nueva línea antes de la nueva frase
            bw.write(frase);

            bw.close();
            System.out.println("Frase escrita exitosamente al final del archivo.");
        } catch (IOException e) {
            System.out.println("Error al escribir en el archivo: " + e.getMessage());
        }
    }

    private static void triturarArchivo(String frase) {
        try {
            File archivo = new File("archivo.txt");
            BufferedReader br = new BufferedReader(new FileReader(archivo));

            String contenido = "";
            String linea;
            while ((linea = br.readLine()) != null) {
                contenido += linea + "\n";
            }
            br.close();

            contenido = contenido.replaceAll(".*" + frase + ".*", frase);

            BufferedWriter bw = new BufferedWriter(new FileWriter(archivo));
            bw.write(contenido);
            bw.close();

            System.out.println("Archivo triturado exitosamente para quedarse con la frase proporcionada.");
        } catch (IOException e) {
            System.out.println("Error al triturar el archivo: " + e.getMessage());
        }
    }
}
