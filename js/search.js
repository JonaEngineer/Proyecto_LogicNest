// Agrega este código al final de tu archivo JavaScript o dentro de una etiqueta <script> en tu HTML
document.addEventListener('DOMContentLoaded', function () {
    const searchButton = document.getElementById('searchButton');
    const searchInput = document.getElementById('searchInput');

    searchButton.addEventListener('click', function () {
        const searchTerm = searchInput.value.trim();
        if (searchTerm !== '') {
            // Aquí puedes realizar la acción de búsqueda, por ejemplo, buscar en el contenido de la página y mostrar los resultados relevantes
            searchProducts(searchTerm);
        } else {
            // Aquí puedes manejar el caso cuando el campo de búsqueda está vacío
            alert('Please enter a search term');
        }
    });

    // También puedes agregar la funcionalidad de búsqueda cuando se presiona la tecla Enter en el campo de búsqueda
    searchInput.addEventListener('keydown', function (event) {
        if (event.key === 'Enter') {
            searchButton.click();
        }
    });
});

function searchProducts(searchTerm) {
    // Aquí puedes implementar la lógica para buscar dentro del contenido de tu página
    // Por ejemplo, puedes recorrer los elementos de tu página y buscar el término de búsqueda en el texto
    const products = document.querySelectorAll('.shirt_text'); // Selecciona los elementos con la clase 'shirt_text'

    products.forEach(product => {
        const productTitle = product.textContent.toLowerCase(); // Obtén el texto del elemento y conviértelo a minúsculas para que la búsqueda sea insensible a mayúsculas y minúsculas
        if (productTitle.includes(searchTerm.toLowerCase())) {
            // Si el título del producto contiene el término de búsqueda, muestra el producto
            product.closest('.box_main').style.display = 'block'; // Muestra el contenedor del producto
        } else {
            // Si el título del producto no contiene el término de búsqueda, oculta el producto
            product.closest('.box_main').style.display = 'none'; // Oculta el contenedor del producto
        }
    });
}
