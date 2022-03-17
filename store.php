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
?>
<section>

    <div id="search">
        <form name="formSearch" action="controller/login.controller.php" method="post">
            <input type="search" name="productsearch" placeholder="Busca tu producto...">
        </form>
    </div>
    <div id="filters">
        <a id="juego" onclick="">Juego</a>
        <a id="estatuilla" onclick="">Estatuilla</a>
        <a id="poster" onclick="">Poster</a>
        <a id="peluche" onclick="">Peluche</a>
        <a id="ropa" onclick="">Ropa</a>
    </div>
    <div id="cards">
        <div class="card">
            <div class="image">
                <img src="waifu.png">
            </div>
            <div class="title">
                <p>Waifu</p>
            </div>
            <div class="description">
                <p>Erase una vez que se era, que Gabriel queria jugar al fire emblem</p>
            </div>
            <div class="prize">
                <p>13.09 €</p>
                <a><img class="shop" src="assets/img/carrito-de-compras.png" alt="comprar"></a>
            </div>
        </div>

       <div class="card">
            <div class="image">
                <img src="waifu.png">
            </div>
            <div class="title">
                <p>Waifu</p>
            </div>
            <div class="description">
                <p>Erase una vez que se era, que Gabriel queria jugar al fire emblem</p>
            </div>
            <div class="prize">
                <p>13.09 €</p>
                <a><img class="shop" src="assets/img/carrito-de-compras.png" alt="comprar"></a>
            </div>
        </div>

       <div class="card">
            <div class="image">
                <img src="waifu.png">
            </div>
            <div class="title">
                <p>Waifu</p>
            </div>
            <div class="description">
                <p>Erase una vez que se era, que Gabriel queria jugar al fire emblem</p>
            </div>
            <div class="prize">
                <p>13.09 €</p>
                <a><img class="shop" src="assets/img/carrito-de-compras.png" alt="comprar"></a>
            </div>
        </div>

       <div class="card">
            <div class="image">
                <img src="waifu.png">
            </div>
            <div class="title">
                <p>Waifu</p>
            </div>
            <div class="description">
                <p>Erase una vez que se era, que Gabriel queria jugar al fire emblem</p>
            </div>
            <div class="prize">
                <p>13.09 €</p>
                <a><img class="shop" src="assets/img/carrito-de-compras.png" alt="comprar"></a>
            </div>
        </div>









    </div>



</section>
<?php
include "includes/footer.php";
?>

<script src="assets/js/login.js"></script>
</body>
</html>
