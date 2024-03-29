<?php
require_once("DBConnection.class.php");
require_once ("Product.class.php");
class Store extends DBConnection {

    private $productsList;
    // ADVERTENCIA: CAMBIAR EN CASO DE QUE EL DIRECTORIO SEA DISTINTO
    private $imagesDirectory = "../BattleNet-Admin/assets/img/";

    /**
     * Crea el objeto y llena la lista con todos los productos disponibles.
     */
    public function __construct() {
        $this->productsList = $this->getProducts();
    }

    /**
     * Metodo que retorna un producto especifico segun un id.
     * @author Gabriel y Fran
     * @version 3.2022
     * @param id el id del producto que se desea buscar.
     * @return array Lista de productos en la base de datos.
     */
    public function getProduct($id){
        $stmt = $this->connect()->prepare("SELECT id_products, products_name, products_prize, products_stock, products_desc, products_img, products_type FROM products WHERE id_products = ?;");
        if (!$stmt->execute($id)){
            $stmt = null;
            $result = false;
        }else{
            $product = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $result = new Product($product[0]['products_name'], $product[0]['products_prize'], $product[0]['products_stock'], $product[0]['products_desc'], $product[0]['products_img'], $product[0]['products_type'], $product[0]['id_products']);

        }
        return $result;
    }


    /**
     * Metodo que retorna todos los productos de la base de datos.
     * @author Gabriel y Fran
     * @version 3.2022
     * @return array Lista de productos en la base de datos.
     */
    public function getProducts(){
        $stmt = $this->connect()->query('SELECT id_products, products_name, products_prize, products_stock, products_desc, products_img, products_type FROM products');
        // Comprueba si la query se ha realizado con exito, en caso contrario retorna un array vacio.
        if ($stmt == false){
            $stmt = null;
            return [];
        }
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $productsLength = sizeof($products);
        $result = [];
        for ($i = 0; $i < $productsLength; $i++){
            $product = new Product($products[$i]['products_name'], $products[$i]['products_prize'], $products[$i]['products_stock'], $products[$i]['products_desc'], $products[$i]['products_img'], $products[$i]['products_type'], $products[$i]['id_products']);
            array_push($result, $product);
        }
        return $result;
    }

    /**
     * @author Gabriel y Fran
     * @version 03.2022
     * @return $result html con las tarjetas para mostrar en la tienda de productos
     */
    public function createCards(){
        $result = "";
        foreach ($this->productsList as $value){
            $result .= $value->createCard($this->imagesDirectory);
        }
        return $result;
    }
    /**
     * @return array
     */
    public function getProductsList() {
        return $this->productsList;
    }

    /**
     * Método que segun una lista de ids, devuelve una lista de productos.
     * @author Gabriel y Fran
     * @version 03.2022
     * @param $ids lista de ids de productos.
     */
    public function findProducts($ids){
        $result = array();
        $error = false;
        $i = 0;
        while(!$error && $i < count($ids)){
            $stmt = $this->connect()->prepare("SELECT id_products, products_name, products_prize, products_stock, products_desc, products_img, products_type FROM products WHERE id_products = ?;");
            if (!$stmt->execute(array($ids[$i]))){
                $stmt = null;
                $result = [];
                $error = true;
            }else {
                if ($stmt->rowCount() > 0) {
                    $product = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $product = new Product($product[0]['products_name'], $product[0]['products_prize'], $product[0]['products_stock'], $product[0]['products_desc'], $product[0]['products_img'], $product[0]['products_type'], $product[0]['id_products']);
                    array_push($result, $product->associativeArray());
                }
            }
            $i++;
        }
        return $result;
    }

    /**
     * Metodo que devuelve todos los productos que tiene comprado un usuario
     * @param $id String id del usuario
     * @return array Con la lista de productos
     */
    public function getProductsOfUser($id){
        $stmt = $this->connect()->prepare("SELECT p.id_products as id, p.products_name as name, p.products_prize as prize, p.products_stock as stock, p.products_desc as description, p.products_img as img, p.products_type as type, up.purchase_date as date FROM users_has_products as up join products as p on p.id_products = up.fk_products WHERE up.fk_users = ? and p.id_products is not null;");
        $result = array();
        if (!$stmt->execute(array($id))){
            $stmt = null;
        }else{
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $productsLength = sizeof($products);
            for ($i = 0; $i < $productsLength; $i++){
                $product = new Product($products[$i]['name'], $products[$i]['prize'], $products[$i]['stock'], $products[$i]['description'], $products[$i]['img'], $products[$i]['type'], $products[$i]['id']);
                $product->setDate($products[$i]['date']);
                array_push($result, $product->associativeArray());
            }
        }
        return $result;
    }

}