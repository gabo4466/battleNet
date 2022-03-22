<?php

class Product {
    private $id;
    private $name;
    private $desc;
    private $prize;
    private $stock;
    private $img;
    private $type;

    /**
     * @param $id
     * @param $name
     * @param $desc
     * @param $prize
     * @param $stock
     * @param $img
     */
    public function __construct($name, $prize, $stock, $desc, $img, $type, $id = "") {
        $this->id = $id;
        $this->name = $name;
        $this->desc = $desc;
        $this->prize = $prize;
        $this->stock = $stock;
        $this->type = $type;
        $this->img = $img;
    }

    /**
     * Método que crea la tarjeta de un producto en la tienda.
     * @param $url direccion del directorio donde se guardan las imagenes.
     * @return $result Codigo html de la tarjeta para mostrar en la pagina.
     */
    public function createCard($url){

        $result = "";
        $result .= "<div class='card'>";
        // Imagen
        $result .= "<div class='image'><img src='". $url . $this->getImg()."'></div>";
        // Titulo
        $result .= "<div class='title'><p class='titleStr'>".$this->getName()."</p>";
        // Tipo
        if ($this->getType() == 1){
            $result .= "<span class='type'>Juego</span></div>";
        }else if($this->getType() == 2){
            $result .= "<span class='type'>Estatuilla</span></div>";
        }else if($this->getType() == 3){
            $result .= "<span class='type'>Póster</span></div>";
        }else if($this->getType() == 4){
            $result .= "<span class='type'>Peluche</span></div>";
        }else if($this->getType() == 5){
            $result .= "<span class='type'>Ropa</span></div>";
        }
        // Descripcion
        $result .= "<div class='description'><p>".$this->getDesc()."</p></div>";
        // Precio
        $result .= "<div class='prize'><p>".$this->getPrize()." €</p>";
        // Boton de compra o indicador de agotado
        if ($this->getStock() == 1){
            $result .= "<a><img class='shop clickAble' onclick='addProduct(".$this->getId().")' src='assets/img/carrito-de-compras.png' alt='comprar'></a></div>";
        }else{
            $result .= "<a><img class='shop notClickAble' src='assets/img/out-of-stock.png' alt='comprar'></a></div>";
        }
        $result .= "</div>";

        return $result;
    }

    public function associativeArray(){
        return array("id"=>$this->id, "name"=>$this->name, "prize"=>$this->prize, "desc"=>$this->desc, "type"=>$this->type, "stock"=>$this->stock, "img"=>$this->img);
    }


    /**
     * @return mixed|string
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param mixed|string $id
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDesc() {
        return $this->desc;
    }

    /**
     * @param mixed $desc
     */
    public function setDesc($desc) {
        $this->desc = $desc;
    }

    /**
     * @return mixed
     */
    public function getPrize() {
        return $this->prize;
    }

    /**
     * @param mixed $prize
     */
    public function setPrize($prize) {
        $this->prize = $prize;
    }

    /**
     * @return mixed
     */
    public function getStock() {
        return $this->stock;
    }

    /**
     * @param mixed $stock
     */
    public function setStock($stock) {
        $this->stock = $stock;
    }

    /**
     * @return mixed
     */
    public function getImg() {
        return $this->img;
    }

    /**
     * @param mixed $img
     */
    public function setImg($img) {
        $this->img = $img;
    }

    /**
     * @return mixed
     */
    public function getType() {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type) {
        $this->type = $type;
    }


}