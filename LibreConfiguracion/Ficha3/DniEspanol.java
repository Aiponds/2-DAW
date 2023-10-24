public class DniEspanol {
    private int numeroDni;

    public DniEspanol(int numeroDni) throws IllegalArgumentException {
        if (numeroDni >= 0 && numeroDni <= 99999999) {
            this.numeroDni = numeroDni;
        } else {
            throw new IllegalArgumentException("Número de DNI no válido");
        }
    }

    public DniEspanol(String nif) throws IllegalArgumentException {
        if (validarNif(nif)) {
            this.numeroDni = extraerNumeroDni(nif);
        } else {
            throw new IllegalArgumentException("NIF no válido");
        }
    }

    public int getNumeroDni() {
        return numeroDni;
    }

    public String getNif() {
        return ""+numeroDni + calcularLetraNif(numeroDni);
    }

    public void setDni(int numeroDni) throws IllegalArgumentException {
        if (numeroDni >= 0 && numeroDni <= 99999999) {
            this.numeroDni = numeroDni;
        } else {
            throw new IllegalArgumentException("Número de DNI no válido");
        }
    }

    public void setDni(String nif) throws IllegalArgumentException {
        if (validarNif(nif)) {
            this.numeroDni = extraerNumeroDni(nif);
        } else {
            throw new IllegalArgumentException("NIF no válido");
        }
    }

    private static char calcularLetraNif(int numeroDni) {
        String letras = "TRWAGMYFPDXBNJZSQVHLCKE";
        return letras.charAt(numeroDni % 23);
    }

    private static boolean validarNif(String nif) {
        if (nif.length() == 9) {
            int numero = extraerNumeroDni(nif);
            char letra = nif.charAt(8);
            return letra == calcularLetraNif(numero);
        }
        return false;
    }

    private static int extraerNumeroDni(String nif) {
        return Integer.parseInt(nif.substring(0, 8));
    }
    public static void main(String[] args) {
        try {
            // Crear un DNI con número
            DniEspanol dni1 = new DniEspanol(12345678);
            System.out.println("DNI1: " + dni1.getNif());

            // Cambiar el DNI usando un NIF
            dni1.setDni("87654321A");
            System.out.println("DNI1 (cambiado): " + dni1.getNif());

            // Crear un DNI con NIF
            DniEspanol dni2 = new DniEspanol("98765432B");
            System.out.println("DNI2: " + dni2.getNif());

            // Cambiar el DNI usando un número
            dni2.setDni(23456789);
            System.out.println("DNI2 (cambiado): " + dni2.getNif());

            // Intentar crear un DNI con número inválido
            // Esto lanzará una excepción
            // DniEspanol dni3 = new DniEspanol(100000000);

            // Intentar cambiar el DNI con NIF inválido
            // Esto lanzará una excepción
            // dni1.setDni("12345678Z");
        } catch (IllegalArgumentException e) {
            System.out.println("Error: " + e.getMessage());
        }
    }
}
