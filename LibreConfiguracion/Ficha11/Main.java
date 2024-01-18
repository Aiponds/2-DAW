import java.io.*;
import java.util.regex.*;

public class Main {
    public static void main(String[] args) {
        String inputFile = "fichero-a.txt";
        String outputFile = "fichero-b.txt";

        try (BufferedReader reader = new BufferedReader(new FileReader(inputFile));
             BufferedWriter writer = new BufferedWriter(new FileWriter(outputFile))) {

            String line;
            while ((line = reader.readLine()) != null) {
                String lineWithoutVowels = line.replaceAll("[aeiouAEIOU]", "");
                writer.write(lineWithoutVowels);
                writer.newLine();
            }

        } catch (IOException e) {
            e.printStackTrace();
        }
    }
}
