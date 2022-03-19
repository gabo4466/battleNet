<?php

class Product {
    private $id;
    private $name;
    private $desc;
    private $prize;
    private $stock;
    private $img;

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
        $this->img = $img;
    }

    public function createCard($url){

        $result = "";

        $result .= "<div class='card'>";
        // Imagen
        $result .= "<div class='image'><img src='". $url->imagesDirectory . $this->getImg()."'></div>";
        $result .= "<div class='title'><p class='titleStr'>".$this->getName()."</p></div>";
        $result .= "<div class='description'><p>".$this->getDesc()."</p></div>";
        $result .= "<div class='prize'><p>".$this->getPrize()." €</p>";
        if ($this->getStock() == 1){
            $result .= "<a><img class='shop clickAble' src='assets/img/carrito-de-compras.png' alt='comprar'></a></div>";
        }else{
            $result .= "<a><img class='shop notClickAble' src='assets/img/out-of-stock.png' alt='comprar'></a></div>";
        }
        $result .= "</div>";
        return $result;
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

}