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

    /**
     * Metodo que carga el producto vinculado al codigo al usuario
     * @param $code codigo del producto
     * @param $userId id del usuario que tiene la sesion iniciada
     */
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
        if(!$this->insertProduct($userId, $productId)){
            header("location: ../store.php?error=500");
            exit();
        }

    }

    /**
     * Metodo que inserta un producto a un usuario
     * @param $userId
     * @param $productId
     * @param $date
     * @return bool <ul>
     * <li><strong>Verdadero</strong> si se ha realizado con éxito</li>
     * <li><strong>Falso</strong> si ha ocurrido algún fallo</li>
     */
    protected function insertProduct($userId, $productId){
        $date = date('Y-m-d');
        $stmt = $this->connect()->prepare('INSERT INTO users_has_products (fk_users, fk_products, purchase_date) VALUES (?, ?, ?)');
        if (!$stmt->execute(array($userId, $productId, $date))){
            $stmt = null;
            $result = false;
            exit();
        }else{
            $result = true;
        }
        return $result;
    }

}