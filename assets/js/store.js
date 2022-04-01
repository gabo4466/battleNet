let filter = 0;
let cart = []
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
    if (value === filter){
        filter = 0;
    }else{
        filter = value;
    }
    changeColorFilter(value);
    search(document.getElementById("searchBar").value);
}

/**
 * Funcion que cambia las clases de las opciones de los filtros
 */
function changeColorFilter(value){
    for (let i=0;i<filters.length;i++){

        if (filters[i].innerHTML === filter){
            filters[i].classList.remove("notSelected");
            filters[i].classList.add("selected");
        }else{
            filters[i].classList.remove("selected");
            filters[i].classList.add("notSelected");
        }
    }
}

/**
 * Funcion que prepara el carro de la compra.
 * @param id del objeto en la base de datos.
 */
function addProduct(id){
    if (cart.indexOf(id) === -1){
        cart.push(id);
        sessionStorage.setItem("cart", JSON.stringify(cart));
    }
}

/**
 * @author Gabriel y Fran
 * @version 03.2022
 * <p>Creacion de la ventana emergente que permite ingresar el codigo para canjear productos</p>
 */
function redeemCodePopUp(){
    let popUpHtml = "<div class='box'>";
    popUpHtml += "<div class='textPopUp'>Ingrese el código que desea canjear</div>";
    popUpHtml += "<form name='frmRedeem' action='controller/redeemCode.controller.php' method='post' enctype='multipart/form-data'>";
    popUpHtml += "<input type='text' name='code1' maxlength='4'><span>-</span>";
    popUpHtml += "<input type='text' name='code2' maxlength='4'><span>-</span>";
    popUpHtml += "<input type='text' name='code3' maxlength='4'><span>-</span>";
    popUpHtml += "<input type='text' name='code4' maxlength='4'>";
    popUpHtml += "<input style='display: none' type='text' name='code'>";
    popUpHtml += "</form>";
    popUpHtml += "<div class='buttonPopUp'><button type='button'>Cerrar</button><button type='button' onclick='redeemCode()'>Aceptar</button></div>";
    popUpHtml += "</div>";
    document.getElementById("popUp").innerHTML = popUpHtml;
    document.getElementById("dimmer").style.display = "block";
    let box = document.getElementById('popUp');
    box.classList.remove('visualHidden');
    let btn = box.querySelector('button');
    btn.addEventListener('click', function () {
        box.addEventListener('transitionend', function(e) {
            document.getElementById("dimmer").style.display = "none";
            document.getElementById("popUp").innerHTML = "";
        }, {
            capture: false,
            once: true,
            passive: false
        });
        box.classList.add('visualHidden');
    }, false);
}


function redeemCode(){
    document.getElementsByName('code')[0].value = document.getElementsByName('code1')[0].value + document.getElementsByName('code2')[0].value+document.getElementsByName('code3')[0].value+document.getElementsByName('code4')[0].value;
    console.log(document.getElementsByName('code').value);
    document.frmRedeem.submit();
}
