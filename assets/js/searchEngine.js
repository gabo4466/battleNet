let filter = 0;
const filters = document.getElementById("filters").children;
const searchBar = document.forms['formSearch'].querySelector('input');
searchBar.addEventListener('keyup', function(e) {
    const term = e.target.value.toLocaleLowerCase();
    search(term);
});

/**
 * Funcion que segun el termino de busqueda, muestra u oculta los productos
 */
function search(term){
    const products = document.getElementsByClassName('titleStr');
    let notFound = document.getElementById('notFound');
    let results = false;
    Array.from(products).forEach(function(product) {
        const productType = product.parentElement.getElementsByClassName("type")[0].innerHTML;
        const name = product.textContent;
        if (name.toLowerCase().indexOf(term) != -1 && (filter == productType || filter == 0)) {
            product.parentElement.parentElement.style.display = 'flex';
            results = true;
        } else {
            product.parentElement.parentElement.style.display = 'none';
        }
    });
    notFound.style.display = results ? 'none' : 'block';
}

/**
 * Funcion que filtra los productos segun el tipo de producto
 * @param value
 */
function filterByType(value){
    filter = value === filter?0:value;
    search(document.getElementById("searchBar").value);
}