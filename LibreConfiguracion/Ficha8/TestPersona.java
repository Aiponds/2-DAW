public class TestPersona {
    public static void main(String[] args) {
        // Crear una persona con la información por defecto
        Persona persona1 = new Persona();
        System.out.println("Persona 1:");
        System.out.println("NIF: " + persona1.getNif());
        System.out.println("Altura: " + persona1.getAltura() + " cm");
        System.out.println("Edad: " + persona1.getEdad() + " años");
        System.out.println();

        // Crear una persona con información inventada
        Persona persona2 = new Persona("22222222B", 180, 30);
        System.out.println("Persona 2:");
        System.out.println("NIF: " + persona2.getNif());
        System.out.println("Altura: " + persona2.getAltura() + " cm");
        System.out.println("Edad: " + persona2.getEdad() + " años");
    }
}