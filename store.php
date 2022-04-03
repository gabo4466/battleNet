<html>
<head>
    <?php
    include "includes/head.php";
    ?>
    <link rel="stylesheet" href="styles/store.css">
</head>
<body>


<?php
include "includes/header.php";
include "includes/navbar.php";
require_once ("model/Store.class.php");
?>
<section>
    <?php
        if (isset($_SESSION["userId"])){
    ?>
    <div id="cart">
        <a href="cart.php"><img src="assets/img/carrito-de-compras.png" alt="cart"></a>
    </div>
    <div id="redeem">
        <a onclick="redeemCodePopUp()">Canjear Código</a>
    </div>
    <?php
        }else{
    ?>
        <script>popUp(1, "Para realizar compras debes iniciar sesión.");</script>
    <?php
        }
    ?>
    <div id="search">
        <form name="formSearch" action="controller/login.controller.php" method="post">
            <input id="searchBar" type="search" name="productsearch" placeholder="Busca tu producto...">
        </form>
    </div>
    <div id="filters">
        <a id="juego" class="notSelected" onclick="filterByType('Juego')">Juego</a>
        <a id="estatuilla" class="notSelected" onclick="filterByType('Estatuilla')">Estatuilla</a>
        <a id="poster" class="notSelected" onclick="filterByType('Póster')">Póster</a>
        <a id="peluche" class="notSelected" onclick="filterByType('Peluche')">Peluche</a>
        <a id="ropa" class="notSelected" onclick="filterByType('Ropa')">Ropa</a>
    </div>
    <div id="cards">

        <?php
            $store = new Store();
            echo $store->createCards();
        ?>
        <div id="notFound">
            No se han encontrado resultados.
        </div>


    </div>
    <script src="assets/js/store.js"></script>
</section>
<?php
include "includes/footer.php";
?>

</body>
</html>
