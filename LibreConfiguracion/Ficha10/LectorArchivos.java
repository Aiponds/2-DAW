import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;

public class LectorArchivos {
    public static void main(String[] args) {
        try {
            BufferedReader lector = new BufferedReader(new FileReader("./archivo.txt"));
            String linea;
            while ((linea = lector.readLine()) != null) {
                System.out.println(linea);
            }
            lector.close();
        } catch (IOException e) {
            System.out.println("Ha ocurrido un error: " + e.getMessage());
        }
    }
}
