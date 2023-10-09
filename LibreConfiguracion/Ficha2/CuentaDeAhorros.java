public class CuentaDeAhorros {
    private static double tasaInteresAnual = 1;
    private double saldoAhorros;
    public CuentaDeAhorros(){
        this.saldoAhorros = 0;
    }
    public CuentaDeAhorros(double saldoAhorros){
        this.saldoAhorros = saldoAhorros;
    }
    public double getSaldoAhorros() {
        return saldoAhorros;
    }
    public void setSaldoAhorros(double saldoAhorros) {
        this.saldoAhorros = saldoAhorros;
    }
    public void calcularInteresMensual(){
        saldoAhorros+=(this.saldoAhorros*tasaInteresAnual)/12;
    }
    public void modificarTasaInteres(double tasaInteresAnual) {
        CuentaDeAhorros.tasaInteresAnual = tasaInteresAnual;
    }
}
