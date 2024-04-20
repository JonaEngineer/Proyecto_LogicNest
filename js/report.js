// ======================================================================================== //
// ========================================== ADMIN ======================================= //
// ======================================================================================== //

// register
function generatePDF() {
    const element = document.querySelector('.table-columns-register-admin'); // Selecciona la tabla
    html2canvas(element, { scale: 2 }).then(canvas => {
        const imgData = canvas.toDataURL('image/png');
        const pdf = new jspdf.jsPDF({
            orientation: 'landscape',
        });

        // Título y Fecha
        pdf.setFontSize(15); // Tamaño de la fuente para el título y fecha
        const title = "Empresa LogicNestSystems - Reporte de Registro";
        const date = "Fecha: " + new Date().toLocaleDateString() + "  Hora: " + new Date().toLocaleTimeString();
        const pageWidth = pdf.internal.pageSize.getWidth();
        const titleWidth = pdf.getStringUnitWidth(title) * pdf.internal.getFontSize() / pdf.internal.scaleFactor;
        const dateWidth = pdf.getStringUnitWidth(date) * pdf.internal.getFontSize() / pdf.internal.scaleFactor;

        // Posicionamiento del título y fecha
        pdf.text(title, (pageWidth - titleWidth) / 2, 15);
        pdf.text(date, (pageWidth - dateWidth) / 2, 25);

        // Ajustar la imagen de la tabla al tamaño del PDF
        const imgProps = pdf.getImageProperties(imgData);
        const pdfHeight = pdf.internal.pageSize.getHeight();
        const pdfWidth = pdf.internal.pageSize.getWidth();
        let imgHeight = (imgProps.height * pdfWidth) / imgProps.width;

        // Asegurar que la imagen no sea más alta que el espacio disponible
        if (imgHeight > pdfHeight - 30) {
            imgHeight = pdfHeight - 30; // Dejar espacio para los márgenes
        }

        // Añadir la imagen de la tabla
        pdf.addImage(imgData, 'PNG', 0, 30, pdfWidth, imgHeight);
        pdf.save('Report.pdf');
    });
}

// gaming pc
function generatePDF2() {
    const element = document.querySelector('.table-columns-pcGamingBtn-admin'); // Selecciona la tabla
    html2canvas(element, { scale: 2 }).then(canvas => {
        const imgData = canvas.toDataURL('image/png');
        const pdf = new jspdf.jsPDF({
            orientation: 'landscape',
        });

        // Título y Fecha
        pdf.setFontSize(15); // Tamaño de la fuente para el título y fecha
        const title = "Empresa LogicNestSystems - Reporte de GamingPc";
        const date = "Fecha: " + new Date().toLocaleDateString() + "  Hora: " + new Date().toLocaleTimeString();
        const pageWidth = pdf.internal.pageSize.getWidth();
        const titleWidth = pdf.getStringUnitWidth(title) * pdf.internal.getFontSize() / pdf.internal.scaleFactor;
        const dateWidth = pdf.getStringUnitWidth(date) * pdf.internal.getFontSize() / pdf.internal.scaleFactor;

        // Posicionamiento del título y fecha
        pdf.text(title, (pageWidth - titleWidth) / 2, 15);
        pdf.text(date, (pageWidth - dateWidth) / 2, 25);

        // Ajustar la imagen de la tabla al tamaño del PDF
        const imgProps = pdf.getImageProperties(imgData);
        const pdfHeight = pdf.internal.pageSize.getHeight();
        const pdfWidth = pdf.internal.pageSize.getWidth();
        let imgHeight = (imgProps.height * pdfWidth) / imgProps.width;

        // Asegurar que la imagen no sea más alta que el espacio disponible
        if (imgHeight > pdfHeight - 30) {
            imgHeight = pdfHeight - 30; // Dejar espacio para los márgenes
        }

        // Añadir la imagen de la tabla
        pdf.addImage(imgData, 'PNG', 0, 30, pdfWidth, imgHeight);
        pdf.save('GamingPc.pdf');
    });
}

// gaming monitors
function generatePDF3() {
    const element = document.querySelector('.table-columns-monitorsBtn-admin'); // Selecciona la tabla
    html2canvas(element, { scale: 2 }).then(canvas => {
        const imgData = canvas.toDataURL('image/png');
        const pdf = new jspdf.jsPDF({
            orientation: 'landscape',
        });

        // Título y Fecha
        pdf.setFontSize(15); // Tamaño de la fuente para el título y fecha
        const title = "Empresa LogicNestSystems - Reporte de GamingMonitors";
        const date = "Fecha: " + new Date().toLocaleDateString() + "  Hora: " + new Date().toLocaleTimeString();
        const pageWidth = pdf.internal.pageSize.getWidth();
        const titleWidth = pdf.getStringUnitWidth(title) * pdf.internal.getFontSize() / pdf.internal.scaleFactor;
        const dateWidth = pdf.getStringUnitWidth(date) * pdf.internal.getFontSize() / pdf.internal.scaleFactor;

        // Posicionamiento del título y fecha
        pdf.text(title, (pageWidth - titleWidth) / 2, 15);
        pdf.text(date, (pageWidth - dateWidth) / 2, 25);

        // Ajustar la imagen de la tabla al tamaño del PDF
        const imgProps = pdf.getImageProperties(imgData);
        const pdfHeight = pdf.internal.pageSize.getHeight();
        const pdfWidth = pdf.internal.pageSize.getWidth();
        let imgHeight = (imgProps.height * pdfWidth) / imgProps.width;

        // Asegurar que la imagen no sea más alta que el espacio disponible
        if (imgHeight > pdfHeight - 30) {
            imgHeight = pdfHeight - 30; // Dejar espacio para los márgenes
        }

        // Añadir la imagen de la tabla
        pdf.addImage(imgData, 'PNG', 0, 30, pdfWidth, imgHeight);
        pdf.save('GamingMonitors.pdf');
    });
}

// gaming laptops
function generatePDF4() {
    const element = document.querySelector('.table-columns-laptopsBtn-admin'); // Selecciona la tabla
    html2canvas(element, { scale: 2 }).then(canvas => {
        const imgData = canvas.toDataURL('image/png');
        const pdf = new jspdf.jsPDF({
            orientation: 'landscape',
        });

        // Título y Fecha
        pdf.setFontSize(15); // Tamaño de la fuente para el título y fecha
        const title = "Empresa LogicNestSystems - Reporte de GamingLaptops";
        const date = "Fecha: " + new Date().toLocaleDateString() + "  Hora: " + new Date().toLocaleTimeString();
        const pageWidth = pdf.internal.pageSize.getWidth();
        const titleWidth = pdf.getStringUnitWidth(title) * pdf.internal.getFontSize() / pdf.internal.scaleFactor;
        const dateWidth = pdf.getStringUnitWidth(date) * pdf.internal.getFontSize() / pdf.internal.scaleFactor;

        // Posicionamiento del título y fecha
        pdf.text(title, (pageWidth - titleWidth) / 2, 15);
        pdf.text(date, (pageWidth - dateWidth) / 2, 25);

        // Ajustar la imagen de la tabla al tamaño del PDF
        const imgProps = pdf.getImageProperties(imgData);
        const pdfHeight = pdf.internal.pageSize.getHeight();
        const pdfWidth = pdf.internal.pageSize.getWidth();
        let imgHeight = (imgProps.height * pdfWidth) / imgProps.width;

        // Asegurar que la imagen no sea más alta que el espacio disponible
        if (imgHeight > pdfHeight - 30) {
            imgHeight = pdfHeight - 30; // Dejar espacio para los márgenes
        }

        // Añadir la imagen de la tabla
        pdf.addImage(imgData, 'PNG', 0, 30, pdfWidth, imgHeight);
        pdf.save('GamingLaptops.pdf');
    });
}

// gaming consoles
function generatePDF5() {
    const element = document.querySelector('.table-columns-consolesBtn-admin'); // Selecciona la tabla
    html2canvas(element, { scale: 2 }).then(canvas => {
        const imgData = canvas.toDataURL('image/png');
        const pdf = new jspdf.jsPDF({
            orientation: 'landscape',
        });

        // Título y Fecha
        pdf.setFontSize(15); // Tamaño de la fuente para el título y fecha
        const title = "Empresa LogicNestSystems - Reporte de GamingConsoles";
        const date = "Fecha: " + new Date().toLocaleDateString() + "  Hora: " + new Date().toLocaleTimeString();
        const pageWidth = pdf.internal.pageSize.getWidth();
        const titleWidth = pdf.getStringUnitWidth(title) * pdf.internal.getFontSize() / pdf.internal.scaleFactor;
        const dateWidth = pdf.getStringUnitWidth(date) * pdf.internal.getFontSize() / pdf.internal.scaleFactor;

        // Posicionamiento del título y fecha
        pdf.text(title, (pageWidth - titleWidth) / 2, 15);
        pdf.text(date, (pageWidth - dateWidth) / 2, 25);

        // Ajustar la imagen de la tabla al tamaño del PDF
        const imgProps = pdf.getImageProperties(imgData);
        const pdfHeight = pdf.internal.pageSize.getHeight();
        const pdfWidth = pdf.internal.pageSize.getWidth();
        let imgHeight = (imgProps.height * pdfWidth) / imgProps.width;

        // Asegurar que la imagen no sea más alta que el espacio disponible
        if (imgHeight > pdfHeight - 30) {
            imgHeight = pdfHeight - 30; // Dejar espacio para los márgenes
        }

        // Añadir la imagen de la tabla
        pdf.addImage(imgData, 'PNG', 0, 30, pdfWidth, imgHeight);
        pdf.save('GamingConsoles.pdf');
    });
}

// gaming chairs
function generatePDF6() {
    const element = document.querySelector('.table-columns-chairsBtn-admin'); // Selecciona la tabla
    html2canvas(element, { scale: 2 }).then(canvas => {
        const imgData = canvas.toDataURL('image/png');
        const pdf = new jspdf.jsPDF({
            orientation: 'landscape',
        });

        // Título y Fecha
        pdf.setFontSize(15); // Tamaño de la fuente para el título y fecha
        const title = "Empresa LogicNestSystems - Reporte de GamingChairs";
        const date = "Fecha: " + new Date().toLocaleDateString() + "  Hora: " + new Date().toLocaleTimeString();
        const pageWidth = pdf.internal.pageSize.getWidth();
        const titleWidth = pdf.getStringUnitWidth(title) * pdf.internal.getFontSize() / pdf.internal.scaleFactor;
        const dateWidth = pdf.getStringUnitWidth(date) * pdf.internal.getFontSize() / pdf.internal.scaleFactor;

        // Posicionamiento del título y fecha
        pdf.text(title, (pageWidth - titleWidth) / 2, 15);
        pdf.text(date, (pageWidth - dateWidth) / 2, 25);

        // Ajustar la imagen de la tabla al tamaño del PDF
        const imgProps = pdf.getImageProperties(imgData);
        const pdfHeight = pdf.internal.pageSize.getHeight();
        const pdfWidth = pdf.internal.pageSize.getWidth();
        let imgHeight = (imgProps.height * pdfWidth) / imgProps.width;

        // Asegurar que la imagen no sea más alta que el espacio disponible
        if (imgHeight > pdfHeight - 30) {
            imgHeight = pdfHeight - 30; // Dejar espacio para los márgenes
        }

        // Añadir la imagen de la tabla
        pdf.addImage(imgData, 'PNG', 0, 30, pdfWidth, imgHeight);
        pdf.save('GamingChairs.pdf');
    });
}

// ======================================================================================== //
// ==================================== ACCESSORIES ======================================= //
// ======================================================================================== //