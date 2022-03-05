const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const error = urlParams.get("error");
if (error === "usernotfound"){
    alert("Email y/o contraseña invalidos.");
}else if (error === "emptyinput"){
    alert("Debes llenar todos los campos.");
}