<?php
require_once("SignUp.class.php");
require_once ("User.class.php");
class SignUpValidator extends SignUp {

    private $user;
    private $pwd;
    private $pwdRepeat;

    public function __construct(User $user ,$pwd, $pwdRepeat) {
        $this->user = $user;
        $this->pwd = $pwd;
        $this->pwdRepeat = $pwdRepeat;
    }

    /**
     * Metodo que valida todos los campos y llama al metodo para guardar el usuario en base de datos
     */
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
        if ($this->emailTaken() == false){
            header("location: ../signup.php?error=invalidemail");
            exit();
        }
        $this->insertUser($this->user, $this->pwd);

    }

    /**
     * Metodo que comprueba que ningun campo este vacio
     * @return bool
     */
    public function emptyInput(){
        if (empty($this->user->getName()) || empty($this->user->getNif()) || empty($this->user->getAddress()) || empty($this->user->getEmail()) || empty($this->user->getNickname()) || empty($this->pwd) || empty($this->pwdRepeat)){
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
        if (!preg_match("/^[a-zA-Z\s]+$/", $this->user->getName())){
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
        if (!preg_match("/^[a-zA-Z0-9]+$/", $this->user->getNickname())){
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
        if (!filter_var($this->user->getEmail(), FILTER_VALIDATE_EMAIL)){
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

    /**
     * Metodo que verifica que el email no haya sido utilizado
     * @return bool
     */
    public function emailTaken(){
        if (!$this->checkEmail($this->user->getEmail())){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

}