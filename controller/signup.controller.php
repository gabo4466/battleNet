<?php

if (isset($_POST["submit"])){

    include "../model/DBConnection.php";
    include "../model/SignUp.php";
    include "../model/SignUpValidator.php";

    $db = new DBConnection();
    $validator = new SignUpValidator();

    if($validator->emptyInput($_POST) !== false){
        header("location: ../signup.php?error=emptyinput");
        exit();
    }








}else{
    header("location: ../signup.php");
    exit();
}

