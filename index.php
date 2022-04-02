<html>
<head>
<?php
    include "includes/head.php";
?>
    <link rel="stylesheet" href="styles/index.css">

<script>

        let fotos = [];
        let fotoActual = 0;

        function miniaturas(){

        let mostrarMiniaturas = "";

        fotos[0] = new Image();
        fotos[0].src = "assets/img/overwatch2.jpg";
        fotos[1] = new Image();
        fotos[1].src = "assets/img/wow.jpg";
        fotos[2] = new Image();
        fotos[2].src = "assets/img/diabloiii.jpg";
        fotos[3] = new Image();
        fotos[3].src = "assets/img/diabloiv.jpg";
        fotos[4] = new Image();
        fotos[4].src = "assets/img/starcraft2.jpg";
        fotos[5] = new Image();
        fotos[5].src = "assets/img/heartstone.jpg";

        for (let i=0; i<fotos.length; i++){

        mostrarMiniaturas += "<img id='"+i+"' src='"+fotos[i].src+"' onclick='mostrar(this)' />";

    }

        document.getElementById("mostrandoFoto").innerHTML = "<img id='fotoGrande' src='"+fotos[0].src+"'/>";
        cambiaFoto();
    }

        function avanzar(){

        fotoActual++;
        if (fotoActual == fotos.length){

        fotoActual = 0;

    }

        document.getElementById("fotoGrande").src = fotos[fotoActual].src;
    }

        function cambiaFoto(){

        avanzar();
        tiempo = setTimeout("cambiaFoto()",3000);
    }

</script>

</head>
<body>



<?php
    include "includes/header.php";
    include "includes/navbar.php";
?>
<section>

    <div id="contenedor">

        <div id="mostrandoFoto">

            <script>miniaturas();</script>

        </div>

        <div id="mostrandoFotoMovil">

            <script>miniaturasMovil();</script>

        </div>


    </div>

</section>
<?php
    include "includes/footer.php";
?>




</body>
</html>