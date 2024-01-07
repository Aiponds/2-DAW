public class Tip07 extends Articulo {
    private static final double TIPO = 0.07;

    public Tip07(String nombre, double precio) {
        super(nombre, precio);
    }

    @Override
    public double getParteIVA() {
        return getPrecioSinIVA() * TIPO;
    }
}