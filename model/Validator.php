<?php

class Validator {


    public function __construct() {
    }

    public function emptyRegisterFields($post){
        $empty = false;
        foreach ($post as $field){
            echo "CAMPO:" . $field;
            if ($field ===""){
                $empty = true;
            }
        }

        return $empty;
    }

    public function invalidEmail($email){

    }


}