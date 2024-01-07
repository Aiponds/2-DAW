public class Tip04 extends Articulo {
    private static final double TIPO = 0.04;

    public Tip04(String nombre, double precio) {
        super(nombre, precio);
    }

    @Override
    public double getParteIVA() {
        return getPrecioSinIVA() * TIPO;
    }
}