<html>
<head>
    <?php
    include "includes/head.php";
    ?>
    <link rel="stylesheet" href="styles/cart.css">
    <script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script>
</head>
<body>


<?php
include "includes/header.php";
include "includes/navbar.php";
?>
<section>

    <div id="tableContainer"><h1>Carrito de compra</h1></div>
    <div id="paypal-button-container"></div>
    <form style="display: none" name="frmPurchase" action="controller/purchase.controller.php" method="post" enctype="multipart/form-data">
        <input type="text" name="products">
        <input type="text" name="transactionId">
    </form>



</section>
<?php
include "includes/footer.php";
?>
<script src="assets/js/cart.js"></script>
</body>
</html>