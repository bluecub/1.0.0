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
