<?php
session_start([
    'read_and_close'  => true
]);
print_r(isset($_SESSION['userId']));
echo "ID:".$_SESSION['userId'];
// Comprobar que el usuario venga por la ruta correcta (submit del formulario de login)
if (isset($_POST) && isset($_SESSION['userId'])){

    // Recoger Data
    echo $code = $_POST['code'];

    // Instancia de objetos para validar la entrada
    require_once "../model/RedeemCodeValidator.php";
    $validator = new RedeemCodeValidator($code, intval($_SESSION['userId']));
    $validator->redeem();
    header("location: ../store.php?error=none&redeem=true");
}else{
    echo "No se envio el post o no hay sesion";
    //header("location: ../store.php");
    exit();
}

