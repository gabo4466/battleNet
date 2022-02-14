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
        $this->name = strtolower(trim($name));
        $this->nif = strtoupper(trim($nif));
        $this->address = strtolower(trim($address));
        $this->email = strtolower(trim($email));
        $this->nickname = trim($nickname);
        $this->pwd = $pwd;
        $this->pwdRepeat = $pwdRepeat;
    }


    public function signUpUser(){
        if($this->emptyInput() == false){
            header("location: ../signup.php?error=emptyinput");
            exit();
        }
        if ($this->invalidName() == false){
            header("location: ../signup.php?error=invalidname");
            exit();
        }
        if ($this->invalidNickname() == false){
            header("location: ../signup.php?error=invalidnickname");
            exit();
        }
        if ($this->invalidEmail() == false){
            header("location: ../signup.php?error=invalidemail");
            exit();
        }
        if ($this->pwdMatch() == false){
            header("location: ../signup.php?error=pwdmatch");
            exit();
        }

    }

    /**
     * Metodo que comprueba que ningun campo este vacio
     * @return bool
     */
    public function emptyInput(){
        if (empty($this->name) || empty($this->nif) || empty($this->address) || empty($this->email) || empty($this->nickname) || empty($this->pwd) || empty($this->pwdRepeat)){
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
        if (!preg_match("/^[a-zA-Z\s]+$/", $this->name)){
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
        if (!preg_match("/^[a-zA-Z0-9]+$/", $this->nickname)){
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