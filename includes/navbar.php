<nav>
    <a class="navOption" href="index.php">Home</a>
    <a class="navOption" href="login.php">Login</a>

    <?php

        if (isset($_SESSION["userId"])){
    ?>

    <a class='navOption' href='controller/logout.controller.php'>Cerrar sesión</a>"
    <?php
        }else{
    ?>
    <a class='navOption' href='signup.php'>Registro</a>
    <?php
        }
    ?>

    <?php
    /*
        if (isset($_SESSION["userId"])){
            echo "<a class='navOption' href='controller/logout.controller.php'>Cerrar sesión</a>";
        }else{
            echo "<a class='navOption' href='signup.php'>Registro</a>";
        }
    */
    ?>

</nav>