<?php

session_start([
    'read_and_close'  => true
]);

// Comprobar que el usuario venga por la ruta correcta (submit del formulario de login)
if (isset($_POST) && isset($_SESSION['userId'])){
    // Recoger Data
    echo $_POST['products'];
    $productsJson = json_decode($_POST['products'], true);
    $transactionId = addslashes($_POST['transactionId']);
    $userId = $_SESSION['userId'];
    $productsLength = sizeof($productsJson);
    $products = array();

    // Instancia de objetos para validar la entrada
    require_once "../model/PurchaseValidator.class.php";
    require_once "../model/Product.class.php";

    for ($i = 0; $i < $productsLength; $i++){
        $product = new Product($productsJson[$i]['name'], $productsJson[$i]['prize'], $productsJson[$i]['stock'], $productsJson[$i]['desc'], $productsJson[$i]['img'], $productsJson[$i]['type'], $productsJson[$i]['id']);
        array_push($products, $product);
    }
    $validator = new PurchaseValidator($products, $userId, $transactionId);
    $validator->purchase();
    header("location: ../store.php?error=none&purchase=true");

}else{
    echo "No se envió el post o no hay sesión";
    header("location: ../store.php?error=500");
    exit();
}
