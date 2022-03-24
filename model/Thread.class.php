<?php
require_once ("ForumObj.class.php");

class Thread extends ForumObj{
    private $idChannel;
    public function __construct($name, $desc, $id="", $idChannel = "") {
        $this->idChannel = $idChannel;
        parent::__construct($name, $desc, $id);
    }


    public function createOption() {

        $result = "";

        $result .= "<a href='openThread.php?channel=".$this->idChannel."&thread=".$this->getId()."'>".$this->getName()."</a>";

        return $result;
    }

}