const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const error = urlParams.get("error");
if (error === "usernotfound"){
    alert("Email y/o contraseña invalidos.");
}else if (error === "emptyinput"){
    alert("Debes llenar todos los campos.");
}
console.log("Sin error")
function validateEmail(email){
    console.log("Validando email")
    let valid = false;
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)){
        valid = true;
    }else{
        valid = false;
    }
    return valid;
}


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
        alert("Debes llenar todos los campos.")
    }
}