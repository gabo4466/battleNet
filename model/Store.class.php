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
            $result .= "<div class='card'>";
            // Imagen
            $result .= "<div class='image'><img src='". $this->imagesDirectory . $value->getImg()."'></div>";
            // Titulo
            $result .= "<div class='title'><p class='titleStr'>".$value->getName()."</p>";
            // Tipo
            if ($value->getType() == 1){
                $result .= "<span class='type'>Juego</span></div>";
            }else if($value->getType() == 2){
                $result .= "<span class='type'>Estatuilla</span></div>";
            }else if($value->getType() == 3){
                $result .= "<span class='type'>Póster</span></div>";
            }else if($value->getType() == 4){
                $result .= "<span class='type'>Peluche</span></div>";
            }else if($value->getType() == 5){
                $result .= "<span class='type'>Ropa</span></div>";
            }
            // Descripcion
            $result .= "<div class='description'><p>".$value->getDesc()."</p></div>";
            // Precio
            $result .= "<div class='prize'><p>".$value->getPrize()." €</p>";
            // Boton de compra o indicador de agotado
            if ($value->getStock() == 1){
                $result .= "<a><img class='shop clickAble' src='assets/img/carrito-de-compras.png' alt='comprar'></a></div>";
            }else{
                $result .= "<a><img class='shop notClickAble' src='assets/img/out-of-stock.png' alt='comprar'></a></div>";
            }
            $result .= "</div>";
        }
        return $result;
    }
    /**
     * @return array
     */
    public function getProductsList() {
        return $this->productsList;
    }

}