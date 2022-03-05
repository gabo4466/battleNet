<?php
// Comprobar que el usuario venga por la ruta correcta (submit del formulario de registro)
if (isset($_POST["submit"])){

    // Recoger Data
    foreach ($_POST as $key => $value){
        $$key = addslashes($value);
    }


    // Instancia de objetos para validar la entrada
    require_once "../model/SignUpValidator.class.php";
    require_once "../model/User.class.php";

    $user = new User($name, $nif, $address, $email, $nickname);
    $validator = new SignUpValidator($user, $pwd, $pwdRepeat);

    // Controlar errores
    $validator->signUpUser();
    header("location: ../signup.php?error=none");

}else{
    header("location: ../signup.php");
    exit();
}

