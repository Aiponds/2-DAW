import java.util.Scanner;

public class Ej16_VictorStala {
    public static void main(String[] args) {
        String frase= pedirCad();
        String morse = codificarMorse(frase);
        System.out.println("Frase codificada en clave Morse: " + morse);

        morse = pedirMorse();
        frase = decodificarMorse(morse);
        System.out.println("Frase en español: " + frase);
    }

    public static String codificarMorse(String frase) {
        // Definir un arreglo de cadenas para mapear letras a su representación en clave Morse
        String[] morseCodes = {
            ".-", "-...", "-.-.", "-..", ".", "..-.", "--.", "....", "..", ".---", "-.-", ".-..", 
            "--", "-.", "---", ".--.", "--.-", ".-.", "...", "-", "..-", "...-", ".--", "-..-", 
            "-.--", "--..", " "
        };

        // Convertir la frase a minúsculas y construir la representación en clave Morse
        frase = frase.toLowerCase();
        StringBuilder morseBuilder = new StringBuilder();
        
        for (int i = 0; i < frase.length(); i++) {
            char letra = frase.charAt(i);
            int indice = letra - 'a';
            
            if (indice >= 0 && indice < morseCodes.length) {
                morseBuilder.append(morseCodes[indice]);
                morseBuilder.append(" "); // Espacio en blanco entre letras
            }
        }

        return morseBuilder.toString();
    }
    public static String decodificarMorse(String morse) {
        // Definir un arreglo de letras correspondientes a su representación en clave Morse
        String[] letrasMorse = {
            ".-", "-...", "-.-.", "-..", ".", "..-.", "--.", "....", "..", ".---", "-.-", ".-..",
            "--", "-.", "---", ".--.", "--.-", ".-.", "...", "-", "..-", "...-", ".--", "-..-", 
            "-.--", "--..", " "
        };

        // Dividir la representación en clave Morse en palabras
        String[] palabras = morse.split("   "); // Tres espacios en blanco para separar palabras

        // Decodificar cada palabra y construir la frase en español
        StringBuilder fraseBuilder = new StringBuilder();

        for (String palabra : palabras) {
            String[] letrasMorsePalabra = palabra.split(" ");
            for (String letraMorse : letrasMorsePalabra) {
                int indice = -1;

                for (int i = 0; i < letrasMorse.length; i++) {
                    if (letraMorse.equals(letrasMorse[i])) {
                        indice = i;
                        break;
                    }
                }

                if (indice >= 0) {
                    // Usar el índice para obtener la letra correspondiente en español
                    char letra = (char) ('a' + indice);
                    fraseBuilder.append(letra);
                }
            }
            fraseBuilder.append(" "); // Espacio en blanco entre palabras
        }

        return fraseBuilder.toString().trim(); // Eliminar espacios en blanco adicionales
    }
    public static String pedirCad(){
        System.out.print("Introduce una frase en español para pasar a morse: ");
        return (new Scanner(System.in).nextLine());
    }
    public static String pedirMorse(){
        System.out.print("Introduce una frase en morse para pasar a español: ");
        return (new Scanner(System.in).nextLine());
    }
}
