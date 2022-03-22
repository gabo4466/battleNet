let products;
/**
 * @author Gabriel y Fran
 * @version 03.2022
 * @param data Lista de ids de productos.
 */
function getItems(data) {
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4){
            if (xhr.status === 200) {
                products = (xhr.responseText);
                console.log(products)
            }else{
                alert("Algo ha ido mal.")
            }
        }
    };
    xhr.open("POST", "controller/store.controller.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.send(data);
}

function loadProducts(){
    let ids = sessionStorage.getItem("cart");
    if (ids !== null){
        getItems(ids);
    }else{
        products = [];
    }
}