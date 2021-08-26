daysField = document.getElementById("datesu");
monthDaysArray = {
    1:31,
    2:28,
    3:31,
    4:30,
    5:31,
    6:30,
    7:31,
    8:31,
    9:30,
    10:31,
    11:30,
    12:31,
}

function update(element){

    selected = daysField.value;
    month = element.value;
    days = monthDaysArray[month];
    
    daysField.innerHTML = "<option value='-1'>DD</option>";

    for(var i =1; i<=days; i++){
        if(i == selected){
            daysField.innerHTML += "<option value="+i+" selected>"+i+"</option>";
            continue;
        }
        daysField.innerHTML += "<option value="+i+">"+i+"</option>";
    }

}

//making event on key up on userName field
userNameErrorField = document.getElementById('userNameSignUpError');

function isUserNameAvailable(e){

    if(e.value.length != 0){

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                res = this.responseText;
                if(res == 1){
                    e.classList.remove('errorShadow');
                    e.classList.remove('shadowhover');
                    e.classList.add('successShadow');
                    userNameErrorField.innerHTML = "Username not available";
                }
                else{
                    e.classList.remove('successShadow');
                    e.classList.remove('shadowhover');
                    e.classList.add('errorShadow');
                    userNameErrorField.innerHTML = "";
                }
            }
        };

    }
    xmlhttp.open("GET", "API/userName.php?userName=" + e.value, true);
    xmlhttp.send();


}
