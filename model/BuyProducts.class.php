<?php
require_once ("DBConnection.class.php");
require_once ("Store.class.php");

class BuyProducts extends DBConnection {

    private $store;

    /**
     * Constructor que crea el objeto de la tienda
     */
    public function __construct() {
        $this->store = new Store();
    }

    /**
     * Metodo que valida el codigo a canjear
     * @param $code
     * @return bool <ul>
     * <li><strong>Verdadero</strong> si el codigo existe y esta disponible</li>
     * <li><strong>Falso</strong> si el codigo no existe o no esta disponible</li>
     */
    protected function checkCode($code){

        $stmt = $this->connect()->prepare('SELECT giftcards_unclaimed FROM giftcards WHERE giftcards_code = ?;');
        if (!$stmt->execute(array($code))){
            $stmt = null;
            header("location: ../store.php?error=500");
            exit();
        }
        if ($stmt->rowCount() > 0){
            // El codigo existe.
            $codeAux = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($codeAux[0]["giftcards_unclaimed"] === "1"){
                // El codigo ya ha sido canjeado
                $resultCheck = false;
            }else{
                // El codigo es valido
                $resultCheck = true;
            }
        }else{
            // El codigo no existe
            $resultCheck = false;
        }
        return $resultCheck;
    }

    protected function useCode($code, $userId){
        $stmt = $this->connect()->prepare('UPDATE giftcards SET giftcards_unclaimed = 1 WHERE giftcards_code = ?;');
        if (!$stmt->execute(array($code))){
            $stmt = null;
            header("location: ../store.php?error=500");
            exit();
        }
        $stmt = $this->connect()->prepare('SELECT fk_products FROM giftcards WHERE giftcards_code = ?;');
        if (!$stmt->execute(array($code))){
            $stmt = null;
            header("location: ../store.php?error=500");
            exit();
        }
        $productId = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $productId = $productId[0]['fk_products'];
        $date = date('Y-m-d');
        $stmt = $this->connect()->prepare('INSERT INTO users_has_products (fk_users, fk_products, purchase_date) VALUES (?, ?, ?)');
        if (!$stmt->execute(array($userId, $productId, $date))){
            $stmt = null;
            header("location: ../store.php?error=500");
            exit();
        }
    }



}