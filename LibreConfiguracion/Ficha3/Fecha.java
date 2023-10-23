public class Fecha {
    private int dia;
    private int mes;
    private int anio;

    private static final String[] NOMBRES_MESES = {
        "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio",
        "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"
    };

    public Fecha(int dia, int mes, int anio) {
        this.dia = dia;
        this.mes = mes;
        this.anio = anio;
    }

    public Fecha(String fechaStr, int dia, int anio) {
        this.dia = dia;
        this.anio = anio;
        this.mes = obtenerNumeroMes(fechaStr);
    }

    public Fecha(int diaDelAnio, int anio) {
        this.anio = anio;
        this.dia = diaDelAnio;
        this.mes = obtenerMesDesdeDia(diaDelAnio, anio);
    }

    private int obtenerNumeroMes(String mesStr) {
        for (int i = 0; i < NOMBRES_MESES.length; i++) {
            if (NOMBRES_MESES[i].equalsIgnoreCase(mesStr)) {
                return i + 1;
            }
        }
        return -1; // Mes no válido
    }

    private int obtenerMesDesdeDia(int diaDelAnio, int anio) {
        int mes = 1;
        while (mes <= 12) {
            int diasEnMes = obtenerDiasEnMes(mes, anio);
            if (diaDelAnio <= diasEnMes) {
                return mes;
            }
            diaDelAnio -= diasEnMes;
            mes++;
        }
        return -1; // Día no válido
    }

    private int obtenerDiasEnMes(int mes, int anio) {
        if (mes == 2) {
            if (esBisiesto(anio)) {
                return 29;
            } else {
                return 28;
            }
        } else if (mes == 4 || mes == 6 || mes == 9 || mes == 11) {
            return 30;
        } else {
            return 31;
        }
    }

    private boolean esBisiesto(int anio) {
        return (anio % 4 == 0 && (anio % 100 != 0 || anio % 400 == 0));
    }

    public void imprimirFormato1() {
        System.out.printf("%02d/%02d/%04d%n", mes, dia, anio);
    }

    public void imprimirFormato2() {
        System.out.printf("%s %d, %04d%n", NOMBRES_MESES[mes - 1], dia, anio);
    }

    public static void main(String[] args) {
        Fecha fecha1 = new Fecha(6, 15, 1992);
        Fecha fecha2 = new Fecha("Junio", 15, 1992);
        Fecha fecha3 = new Fecha(167, 1992);

        fecha1.imprimirFormato1(); // Imprime: 06/15/1992
        fecha1.imprimirFormato2(); // Imprime: Junio 15, 1992

        fecha2.imprimirFormato1(); // Imprime: 06/15/1992
        fecha2.imprimirFormato2(); // Imprime: Junio 15, 1992

        fecha3.imprimirFormato1(); // Imprime: 06/15/1992
        fecha3.imprimirFormato2(); // Imprime: Junio 15, 1992
    }
}
