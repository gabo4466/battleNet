<html>
<head>
    <?php
    include "includes/head.php";
    ?>
    <link rel="stylesheet" href="styles/channel.css">
</head>
<body>


<?php
include "includes/header.php";
include "includes/navbar.php";
?>
<section>

    <div id="channels">
        <!--
        <a id="general" href="channel.php?forum=1&channel=1">General</a>
        <a id="tutoriales" href="channel.php?forum=1&channel=2">Tutoriales</a>
        <a id="historia" href="channel.php?forum=1&channel=3">Historia</a>
        <a id="parches" href="channel.php?forum=1&channel=4">Parches</a>
        <a id="lfg" href="channel.php?forum=1&channel=5">Looking for Group</a>
        <a id="raids" href="channel.php?forum=1&channel=6">Raids</a>-->

        <?php
        require_once ("model/Channels.class.php");
        $channels = new Channels();
        echo $channels->createChannels();
        ?>
    </div>

</section>
<?php
include "includes/footer.php";
?>




</body>
</html>