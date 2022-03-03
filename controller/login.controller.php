<?php

// Comprobar que el usuario venga por la ruta correcta (submit del formulario de login)
if (isset($_POST["submit"])){

    // Recoger Data
    foreach ($_POST as $key => $value){
        $$key = addslashes($value);
    }

    // Instancia de objetos para validar la entrada
    require_once "../model/LoginValidator.class.php";
    $validator = new LoginValidator($email, $pwd);

    // Controlar errores
    $validator->loginUser();
    header("location: ../index.php?error=none");

}else{
    header("location: ../signup.php");
    exit();
}

