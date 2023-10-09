public class Rectangulo {
    private double longitud;
    private double anchura;
    public Rectangulo(){
        this.longitud = 1;
        this.anchura = 1;
    }
    public Rectangulo(double longitud, double anchura){
        this.longitud = longitud;
        this.anchura = anchura;
    }
    public double getAnchura() {
        return anchura;
    }
    public double getLongitud() {
        return longitud;
    }
    public void setAnchura(double anchura) {
        if (anchura > 0 && anchura < 20) {
            this.anchura = anchura;
        } else {
            this.anchura = 1;
        }
        
    }
    public void setLongitud(double longitud) {
        if (longitud > 0 && longitud < 20) {
            this.longitud = longitud;
        } else {
            this.longitud = 1;
        }
    }
    public double calcularPerimetro(){
        return 2*(this.longitud+this.anchura);
    }
    public double calcularArea(){
        return this.longitud*this.anchura;
    }
}