
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
    </div>
    <div id="navMobile">
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
    </div>

</nav>