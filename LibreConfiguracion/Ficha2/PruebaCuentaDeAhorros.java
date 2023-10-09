public class PruebaCuentaDeAhorros {
    public static void main(String[] args) {
        // Crear dos instancias de CuentaDeAhorros con saldos iniciales
        CuentaDeAhorros ahorrador1 = new CuentaDeAhorros(2000.00);
        CuentaDeAhorros ahorrador2 = new CuentaDeAhorros(3000.00);
        
        // Establecer la tasa de interés anual al 4%
        ahorrador1.modificarTasaInteres(4);
        ahorrador2.modificarTasaInteres(4);
        
        // Calcular el interés mensual y actualizar saldos
        ahorrador1.calcularInteresMensual();
        ahorrador2.calcularInteresMensual();
        
        System.out.println("\nDespués de cambiar la tasa de interés al 4%:");
        System.out.printf("Saldo de Ahorrador 1: %.2f€%n", ahorrador1.getSaldoAhorros());
        System.out.printf("Saldo de Ahorrador 2: %.2f€%n", ahorrador2.getSaldoAhorros());
        
        // Cambiar la tasa de interés al 5%
        ahorrador1.modificarTasaInteres(5);
        ahorrador2.modificarTasaInteres(5);
        
        // Calcular el interés mensual y actualizar saldos durante un mes adicional
        ahorrador1.calcularInteresMensual();
        ahorrador2.calcularInteresMensual();
        
        System.out.println("\nDespués de cambiar la tasa de interés al 5%:");
        System.out.printf("Saldo de Ahorrador 1: %.2f€%n", ahorrador1.getSaldoAhorros());
        System.out.printf("Saldo de Ahorrador 2: %.2f€%n", ahorrador2.getSaldoAhorros());
    }
}
