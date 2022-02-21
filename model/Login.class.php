<?php
require_once ("DBConnection.class.php");
require_once ("User.class.php");
class Login extends DBConnection {

    /**
     * Metodo que realiza el login, en caso de que este sea correcto inicia la sesion
     * @param $email
     * @param $pwd
     */
    protected function getUser($email, $pwd){
        $stmt = $this->connect()->prepare('SELECT users_password FROM users WHERE users_email = ?;');

        if (!$stmt->execute(array($email))){
            $stmt = null;
            header("location: ../login.php?error=stmtfailed");
            exit();
        }
        if ($stmt->rowCount() == 0){
            header("location: ../login.php?error=usernotfound");
            exit();
        }

        $hashedPwd = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $checkPwd = password_verify($pwd, $hashedPwd[0]["users_password"]);
        if ($checkPwd == false){
            header("location: ../login.php?error=usernotfound");
            exit();
        }else if($checkPwd == true){
            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE users_email = ?;');
            if (!$stmt->execute(array($email))){
                $stmt = null;
                header("location: ../login.php?error=stmtfailed");
                exit();
            }
            if ($stmt->rowCount() == 0){
                header("location: ../login.php?error=usernotfound");
                exit();
            }
            session_start();
            $userAux = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $user = new User($userAux[0]["users_name"], $userAux[0]["users_nif"], $userAux[0]["users_address"], $userAux[0]["users_email"], $userAux[0]["users_nickname"], $userAux[0]["id_users"]);
            $_SESSION["userId"] = $user->getId();
            $_SESSION["userName"] = $user->getName();
            $_SESSION["userEmail"] = $user->getEmail();
            $_SESSION["userNickname"] = $user->getNickname();

        }

        $stmt = null;
    }
}