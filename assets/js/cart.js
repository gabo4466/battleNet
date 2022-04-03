let products;
let total = 0;
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
                products = JSON.parse(xhr.responseText);
            }else{
                popUp(3, "Algo ha ido mal.")
            }
        }
    };
    xhr.open("POST", "controller/store.controller.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.send(data)
    setTimeout("console.log('Done')", 1000);
}

/**
 * Funcion que prepara la informacion despues de la compra y llama al controlador
 * @param Id de la transaccion de paypal
 */
function purchase(transactionId){
    document.getElementsByName("products")[0].value = JSON.stringify(products);
    document.getElementsByName("transactionId")[0].value = transactionId;
    document.frmPurchase.submit();
}

/**
 * Esta funcion carga los productos desde la base de datos en una variable local.
 * @author Gabriel y Fran
 * @version 03.2022
 */
function loadProducts(){
    let ids = sessionStorage.getItem("cart");
    if (ids !== null){
        getItems(ids);
    }else{
        products = [];
    }
    setTimeout("loadTable()", 1000);
    setTimeout("configPaypal()", 1000);
}

function loadTable(){

    let html = "<div class='table'>" +
        "<div class='row tableHeader'>" +
        "<div class='column'>Producto</div>" +
        "<div class='column'>Tipo</div>" +
        "<div class='column'>Precio</div></div>";
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
        total += parseFloat(product.prize);
        html += "<div class='row'>" +
            "<div class='column'>"+product.name+"</div>" +
            "<div class='column'>"+type+"</div>" +
            "<div class='column'>"+parseFloat(product.prize).toFixed(2)+"€</div>" +
            "</div>";
    });
    if (products.length === 0){
        html += "<div class='row' style='font-size: x-large'>No se han encontrado productos en el carrito.</div>";
    }else{
        html += "<div class='rowTotal' style=''><div class='column'></div><div class='column'>Total</div><div class='column' style='font-weight: bolder'>"+total.toFixed(2)+"€</div></div>"
    }

    html += "</div>";
    document.getElementById("tableContainer").innerHTML += html;
}


/**
 * Esta funcion realiza las configuraciones necesarias para realizar pagos en paypal
 */
function configPaypal(){
    paypal.Buttons({
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: total
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(orderData) {
                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                let transaction = orderData.purchase_units[0].payments.captures[0];
                purchase(transaction);
                //popUp(2, "Transacción completada con éxito: <span class='smaller'>"+ transaction.id +"</span>");
            });
        }
    }).render('#paypal-button-container');
}

/**
 * @author Gabriel y Fran
 * @version 03.2022
 * @param id Id del pago.
 */
function confirmPayment(id) {
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
    xhr.open("POST", "controller/store.controller.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.send(id)
}

loadProducts();
