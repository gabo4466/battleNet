let products = [];

function loadPurchases(){
    getItems();
    setTimeout("loadTable()", 1000);
}

function getItems() {
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4){
            if (xhr.status === 200) {
                products = JSON.parse(xhr.responseText);
            }else{
                popUp(3, "Algo ha ido mal.")
            }
        }
    };
    xhr.open("POST", "controller/userProducts.controller.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.send()
    setTimeout("console.log('Done')", 1000);
}

function loadTable(){

    let html = "<div class='table'>" +
        "<div class='row tableHeader'>" +
        "<div class='column'>Producto</div>" +
        "<div class='column'>Tipo</div>" +
        "<div class='column'>Precio</div>" +
        "<div class='column'>Fecha de compra</div></div>";
    products.forEach( product =>{
        let type = 0;
        if (product.type == 1){
            type = "Juego";
        }else if (product.type == 2){
            type = "Estatuilla";
        }else if (product.type == 3){
            type = "Póster";
        }else if (product.type == 4){
            type = "Peluche";
        }else if (product.type == 5){
            type = "Ropa";
        }else{
            type = "Indefinido";
        }
        html += "<div class='row'>" +
            "<div class='column'>"+product.name+"</div>" +
            "<div class='column'>"+type+"</div>" +
            "<div class='column'>"+parseFloat(product.prize).toFixed(2)+"€</div>" +
            "<div class='column'>"+product.date+"</div>" +
            "</div>";
    });
    if (products.length === 0){
        html += "<div class='row' style='font-size: x-large'>No se han encontrado productos asociados con el usuario.</div>";
    }

    html += "</div>";
    document.getElementById("tableContainer").innerHTML += html;
}

loadPurchases();