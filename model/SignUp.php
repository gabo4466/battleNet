<?php
require_once ("DBConnection.php");
class SignUp {
    private $name;
    private $nif;
    private $address;
    private $email;
    private $nickname;
    private $pwd;

    /**
     * @param $name
     * @param $nif
     * @param $address
     * @param $email
     * @param $nickname
     * @param $pwd
     */
    public function __construct($name, $nif, $address, $email, $nickname, $pwd) {
        $this->name = $name;
        $this->nif = $nif;
        $this->address = $address;
        $this->email = $email;
        $this->nickname = $nickname;
        $this->pwd = $pwd;
    }




}