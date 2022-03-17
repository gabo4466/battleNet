<?php
require_once("DBConnection.class.php");
require_once ("Product.class.php");
class Store extends DBConnection {

    /**
     * @author Gabriel y Fran
     * @version 3.2022
     * @return array Lista de productos en la base de datos.
     */
    public function getProducts(){
        $stmt = $this->connect()->query('SELECT id_products, products_name, products_prize, products_stock, products_desc, products_img, products_type FROM products');
        // Comprueba si la query se ha realizado con exito, en caso contrario retorna un array vacio.
        if (!$stmt){
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

}