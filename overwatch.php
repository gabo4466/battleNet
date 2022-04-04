<html>
<head>
    <?php
    include "includes/head.php";
    ?>
    <link rel="stylesheet" href="styles/overwatch.css">
</head>
<body>


<?php
include "includes/header.php";
include "includes/navbar.php";
?>
<section>

    <div id="overwatchImage">
        <img onclick="popUp(4,'Meignífico')" class="desvanecer" src="assets/img/iconMei.jpg" alt="icono_Mei" title="Icono de Mei">
        <img onclick="popUp(5,'Superioridad aérea establecida')" class="desvanecer" src="assets/img/iconPharah.png" alt="icono_Pharah" title="Icono de Pharah">
    </div>

    <div id="overwatchImage2">
        <img onclick="popUp(6,'Hey chicos, llega la caballería')" class="desvanecer" src="assets/img/iconTracer.png" alt="icono_Tracer" title="Icono de Tracer">
        <img onclick="popUp(7,'Bienvenidos al apocalipsis')" class="desvanecer" src="assets/img/iconRoadhog.png" alt="icono_Roadhog" title="Icono de Roadhog">
    </div>


</section>
<?php
include "includes/footer.php";
?>

<script src="assets/js/userValidator.js"></script>
</body>
</html>