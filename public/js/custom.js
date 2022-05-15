$(document).ready(function(){
    $("#fadeJs").hide(0).fadeIn(1500);

   
});

$('#form_contact[nombre]').blur(function() {
    if ($(this).val().length == 0) {
        document.getElementById("errorInputDni").innerHTML = "* Debes introducir un número de DNI";
        document.getElementById("errorInputDni").style.color = "red";
    } else {
        document.getElementById("inputDNI").innerHTML = "";
        let dni = document.getElementById('inputDNI').value;
        var re = /^[0-9]{8}[A-Za-z]{1}$/;
        if (re.test(dni) == true) {
            document.getElementById("errorInputDni").innerHTML = "";
        } else {
            document.getElementById("errorInputDni").innerHTML = "* El DNI está mal escrito";
            document.getElementById("errorInputDni").style.color = "red";
        }
    }
});




