<nav>
    <a class="navOption" href="index.php">Home</a>
    <a class="navOption" href="login.php">Login</a>
    <a class="navOption" href="signup.php">Registro</a>
    <?php
        if (isset($_SESSION["userId"])){
            echo "<a class='navOption' href='signup.php'>Testing</a>";
        }
    ?>




</nav>