import java.io.*;
import java.util.*;

public class ManejoArchivos {

    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        System.out.println("Ingrese un número entero:");
        int numero = scanner.nextInt();

        // Crear los archivos .txt
        for (int i = 1; i <= numero; i++) {
            crearArchivo(i);
        }

        boolean salir = false;
        while (!salir) {
            System.out.println("¿Qué quiere hacer con estos números?");
            System.out.println("1) Buscar el mayor (de entre todos los archivos)");
            System.out.println("2) Buscar el menor (de entre todos los archivos)");
            System.out.println("3) Buscar la media (de entre todos los archivos)");
            System.out.println("4) Buscar la suma (de entre todos los archivos)");
            System.out.println("5) Buscar un número concreto y decir en qué ficheros aparece");
            System.out.println("6) Salir");
            int opcion = scanner.nextInt();
            switch (opcion) {
                case 1:
                    buscarMayor(numero);
                    break;
                case 2:
                    buscarMenor(numero);
                    break;
                case 3:
                    buscarMedia(numero);
                    break;
                case 4:
                    buscarSuma(numero);
                    break;
                case 5:
                    System.out.println("Ingrese el número a buscar:");
                    int numBuscar = scanner.nextInt();
                    buscarNumero(numero, numBuscar);
                    break;
                case 6:
                    salir = true;
                    System.out.println("Saliendo del programa...");
                    break;
                default:
                    System.out.println("Opción inválida. Inténtelo de nuevo.");
            }
        }
        scanner.close();
    }

    public static void crearArchivo(int numero) {
        try {
            FileWriter fw = new FileWriter(numero + ".txt");
            BufferedWriter bw = new BufferedWriter(fw);
            Random rand = new Random();
            int cantidadNumeros = rand.nextInt(10) + 1; // Número aleatorio de 1 a 10
            for (int i = 0; i < cantidadNumeros; i++) {
                bw.write(rand.nextInt(100) + "\n"); // Números aleatorios de 0 a 99
            }
            bw.close();
        } catch (IOException e) {
            e.printStackTrace();
        }
    }

    public static void buscarMayor(int numero) {
        int mayor = Integer.MIN_VALUE;
        for (int i = 1; i <= numero; i++) {
            try {
                FileReader fr = new FileReader(i + ".txt");
                BufferedReader br = new BufferedReader(fr);
                String linea;
                while ((linea = br.readLine()) != null) {
                    int num = Integer.parseInt(linea);
                    if (num > mayor) {
                        mayor = num;
                    }
                }
                br.close();
            } catch (IOException e) {
                e.printStackTrace();
            }
        }
        System.out.println("El mayor número es: " + mayor);
    }

    public static void buscarMenor(int numero) {
        int menor = Integer.MAX_VALUE;
        for (int i = 1; i <= numero; i++) {
            try {
                FileReader fr = new FileReader(i + ".txt");
                BufferedReader br = new BufferedReader(fr);
                String linea;
                while ((linea = br.readLine()) != null) {
                    int num = Integer.parseInt(linea);
                    if (num < menor) {
                        menor = num;
                    }
                }
                br.close();
            } catch (IOException e) {
                e.printStackTrace();
            }
        }
        System.out.println("El menor número es: " + menor);
    }

    public static void buscarMedia(int numero) {
        int suma = 0;
        int cantidadNumeros = 0;
        for (int i = 1; i <= numero; i++) {
            try {
                FileReader fr = new FileReader(i + ".txt");
                BufferedReader br = new BufferedReader(fr);
                String linea;
                while ((linea = br.readLine()) != null) {
                    int num = Integer.parseInt(linea);
                    suma += num;
                    cantidadNumeros++;
                }
                br.close();
            } catch (IOException e) {
                e.printStackTrace();
            }
        }
        double media = (double) suma / cantidadNumeros;
        System.out.println("La media de los números es: " + media);
    }

    public static void buscarSuma(int numero) {
        int suma = 0;
        for (int i = 1; i <= numero; i++) {
            try {
                FileReader fr = new FileReader(i + ".txt");
                BufferedReader br = new BufferedReader(fr);
                String linea;
                while ((linea = br.readLine()) != null) {
                    int num = Integer.parseInt(linea);
                    suma += num;
                }
                br.close();
            } catch (IOException e) {
                e.printStackTrace();
            }
        }
        System.out.println("La suma de los números es: " + suma);
    }

    public static void buscarNumero(int numero, int numBuscar) {
        System.out.println("El número " + numBuscar + " aparece en los siguientes archivos:");
        for (int i = 1; i <= numero; i++) {
            try {
                FileReader fr = new FileReader(i + ".txt");
                BufferedReader br = new BufferedReader(fr);
                String linea;
                int lineaNum = 1;
                while ((linea = br.readLine()) != null) {
                    int num = Integer.parseInt(linea);
                    if (num == numBuscar) {
                        System.out.println(i + ".txt - línea " + lineaNum);
                    }
                    lineaNum++;
                }
                br.close();
            } catch (IOException e) {
                e.printStackTrace();
            }
        }
    }
}
