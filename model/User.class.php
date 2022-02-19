<?php

class User {

    private $id;
    private $name;
    private $nif;
    private $address;
    private $email;
    private $nickname;

    /**
     * @param $name
     * @param $nif
     * @param $address
     * @param $email
     * @param $nickname
     * @param $id;
     */
    public function __construct($name, $nif, $address, $email, $nickname, $id = "") {
        $this->name = strtolower(trim($name));
        $this->nif = strtoupper(trim($nif));
        $this->address = strtolower(trim($address));
        $this->email = strtolower(trim($email));
        $this->nickname = trim($nickname);
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



}