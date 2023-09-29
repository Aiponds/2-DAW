import java.util.Scanner;

public class Ej14_VictorStala {
    public static void main(String[] args) {
        String fechaStr = pedirCad();
        String[] partes = fechaStr.split("/");
        
        if (partes.length == 3) {
            int dia = Integer.parseInt(partes[0]);
            int mes = Integer.parseInt(partes[1]);
            int anio = Integer.parseInt(partes[2]);
            
            // Arrays para los nombres de los meses y los meses en el primer formato
            String[] nombresMeses = {"", "enero", "febrero", "marzo", "abril", "mayo", "junio", "julio",
                                     "agosto", "septiembre", "octubre", "noviembre", "diciembre"};

            // Verificar que el mes esté dentro del rango válido
            if (mes >= 1 && mes <= 12) {
                // Imprimir la fecha en el segundo formato
                System.out.println("Fecha en el segundo formato: " + dia + " de " + nombresMeses[mes] + " de " + anio);
            } else {
                System.err.println("El mes ingresado no es válido.");
            }
        } else {
            System.err.println("El formato de la fecha ingresada no es válido. Debe ser dd/MM/yyyy.");
        }
    }
    public static String pedirCad(){
        System.out.print("Ingrese la fecha en formato dd/MM/yyyy: ");
        return (new Scanner(System.in).nextLine());
    }
}
