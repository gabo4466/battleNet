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

    <div id="search">
        <form name="formSearch" action="controller/login.controller.php" method="post">
            <input id="searchBar" type="search" name="productsearch" placeholder="Busca tu producto...">
        </form>
    </div>
    <div id="filters">
        <a id="juego" class="notSelected" onclick="filterByType('Juego')">Juego</a>
        <a id="estatuilla" class="notSelected" onclick="filterByType('Estatuilla')">Estatuilla</a>
        <a id="poster" class="notSelected" onclick="filterByType('Poster')">Poster</a>
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
    <script src="assets/js/cart.js"></script>
</section>
<?php
include "includes/footer.php";
?>

</body>
</html>
