
/**
 *  @author Gabriel y Fran
 *  @version 03.2022
 *  Funcion que muestra una ventana emergente con información al usuario.
 *  @param type Se refiere al tipo de información que mostrará el popUp, puede ser
 *  <ul><li>1 - Informacion</li><li>2 - Confirmacion</li><li>3 - Cross</li>
 * @param msg mensaje que se desea mostrar por pantalla en el popUp
 */
function popUp(type, msg){

    let img = "";
    if (type === 1){
        img = "info";
    }else if(type === 2){
        img = "check";
    }else if(type === 3){
        img = "cross";
    }else if(type === 4){
        img = "faceMei";
    }else if (type === 5){
        img = "facePharah";
    }else if (type === 6){
        img = "faceTracer";
    }else if (type === 7){
        img = "faceRoadHog";
    }
    let popUpHtml = "<div class='box'>";
    popUpHtml += "<div class='imgPopUp'><img src='assets/img/"+img+".png' alt='"+img+"'></div>";
    popUpHtml += "<div class='textPopUp'>"+msg+"</div>";
    popUpHtml += "<div class='buttonPopUp'><button type='button'>Cerrar</button></div>";
    popUpHtml += "</div>";
    document.getElementById("popUp").innerHTML = popUpHtml;
    document.getElementById("dimmer").style.display = "block";
    let box = document.getElementById('popUp');
    box.classList.remove('visualHidden');
    let btn = box.querySelector('button');
    btn.addEventListener('click', function () {
        box.addEventListener('transitionend', function(e) {
            document.getElementById("dimmer").style.display = "none";
            document.getElementById("popUp").innerHTML = "";
        }, {
            capture: false,
            once: true,
            passive: false
        });
        box.classList.add('visualHidden');
    }, false);


}