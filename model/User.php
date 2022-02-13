<?php
require_once ("DBConnection.php");
class User {
    private $id;
    private $name;
    private $nif;
    private $address;
    private $email;
    private $nickname;
    private $pwd;

    /**
     * si no se envia la contraseña o el id por defecto se asgina vacio
     * @param $name
     * @param $nif
     * @param $address
     * @param $email
     * @param $nickname
     * @param $pwd
     * @param $id
     */
    public function __construct($name, $nif, $address, $email, $nickname, $pwd="", $id="") {
        $this->name = $name;
        $this->nif = $nif;
        $this->address = $address;
        $this->email = $email;
        $this->nickname = $nickname;
        $this->pwd = $pwd;
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param mixed $id
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
    public function getNif() {
        return $this->nif;
    }

    /**
     * @param mixed $nif
     */
    public function setNif($nif) {
        $this->nif = $nif;
    }

    /**
     * @return mixed
     */
    public function getAddress() {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address) {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email) {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getNickname() {
        return $this->nickname;
    }

    /**
     * @param mixed $nickname
     */
    public function setNickname($nickname) {
        $this->nickname = $nickname;
    }

    /**
     * @return mixed
     */
    public function getPwd() {
        return $this->pwd;
    }

    /**
     * @param mixed $pwd
     */
    public function setPwd($pwd) {
        $this->pwd = $pwd;
    }

    public function insert(){
        $db = new DBConnection();
        $db->insertUser();
    }




}