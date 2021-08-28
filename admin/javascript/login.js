passwordField = document.getElementById('passwordLogIn');

var hidden = true;

function showPassword(e){

    if(hidden){
        passwordField.type = 'text';
        hidden = false;
        e.innerHTML = 'visibility_off';
    }
    else{
        passwordField.type = 'password';
        hidden = true;
        e.innerHTML = 'visibility';
    }
    
    
}