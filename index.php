<html>
<head>
<?php
    include "includes/head.php";
?>
    <link rel="stylesheet" href="styles/index.css">

<script>

    let fotosDesktop = [];
    let fotosMobile = [];
    let fotoActual = 0;
    function miniaturas(){
        let mostrarMiniaturas = "";
        fotosDesktop[0] = new Image();
        fotosDesktop[0].src = "assets/img/overwatch2.jpg";
        fotosDesktop[1] = new Image();
        fotosDesktop[1].src = "assets/img/wow.jpg";
        fotosDesktop[2] = new Image();
        fotosDesktop[2].src = "assets/img/diabloiii.jpg";
        fotosDesktop[3] = new Image();
        fotosDesktop[3].src = "assets/img/diabloiv.jpg";
        fotosDesktop[4] = new Image();
        fotosDesktop[4].src = "assets/img/starcraft2.jpg";
        fotosDesktop[5] = new Image();
        fotosDesktop[5].src = "assets/img/heartstone.jpg";

        fotosMobile[0] = new Image();
        fotosMobile[0].src = "assets/img/wowmovil.jpg";
        fotosMobile[1] = new Image();
        fotosMobile[1].src = "assets/img/overwatchmovil.jpg";
        fotosMobile[2] = new Image();
        fotosMobile[2].src = "assets/img/diabloiiimovil.jpg";
        fotosMobile[3] = new Image();
        fotosMobile[3].src = "assets/img/diabloivmovil.jpg";
        fotosMobile[4] = new Image();
        fotosMobile[4].src = "assets/img/starcraftmovil.jpg";
        fotosMobile[5] = new Image();
        fotosMobile[5].src = "assets/img/hearthstonemovil.jpg";

        document.getElementById("mostrandoFoto").style.backgroundImage = "url('"+ fotosDesktop[0].src +"')";
        cambiaFoto();
    }
    function avanzar() {
        let fotos=[];
        if (screen.width >600){
            fotos = fotosDesktop;
        }else{
            fotos = fotosMobile;
        }
        fotoActual++;
        if (fotoActual == fotos.length) {
            fotoActual = 0;
        }

        auxWidth("1024px");
        let time = setTimeout("auxWidth('0')", 6000);


        document.getElementById("mostrandoFoto").style.backgroundImage = "url('" +fotos[fotoActual].src +"')";
    }

    function auxWidth(value){
        document.getElementById("mostrandoFoto").style.width = value;
    }

    function cambiaFoto(){
        avanzar();
        let tiempo = setTimeout("cambiaFoto()",12000);
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


    </div>

</section>
<?php
    include "includes/footer.php";
?>




</body>
</html>