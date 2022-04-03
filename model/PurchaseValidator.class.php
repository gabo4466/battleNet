<?php

require_once "BuyProducts.class.php";
require_once "Product.class.php";
class PurchaseValidator extends BuyProducts {

    private $products;
    private $userId;
    private $transactionId;

    /**
     * Constructor, instancia los productos y el id
     * @param $products Product[] productos de la compra
     * @param $transactionId String id de la transaccion de paypal
     * @param $userId String id del usuario con la sesión iniciada
     */
    public function __construct($products, $userId,$transactionId) {
        parent::__construct();
        $this->products = $products;
        $this->transactionId = $transactionId;
        $this->userId = $userId;
    }

    /**
     * Metodo que realiza las validaciones necesarias de la compra y carga los productos al usuario
     */
    public function purchase(){
        //FALTA LA CAPA DE SEGURIDAD DE LA TRANSACCION DE PAYPAL!!!!!
        foreach ($this->products as $product){
            if (!$this->insertProduct($this->userId, $product->getId())){
                header("location: ../store.php?error=500");
                exit();
            }
        }
    }


}