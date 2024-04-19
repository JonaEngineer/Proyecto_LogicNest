// Función para generar el PDF
function generatePDF(tableId) {
    var doc = new jsPDF();
    var element = document.getElementById(tableId);

    html2canvas(element).then(function (canvas) {
        var imgData = canvas.toDataURL('image/png');
        doc.addImage(imgData, 'PNG', 10, 10);
        doc.save('report.pdf');
    });
}
