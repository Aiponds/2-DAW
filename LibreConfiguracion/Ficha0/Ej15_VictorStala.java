import java.util.Scanner;

public class Ej15_VictorStala {
    public static void main(String[] args) {
        double cantidad = pedirCantidad();
        String cantidadFormateada = formatoProteccionCheques(cantidad);
        System.out.println("Cantidad formateada: " + cantidadFormateada);
    }

    public static String formatoProteccionCheques(double cantidad) {
        String cantidadStr = String.format("%.2f", cantidad);
        cantidadStr = cantidadStr.replace(".", "");
        int longitudActual = cantidadStr.length();
        int asteriscosNecesarios = 9 - longitudActual;
        StringBuilder resultado = new StringBuilder();
        for (int i = 0; i < asteriscosNecesarios; i++) {
            resultado.append("*");
        }
        resultado.append(cantidadStr);

        return resultado.toString();
    }
    public static double pedirCantidad(){
        System.out.print("Ingrese la cantidad del cheque: ");
        return (new Scanner(System.in).nextDouble());
    }
}
