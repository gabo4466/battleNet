<?php

session_start([
    'read_and_close'  => true
]);

require_once ("../model/Store.class.php");
header("Content-Type: application/json");
$userId = $_SESSION['userId'];
$store = new Store();
echo json_encode($store->getProductsOfUser($userId));
