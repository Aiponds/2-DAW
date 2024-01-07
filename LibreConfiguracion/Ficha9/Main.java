public class Main {
    public static void main(String[] args) {
        Tip04 articulo1 = new Tip04("Articulo 1", 100.0);
        Tip07 articulo2 = new Tip07("Articulo 2", 200.0);
        Tip016 articulo3 = new Tip016("Articulo 3", 300.0);

        System.out.println("Nombre: " + articulo1.getNombre() + ", Precio con IVA: " + articulo1.getPrecio() + ", Parte IVA: " + articulo1.getParteIVA());
        System.out.println("Nombre: " + articulo2.getNombre() + ", Precio con IVA: " + articulo2.getPrecio() + ", Parte IVA: " + articulo2.getParteIVA());
        System.out.println("Nombre: " + articulo3.getNombre() + ", Precio con IVA: " + articulo3.getPrecio() + ", Parte IVA: " + articulo3.getParteIVA());
    }
}
