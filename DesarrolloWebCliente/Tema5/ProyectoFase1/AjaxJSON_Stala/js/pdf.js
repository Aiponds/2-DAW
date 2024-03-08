var doc;

function prepararPDF() {
    // Variables
    var pdfRA = document.getElementById('raSelect');
    var pdfCriterio = document.getElementById('criterioSelect');
    var listaCriterios = document.getElementById('criteriosSeleccionados');

    // Verificar si los elementos existen antes de acceder a sus propiedades
    if (!pdfRA || !pdfCriterio || !listaCriterios) {
        console.error("Error: Elementos no encontrados.");
        return;
    }

    // Modificar estas líneas para evitar el error mencionado
    var profesor = document.getElementById('profesor');

    // Obtener el valor del RA seleccionado
    var selectedRA = pdfRA.options[pdfRA.selectedIndex].text;

    // Obtener todos los criterios de la lista
    var allCriterios = obtenerCriteriosLista(listaCriterios);

    // Crear un array con todos los RA (incluidos los agregados dinámicamente)
    var allRA = obtenerTodosRA(pdfRA, allCriterios);

    // Crea un nuevo objeto JSPDF
    var options = {
        orientation: 'p',
        unit: 'mm',
        format: 'a4',
        putOnlyUsedFonts: true,
        compress: true,
        precision: 2,
        userUnit: 1.0
    };
    doc = new jspdf.jsPDF(options);

    // Agregamos los metadatos al PDF
    doc.setProperties({
        title: 'Formulario',
        subject: 'Prueba PDF',
        author: 'Victor Stala',
        keywords: 'formulario, pdf, daw, dwec',
        creator: 'Victor Stala'
    });

    // Información de las imágenes (necesitas proporcionar las rutas correctas)
    var imgJunta = new Image;
    var imgMurgi = new Image;
    imgJunta.src = "img/junta.jpg";
    imgMurgi.src = "img/murgi.png";

    // Agrega el contenido del HTML al PDF
    const centrar = doc.internal.pageSize.getWidth() / 2;
    doc.addImage(imgJunta, "JPEG", 5, 5, 50, 32);
    doc.addImage(imgMurgi, "PNG", 162, 8, 40, 38);
    doc.setFont(undefined, 'bold');
    doc.setFontSize(12);
    doc.text(centrar, 60, 'Unidad Didáctica', { align: 'center' });
    doc.text(centrar, 70, 'Módulo: Sistemas Informaticos', { align: 'center' });
    doc.text(centrar, 80, 'Profesor: ' + (profesor ? profesor.value : ''), { align: 'center' });
    doc.text(centrar, 110, 'Listado de los RA:', { align: 'center' });

    // Ajusta la posición para evitar que se corte el texto
    var startY = 120;
    //bucle que recoge todos los RA insertados
    allRA.forEach(function (ra, index) {
        if (ra !== selectedRA) {
            var textLines = doc.splitTextToSize(ra, doc.internal.pageSize.getWidth() - 20); // Ancho de la página - márgenes
            if (startY + (textLines.length * 10) > doc.internal.pageSize.getHeight()) {
                startY = 20; // Si se alcanza el límite de la página, reinicia la posición
                doc.addPage(); // Agrega una nueva página
            }
            textLines.forEach(function (line, i) {
                doc.text(10, startY + i * 10, line);
            });
            startY += textLines.length * 10;
        }
    });

    doc.setFont(undefined, 'normal');
    doc.setFontSize(10);
    doc.autoTable({ html: '#tablapdfresultado', startY: 130 + allRA.length * 10, useCss: true });
}

function obtenerCriteriosLista(lista) {
    var criterios = [];
    var items = lista.getElementsByTagName('div');
    for (var i = 0; i < items.length; i++) {
        var texto = items[i].textContent.trim();
        criterios.push(texto);
    }
    return criterios;
}

function obtenerTodosRA(selectRA, criterios) {
    var allRA = [];

    criterios.forEach(function (criterio) {
        allRA.push(criterio);
    });
    return allRA;
}

document.getElementById('generarPDF').addEventListener('click', function () {
    // Crea un nuevo objeto JSPDF
    prepararPDF();

    // Guarda el PDF con un nombre específico
    doc.save('formulario.pdf');
});

document.getElementById('previsualizarPDF').addEventListener('click', function () {
    // Crea un nuevo objeto JSPDF
    prepararPDF();

    // Obtiene la URL del PDF como un blob y editar el iframe
    var blobPDF = doc.output('bloburl');
    var iframe = document.getElementById('iframe');
    iframe.src = blobPDF;
    iframe.width = '100%';
    iframe.height = '1177px';
});
