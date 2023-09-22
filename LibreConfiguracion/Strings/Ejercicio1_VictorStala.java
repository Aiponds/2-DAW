package Strings;

import java.util.Scanner;

public class Ejercicio1_VictorStala {
    /*
    Pedir por teclado una cadena:
    Mostrar menú:
    Mostrarla al revés
    Contar el nº de vocales
    Contar el nº de consonantes
    Pasar todo a minúscula
    Pasar todo a mayúscula
    Decir si es palíndroma
    */
    public static void main(String[]args){
        menu();
    }
    public static void menu(){
        String cad, opcion;
        do {
            System.out.println("Introduce una cadena: ");
            cad=pedirCadena();
            textoMenu();
            System.out.println("Opcion: ");
            opcion=pedirCadena();
            switch(opcion){
                case "1" : { // Mostrarla al revés
                    mostrarReves(cad);
                }
                break;
                case "2" : { // Contar el nº de vocales
                    contarVocales(cad);
                }
                break;
                case "3" : { // Contar el nº de consonantes
                    contarConsonantes(cad);
                }
                break;
                case "4" : { // Pasar a minuscula
                    pasarMinuscula(cad);
                }
                break;
                case "5" : { // Pasar a mayuscula
                    pasarMayuscula(cad);
                }
                break;
                case "6" : { // Comprobar palindromo
                    comprobarPalindromo(cad);
                }
                break;
                default : {
                    if(!opcion.equals("salir")){
                        System.out.println("Opción no válida.");
                    }
                }
            }
        }while(!opcion.equals("salir"));
    }
    public static void textoMenu(){
        System.out.println("------------Menu------------");
        System.out.println("1.Mostrar al reves");
        System.out.println("2.Contar el nº de vocales");
        System.out.println("3.Contar el nº de consonantes");
        System.out.println("4.Pasar todo a minuscula");
        System.out.println("5.Pasar todo a mayusculas");
        System.out.println("6.Decir si es palindroma");
        System.out.println("Para salir, introduce 'salir'");
    }
    public static void mostrarReves(String cad){
        for (int i = cad.length()-1; i >= 0; i--) {
            System.out.print(cad.charAt(i));
        }
        System.out.println();
    }
    public static void contarVocales(String cad){
        int contador=0;
        char c;
        for (int i = 0; i < cad.length(); i++) {
            c=Character.toLowerCase(cad.charAt(i));
            if(c=='a' || c=='e' || c=='i' || c=='o' || c=='u'){
                contador++;
            }
        }
        System.out.println("En la cadena hay "+contador+" vocales.");
    }
    public static void contarConsonantes(String cad){
        int contador=0;
        char c;
        for (int i = 0; i < cad.length(); i++) {
            c=Character.toLowerCase(cad.charAt(i));
            if(c!='a' && c!='e' && c!='i' && c!='o' && c!='u'){
                contador++;
            }
        }
        System.out.println("En la cadena hay "+contador+" consonantes.");
    }
    public static void pasarMinuscula(String cad){
        System.out.println(cad.toLowerCase());
    }
    public static void pasarMayuscula(String cad){
        System.out.println(cad.toUpperCase());
    }
    public static void comprobarPalindromo(String cad){
        boolean palindromo=true;
        for (int i = cad.length()-1; i >= 0; i--) {
            if(cad.charAt(i)!=cad.charAt(cad.length()-i-1)){
                palindromo=false;
                break;
            }
        }
        if(palindromo==true){
            System.out.println("La cadena es palíndroma");
        } else {
            System.out.println("La cadena no es palíndroma");
        }
    }
    public static String pedirCadena(){
        String cad;
        cad=new Scanner(System.in).nextLine();
        cad=cad.toLowerCase();
        cad=cad.trim();
        cad=cad.replace(" ","");
        return cad;
    }
}