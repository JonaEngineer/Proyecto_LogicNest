// Función para manejar la navegación por pestañas
function openCategory(evt, categoryName) {
    var i, tabcontent, tablinks;

    // Ocultar todo el contenido
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Remover la clase "active" de todos los botones
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Mostrar el contenido seleccionado y añadir la clase "active" al botón clickeado
    document.getElementById(categoryName).style.display = "block";
    evt.currentTarget.className += " active";
}