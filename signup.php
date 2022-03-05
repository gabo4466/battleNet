<html>
<head>
<?php
include "includes/head.php";
?>
    <link rel="stylesheet" href="styles/signup.css">
</head>
<body>



    <?php
        include "includes/header.php";
        include "includes/navbar.php";
    ?>
    <section>
        <div id="signUp">
            <form action="controller/signup.controller.php" method="post">
                <h2>Regístrate</h2>
                <div id="formSignUp">
                    <input type="text" required name="name" placeholder="Nombre...">
                    <input type="text" required name="email" placeholder="Correo...">
                    <input type="text" required name="nif" placeholder="Dni...">
                    <input type="text" required name="address" placeholder="Domicilio...">
                    <input type="text" required name="nickname" placeholder="Nickname...">
                    <input type="password" required name="pwd" placeholder="Contrase&#241;a...">
                    <input type="password" required name="pwdRepeat" placeholder="Repite la contrase&#241;a...">
                    <button type="submit" name="submit" value="1">Registrar</button>
                </div>
            </form>
        </div>
    </section>
    <?php
    include "includes/footer.php";
    ?>

</body>
</html>