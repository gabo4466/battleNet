const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const error = urlParams.get("error");
if (error === "usernotfound"){
    alert("Email y/o contraseña invalidos");
}else if (error === "emptyinput"){
    alert("Debes llenar todos los campos");
}else if(error === "invalidname"){
    alert("El nombre ingresado no es válido");
}else if(error === "invalidnickname"){
    alert("El nickname ingresado no es válido");
}else if(error === "invalidemail"){
    alert("El email ingresado no es válido");
}else if(error === "pwdmatch"){
    alert("Las contraseñas no coinciden");
}

/**
 * Funcion que valida un nif
 * @param strnif
 * @return verdadero si es un NIF valido en caso contrario retorna falso.
 */
function validaNIF(strnif) {
    if (strnif.length > 9) return false;
    if (strnif.length > 1 && isNaN(strnif.substr((strnif.length - 1), strnif.length))) {
        if (isNaN(strnif.substr(0, 1))) strnif = strnif.substr(1, strnif.length);
        var letrasposibles = new Array("T", "R", "W", "A", "G", "M", "Y", "F", "P", "D", "X", "B", "N", "J", "Z", "S", "Q", "V", "H", "L", "C", "K", "E");
        var letra_nif = strnif.substr((strnif.length - 1), strnif.length);
        var num_nif = strnif.substr(0, (strnif.length - 1));
        while (num_nif.substring(0, 1) == "0") num_nif = num_nif.substring(1, num_nif.length);
        var resto_nif = parseInt(num_nif);
        resto_nif = resto_nif % 23;
        if (letrasposibles[resto_nif] == letra_nif.toUpperCase()) return true;
        else return false;
    } else return false;
}

/**
 * Funcion que valida un nie
 * @param strcif
 * @return verdadero si es un NIE valido en caso contrario retorna falso.
 */
function validaNIE(strcif) {
    if (!strcif) return false;
    var letras = 'TRWAGMYFPDXBNJZSQVHLCKE';
    if (strcif.length != 9) return false;
    else {
        letra = strcif.substr(8, 1);
        letra = letra.toUpperCase();
        dni = strcif.substr(0, 8);
        letraNie = strcif.substr(0, 1);
        dni = dni.toUpperCase();
        if (letraNie == "X") dni = dni.replace('X', '0');
        else dni = dni.replace('Y', '1');
        dni -= parseInt(dni / 23) * 23;
        if (letras.charAt(dni) != letra) return false;
        else return true;
    }
}

/**
 * Funcion que valida un email.
 * @param email que se requiere validar
 * @return Verdadero en caso de que el mail sea valido, falso en caso contrario.
 */
function validateEmail(email){
    let valid = false;
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)){
        valid = true;
    }else{
        valid = false;
    }
    return valid;
}

/**
 * Funcion que valida los campos del login y realiza el submit del formulario, en caso de error muestra alertas indicando este.
 * @author Gabriel y Fran
 * @version 3.2022
 */
function validateLogin(){
    const inputs = document.getElementsByTagName("input");
    let valid = true;
    let index = 0;
    while(valid === true && index < inputs.length){
        if (inputs[index].value === ""){
            valid = false;

        }
        index++;
    }
    if (valid){
        valid = validateEmail(document.getElementsByName("email")[0].value);
        if (valid){
            document.frmLogin.submit();
        }
    }else{
        alert("Debes llenar todos los campos.");
    }
}

/**
 * Funcion que valida los campos del Registro y realiza el submit del formulario, en caso de error muestra alertas indicando este.
 */
function validaSignUp(){
    let valid = false;
    const nif = document.getElementsByName("nif")[0].value.trim();
    const email = document.getElementsByName("email")[0].value.trim();
    if (validaNIF(nif)){
        valid = true;
    }else{
        if (validaNIE(nif)){
            valid = true;
        }else{
            alert("NIF invalido");
        }
    }
    if (validateEmail(email)){
        valid = true;
    }else{
        alert("El email ingresado es inválido.");
    }
    if (valid){
        document.frmSignUp.submit();
    }

}