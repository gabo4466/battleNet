const searchBar = document.forms['formSearch'].querySelector('input');
searchBar.addEventListener('keyup', function(e) {
    const term = e.target.value.toLocaleLowerCase();
    const products = document.getElementsByClassName('titleStr');
    let notFound = document.getElementById('notFound');
    let results = false;
    Array.from(products).forEach(function(product) {
        const name = product.textContent;
        if (name.toLowerCase().indexOf(term) != -1) {
            product.parentElement.parentElement.style.display = 'flex';
            results = true;
        } else {
            product.parentElement.parentElement.style.display = 'none';
        }
    });
    notFound.style.display = results ? 'none' : 'block';
});