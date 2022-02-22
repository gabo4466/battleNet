<?php
session_start();
?>
<nav>
    <a class="navOption" href="index.php">Inicio</a>


    <?php

        if (isset($_SESSION["userId"])){
    ?>

    <a class='navOption' href='controller/logout.controller.php'>Cerrar sesión</a>
    <?php
        }else{
    ?>
    <a class="navOption" href="login.php">Iniciar Sesión</a>
    <a class='navOption' href='signup.php'>Registro</a>
    <?php
        }
    ?>

</nav>