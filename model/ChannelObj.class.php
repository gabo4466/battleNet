<?php

class ChannelObj{
  private $id;
  private $name;
  private $desc;

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