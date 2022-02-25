<html>
<head>
    <?php
    include "includes/head.php";
    ?>
    <link rel="stylesheet" href="styles/login.css">
</head>
<body>


<?php
include "includes/header.php";
include "includes/navbar.php";
?>
<section>

    <div id="login">
        <form action="controller/login.controller.php" method="post">
            <h2>Inicia sesión</h2>
            <div id="formLogin">
                <input type="text" required name="email" placeholder="Correo...">
                <input type="password" required name="pwd" placeholder="Contrase&#241;a...">
                <button type="submit" name="submit">Iniciar sesión</button>
            </div>
        </form>
    </div>
</section>
<?php
include "includes/footer.php";
?>

</body>
</html>