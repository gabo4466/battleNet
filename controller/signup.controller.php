<?php

if (isset($_POST["submit"])){

    require_once "../model/DBConnection.php";
    require_once "../model/User.php";
    require_once "../model/Validator.php";

    $db = new DBConnection();
    $validator = new Validator();

    if($validator->emptyRegisterFields($_POST) !== false){
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
    $user = new User($_POST["name"], $_POST["nif"], $_POST["address"], $_POST["email"], $_POST["nickname"], $_POST["pwd"]);

    if ($validator->invalidEmail($user->getEmail()) !== false){
        header("location: ../signup.php?error=invalidemail");
        exit();
    }

    if ($validator->pwdMatch($user->getPwd(), $_POST["pwdrepeat"]) !== false){
        header("location: ../signup.php?error=pwdmatch");
        exit();
    }

    if ($db->accountExists($user->getEmail()) !== false){
        header("location: ../signup.php?error=accountexists");
        exit();
    }







}else{
    header("location: ../signup.php");
    exit();
}

