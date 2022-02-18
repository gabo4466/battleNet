<?php
require_once ("DBConnection.php");
class SignUp extends DBConnection {

    /**
     * Metodo que comprueba que no exista un usuario con el email que se desea utilizar para el nuevo usuario
     * @param $id_users
     * @param $email
     * @return bool|void
     */
    protected function checkEmail($email){
        $stmt = $this->connect()->prepare('SELECT id_users FROM users WHERE users_email = ?;');

        if (!$stmt->execute(array($email))){
            $stmt = null;
            header("location: ../signup.php?error=stmtfailed");
            exit();
        }
        if ($stmt->rowCount() > 0){
            $resultCheck = false;
        }else{
            $resultCheck = true;
        }
        return $resultCheck;
    }

    /**
     * Metodo que inserta el usuario en la base de datos
     * @param $name
     * @param $nif
     * @param $address
     * @param $email
     * @param $nickname
     * @param $pwd
     */
    protected function insertUser($name, $nif, $address, $email, $nickname, $pwd){
        $stmt = $this->connect()->prepare('INSERT INTO users (users_name, users_nif, users_address, users_email, users_nickname, users_password) VALUES (?, ?, ?, ?, ?, ?);');
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        if (!$stmt->execute(array($name, $nif, $address, $email, $nickname, $hashedPwd))){
            $stmt = null;
            header("location: ../signup.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }




}