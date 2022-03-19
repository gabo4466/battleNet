<?php
require_once ("ForumObj.class.php");

class Channel extends ForumObj{

    public function __construct($name, $desc, $id="") {

        parent::__construct($name, $desc, $id);
    }

    public function createOption() {
        // TODO: Implement createOption() method.
    }
}