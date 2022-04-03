<?php
require_once ("ForumObj.class.php");

class Channel extends ForumObj{
    private $idForum;
    public function __construct($name, $desc, $id="", $idForum = "") {
        $this->idForum = $idForum;
        parent::__construct($name, $desc, $id);
    }


    public function createOption() {

        $result = "";

        $result .= "<a href='thread.php?forum=".$this->idForum."&channel=".$this->getId()."'>".$this->getName()."&nbsp;&nbsp;&nbsp;<span>(".$this->getDesc().")</span></a>";

        return $result;
    }

}