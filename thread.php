<html>
<head>
    <?php
    include "includes/head.php";
    ?>
    <link rel="stylesheet" href="styles/thread.css">
</head>
<body>


<?php
include "includes/header.php";
include "includes/navbar.php";
?>
<section>

    <div id="button">
        <button onclick="" name="create">Crear hilo</button>
    </div>

    <div id="threads">

        <?php
        require_once ("model/Threads.class.php");
        $url = "http://".$_SERVER['HTTP_HOST'].":".$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
        $id = $_GET['channel'];
        $threads = new Threads($id);
        echo $threads->createThreads();
        ?>
    </div>

</section>
<?php
include "includes/footer.php";
?>




</body>
</html>