<?php


header("Content-Type: application/json");
//$ids = json_decode(stripslashes(file_get_contents("php://input")));

require_once ("../model/Store.class.php");

$store = new Store();
$ids = array(1, 3);
echo json_encode($store->findProducts($ids));


