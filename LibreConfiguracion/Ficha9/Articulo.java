public abstract class Articulo {
    private String nombre;
    private double precio;

    public Articulo(String nombre, double precio) {
        this.nombre = nombre;
        this.precio = precio;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public double getPrecioSinIVA() {
        return precio;
    }

    public abstract double getParteIVA();

    public double getPrecio() {
        return getPrecioSinIVA() + getParteIVA();
    }
}