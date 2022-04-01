<?php
require_once ("DBConnection.class.php");
require_once ("Store.class.php");

class BuyProducts extends DBConnection {

    private $store;

    /**
     * Constructor que crea el objeto de la tienda
     */
    public function __construct() {
        $this->store = new Store;
    }

    public function checkCode(){

    }



}