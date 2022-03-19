<?php

abstract class ForumObj{
  protected $id;
  protected $name;
  protected $desc;

    /**
     * @param $id
     * @param $name
     * @param $desc
     */
    public function __construct($name, $desc, $id="") {
        $this->name = $name;
        $this->desc = $desc;
        $this->id = $id;
    }

    /**
     * método implementado en los hijos que va a devolver el HTML para pintarlo en la web
     * @return devuelve código HTML
     */
    public abstract function createOption();

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




}