public class PruebaRectangulo {
    public static void main(String[] args) {
        // Crear un rectángulo con valores predeterminados
        Rectangulo rectangulo1 = new Rectangulo();
        
        // Mostrar los valores iniciales
        System.out.println("Rectangulo 1:");
        System.out.println("Longitud: " + rectangulo1.getLongitud());
        System.out.println("Anchura: " + rectangulo1.getAnchura());
        System.out.println("Perímetro: " + rectangulo1.calcularPerimetro());
        System.out.println("Área: " + rectangulo1.calcularArea());
        
        // Cambiar los valores del rectángulo
        rectangulo1.setLongitud(5);
        rectangulo1.setAnchura(3);
        
        // Mostrar los nuevos valores
        System.out.println("\nRectangulo 1 (después de cambiar los valores):");
        System.out.println("Longitud: " + rectangulo1.getLongitud());
        System.out.println("Anchura: " + rectangulo1.getAnchura());
        System.out.println("Perímetro: " + rectangulo1.calcularPerimetro());
        System.out.println("Área: " + rectangulo1.calcularArea());
        
        // Crear un segundo rectángulo con valores personalizados
        Rectangulo rectangulo2 = new Rectangulo(7, 2);
        
        // Mostrar los valores del segundo rectángulo
        System.out.println("\nRectangulo 2:");
        System.out.println("Longitud: " + rectangulo2.getLongitud());
        System.out.println("Anchura: " + rectangulo2.getAnchura());
        System.out.println("Perímetro: " + rectangulo2.calcularPerimetro());
        System.out.println("Área: " + rectangulo2.calcularArea());
    }
}
