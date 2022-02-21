<nav>
    <a class="navOption" href="index.php">Home</a>
    <a class="navOption" href="login.php">Login</a>
    <?php
        if (isset($_SESSION["userId"])){

    ?>
    <?php
        }else{
    ?>
        <a class="navOption" href="signup.php">Registro</a>
    <?php
        }
    ?>
</nav>