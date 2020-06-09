function verif(){
    if(document.getElementById("email").value==""){
        document.getElementById('test').innerHTML =  alertMissingInformation();
        document.getElementById("email").style.borderColor = "red";
        return false;
    }else{
        document.getElementById("email").style.borderColor = "";
    }

    if(document.getElementById("password").value==""){
        document.getElementById('test').innerHTML =  alertMissingInformation();
        document.getElementById("password").style.borderColor = "red";
        return false;
    }else{
        document.getElementById("password").style.borderColor = "";
    }

    if(document.getElementById("passwordConfirm").value==""){
        document.getElementById('test').innerHTML =  alertMissingInformation();
        document.getElementById("passwordConfirm").style.borderColor = "red";
        return false;
    }else{
        document.getElementById("passwordConfirm").style.borderColor = "";
    }
    
    if(document.getElementById("prenom").value==""){
        document.getElementById('test').innerHTML =  alertMissingInformation();
        document.getElementById("prenom").style.borderColor = "red";
        return false;
    }else{
        document.getElementById("prenom").style.borderColor = "";
    }

    if(document.getElementById("nom").value==""){
        document.getElementById('test').innerHTML =  alertMissingInformation();
        document.getElementById("nom").style.borderColor = "red";
        return false;
    }else{
        document.getElementById("nom").style.borderColor = "";
    }

    if(document.getElementById("password").value != document.getElementById("passwordConfirm").value){
        document.getElementById('test').innerHTML =  alertWrongPassword();
        document.getElementById("passwordConfirm").style.borderColor = "red";
        return false;
    }else{
        document.getElementById("passwordConfirm").style.borderColor = "";
    }

    function alertMissingInformation(){
                    return '<div class="alert alert-danger" role="alert">'+
            '<strong>Veuillez rentrer toutes les informations demandées</strong>'+
           '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                '<span aria-hidden="true">&times;</span>'+
           '</button>'+
           '</div>';
    }

    function alertWrongPassword(){
        return '<div class="alert alert-danger" role="alert">'+
                '<strong>Le mot de passe </strong> ne correspond pas à la confirmation !'+
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                    '<span aria-hidden="true">&times;</span>'+
                '</button>'+
                '</div>';
}
}


function verifConnexion(){
    if(document.getElementById("email").value == "" ){
        document.getElementById('test').innerHTML =  alertMissingInformation();
        document.getElementById("email").style.borderColor = "red";
        return false;
    }else{
        document.getElementById("email").style.borderColor = "";
    }

    if(document.getElementById("mdp").value==""){
        document.getElementById('test').innerHTML =  alertMissingInformation();
        document.getElementById("mdp").style.borderColor = "red";
        return false;
    }else{
        document.getElementById("mdp").style.borderColor = "";
    }

    function alertMissingInformation(){
        return '<div class="alert alert-warning" role="alert">'+
                '<strong>Veuillez rentrer toutes les informations demandées</strong>'+
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                    '<span aria-hidden="true">&times;</span>'+
                '</button>'+
                '</div>';
    }
}