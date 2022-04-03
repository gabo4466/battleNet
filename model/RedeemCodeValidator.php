<?php

require_once("BuyProducts.class.php");
require_once("Product.class.php");

class RedeemCodeValidator extends BuyProducts {

    private $code;
    private $userId;

    /**
     * Constructor, guarda el codigo
     * @param $code Codigo que se desea canjear
     * @param $userId Id del usuario logueado
     */
    public function __construct($code, $userId) {
        parent::__construct();
        $this->code = $code;
        $this->userId = $userId;
    }

    /**
     * Metodo que valida el codigo y en caso de que sea valido, le carga al usuario el producto vinculado con el codigo
     * @author Gabriel y Fran
     * @version 04.2022
     */
    public function redeem(){
        if (!$this->checkCode($this->code)){
            header("location: ../store.php?error=invalidCode");
            exit();
        }
        $this->useCode($this->code, $this->userId);
    }

    /**
     * @return Codigo
     */
    public function getCode(): Codigo {
        return $this->code;
    }

    /**
     * @param Codigo $code
     */
    public function setCode(Codigo $code): void {
        $this->code = $code;
    }





}