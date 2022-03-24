let products;
let total = 0;
/**
 * @author Gabriel y Fran
 * @version 03.2022
 * @param data Lista de ids de productos.
 */
function getItems(data) {
    let xhr = new XMLHttpRequest();
    console.log("asd")
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4){
            if (xhr.status === 200) {
                products = JSON.parse(xhr.responseText);
            }else{
                alert("Algo ha ido mal.");
            }
        }
    };
    xhr.open("POST", "controller/store.controller.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.send(data)
    setTimeout("console.log('Done')", 1000);
}

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

function configPaypal(){
    paypal.Buttons({

        // Sets up the transaction when a payment button is clicked
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: total // Can reference variables or functions. Example: `value: document.getElementById('...').value`
                    }
                }]
            });
        },

        // Finalize the transaction after payer approval
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(orderData) {
                // Successful capture! For dev/demo purposes:
                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                var transaction = orderData.purchase_units[0].payments.captures[0];
                alert('Transaction '+ transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');

                // When ready to go live, remove the alert and show a success message within this page. For example:
                // var element = document.getElementById('paypal-button-container');
                // element.innerHTML = '';
                // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                // Or go to another URL:  actions.redirect('thank_you.html');
            });
        }
    }).render('#paypal-button-container');
}

loadProducts();
