import java.io.*;
import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.Scanner;

public class Diario {

    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        
        // Pedir la fecha para la entrada del diario
        System.out.println("Ingrese la fecha para la nueva entrada (Formato: dd-MM-yyyy):");
        String fecha = scanner.nextLine();
        
        // Pedir la entrada del diario
        System.out.println("Escriba la entrada del diario (presione ENTER para guardar):");
        StringBuilder entrada = new StringBuilder();
        String linea;
        while (!(linea = scanner.nextLine()).isEmpty()) {
            entrada.append(linea).append("\n");
        }

        // Guardar la entrada en el diario
        guardarEntradaDiario(fecha, entrada.toString());

        System.out.println("Entrada guardada en el diario.");
        scanner.close();
    }

    public static void guardarEntradaDiario(String fecha, String entrada) {
        try {
            FileWriter fw = new FileWriter("diario.txt", true); // true para que añada al final del archivo
            BufferedWriter bw = new BufferedWriter(fw);
            
            // Obtener la fecha y hora actual
            Date fechaActual = new Date();
            SimpleDateFormat formato = new SimpleDateFormat("dd-MM-yyyy HH:mm:ss");
            String fechaHoraActual = formato.format(fechaActual);
            
            // Escribir la fecha y hora actual y la entrada en el diario
            bw.write("Fecha: " + fecha + " - Hora: " + fechaHoraActual + "\n");
            bw.write(entrada + "\n\n");
            
            bw.close();
        } catch (IOException e) {
            e.printStackTrace();
        }
    }
}
