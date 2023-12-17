public class Persona {
    private String nif;
    private int altura;
    private int edad;

    // Constructor por defecto
    public Persona() {
        this.nif = "11111111A";
        this.altura = 175;
        this.edad = 25;
    }

    // Constructor con parámetros
    public Persona(String nif, int altura, int edad) {
        this.nif = nif;
        this.altura = altura;
        this.edad = edad;
    }

    // Consultores (getters)
    public String getNif() {
        return nif;
    }

    public int getAltura() {
        return altura;
    }

    public int getEdad() {
        return edad;
    }

    // Modificadores (setters)
    public void setNif(String nif) {
        this.nif = nif;
    }

    public void setAltura(int altura) {
        this.altura = altura;
    }

    public void setEdad(int edad) {
        this.edad = edad;
    }
    public void hablar() {
        System.out.println("La persona está hablando.");
    }

    public void comer() {
        System.out.println("La persona está comiendo.");
    }
}
