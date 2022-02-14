<?php

class SignUpValidator {
    private $name;
    private $nif;
    private $address;
    private $email;
    private $nickname;
    private $pwd;
    private $pwdRepeat;

    public function __construct($name, $nif, $address, $email, $nickname, $pwd, $pwdRepeat) {
        $this->name = trim($name);
        $this->nif = trim($nif);
        $this->address = trim($address);
        $this->email = trim($email);
        $this->nickname = trim($nickname);
        $this->pwd = trim($pwd);
        $this->pwdRepeat = trim($pwdRepeat);
    }

    public function emptyInput(){
        if (empty($name) || empty($nif) || empty($address) || empty($email) || empty($nickname) || empty($pwd) || empty($pwdRepeat)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

    /**
     * Comprueba que el nombre sea valido (contenga solo letras)
     * @return bool
     */
    public function invalidName(){
        if (preg_match("/^[a-zA-Z\s]+$/", $this->name)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

    /**
     * Comprueba que el nickname introducido sea valido
     * @return bool
     */
    public function invalidNickname(){
        if (preg_match("/^[a-zA-Z0-9\s]+$/", $this->name)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }


    /**
     * Comprueba que el email sea valido
     * @return bool
     */
    public function invalidEmail(){
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

    /**
     * Comprueba que la contrasena repetida sea correcta.
     * @return bool
     */
    public function pwdMatch(){
        if ($this->pwd !== $this->pwdRepeat){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }




}