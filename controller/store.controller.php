<?php
require_once ("../model/Store.class.php");


header("Content-Type: application/json");
$ids = json_decode(file_get_contents('php://input'));
$store = new Store();
echo json_encode($store->findProducts($ids));


