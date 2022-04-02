<?php

require_once ("ForumObj.class.php");

class Forum extends ForumObj{
    private $channels;
    public function __construct($name, $desc, $id="") {

        parent::__construct($name, $desc, $id);
    }

    public function createOption() {

        $result = "";

        $result .= "<a href='channel.php?forum=".$this->getId()."'>".$this->getName()."&nbsp;&nbsp;&nbsp;<span>(".$this->getDesc().")</span></a>";

        return $result;
    }

}