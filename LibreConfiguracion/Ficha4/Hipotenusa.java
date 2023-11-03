public class Hipotenusa {
    public static void main(String[] args) {
        double lado1 = 2.0;
        double lado2 = 3.0;

        double hipotenusa = calcularHipotenusa(lado1, lado2);

        System.out.println("Para el triángulo con lados " + lado1 + " y " + lado2 + ",");
        System.out.println("la longitud de la hipotenusa es: " + hipotenusa);
    }

    public static double calcularHipotenusa(double lado1, double lado2) {
        // Aplicar el teorema de Pitágoras para calcular la hipotenusa
        double hipotenusa = Math.sqrt(lado1 * lado1 + lado2 * lado2);
        return hipotenusa;
    }
}
