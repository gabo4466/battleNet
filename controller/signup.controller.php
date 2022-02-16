<?php

if (isset($_POST["submit"])){

    require_once "../model/DBConnection.php";
    require_once "../model/SignUp.php";
    require_once "../model/SignUpValidator.php";

    // Recoger Data
    $name = $_POST["name"];
    $nif = $_POST["nif"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $nickname = $_POST["nickname"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];

    // Instancia de objetos para validar la entrada
    //$db = new DBConnection();
    $validator = new SignUpValidator($name, $nif, $address, $email, $nickname, $pwd, $pwdRepeat);

    // Controlar errores
    $validator->signUpUser();

}else{
    header("location: ../signup.php");
    exit();
}

