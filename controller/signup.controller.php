<?php

if (isset($_POST["submit"])){

    include "../model/DBConnection.php";
    include "../model/SignUp.php";
    include "../model/SignUpValidator.php";

    $db = new DBConnection();
    $validator = new SignUpValidator();

    if($validator->emptyInput() !== false){
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
    if($validator->invalidName() !== false){
        header("location: ../signup.php?error=invalidname");
        exit();
    }
    if($validator->invalidNickname() !== false){
        header("location: ../signup.php?error=invalidnickname");
        exit();
    }
    if($validator->invalidEmail() !== false){
        header("location: ../signup.php?error=invalidemail");
        exit();
    }
    if($validator->pwdMatch() !== false){
        header("location: ../signup.php?error=pwdmatch");
        exit();
    }



}else{
    header("location: ../signup.php");
    exit();
}

