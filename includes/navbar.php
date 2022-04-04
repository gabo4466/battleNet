
<script>
    function openNav() {
        document.getElementById("navBar").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("navBar").style.width = "0";
    }
</script>

<nav>
    <div id="navBar">
        <a id="closeNavBar" href="javascript:void(0)" onclick="closeNav()">&times;</a>
        <a class="navOption imgOption" href="index.php"><img src="assets/img/battlenet_logo.png" alt="BattleNet Logo"></a>
        <a class="navOption textOption" href="index.php">Inicio</a>
        <a class='navOption' href='store.php'>Tienda</a>
        <a class="navOption" href="overwatch.php">Overwatch</a>
        <?php

            if (isset($_SESSION["userId"])){
        ?>
            <!-- PARTE PRIVADA DE LA WEB -->
            <a class='navOption' href='forum.php'>Foro</a>
            <a class='navOption' href='purchases.php'>Mis compras</a>
            <a class='navOption' href='controller/logout.controller.php'>Cerrar sesión</a>
        <?php
            }else{
        ?>
            <!-- PARTE PUBLICA DE LA WEB -->
            <a class="navOption" href="login.php">Iniciar Sesión</a>
            <a class='navOption' href='signup.php'>Registro</a>

        <?php
            }
        ?>
    </div>
    <div id="navMobile">
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
    </div>

</nav>