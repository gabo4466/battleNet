<?php

// Comprobar que el usuario venga por la ruta correcta (submit del formulario de login)
if (isset($_POST)){

    // Recoger Data
    $code = $_POST['code'];

    // Instancia de objetos para validar la entrada
    require_once "../model/BuyProductsValidator.php";
    /*

    // Controlar errores
    $validator->loginUser();
    header("location: ../store.php?error=none");
    */
}else{
    header("location: ../store.php");
    exit();
}

