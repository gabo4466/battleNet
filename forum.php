<html>
<head>
    <?php
    include "includes/head.php";
    ?>
    <link rel="stylesheet" href="styles/forum.css">
</head>
<body>


<?php
include "includes/header.php";
include "includes/navbar.php";
?>
<section>

    <div id="rules">
        <p>NORMAS</p>
    </div>
    <div id="forum">
        <?php
        require_once ("model/Forums.class.php");
        $forums = new Forums();
        echo $forums->createForums();
        ?>
    </div>

</section>
<?php
include "includes/footer.php";
?>




</body>
</html>