public class Tip016 extends Articulo {
    private static final double TIPO = 0.16;

    public Tip016(String nombre, double precio) {
        super(nombre, precio);
    }

    @Override
    public double getParteIVA() {
        return getPrecioSinIVA() * TIPO;
    }
}