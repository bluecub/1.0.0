///////////////////////////////////// Getting user_ID for global use ////////////////////////////////////

//defining user Id for global use
var user_ID = 0;

function getUserID(){

    var xhr = new XMLHttpRequest();
    xhr.onload = () => {
        user_ID = parseInt(xhr.response);
    }
    xhr.open('GET', 'API/getUser_ID.php', true);
    xhr.send();

}

//getting the user ID
getUserID();


///////////////////////////////////// Script load on window end Code below /////////////////////////////////

/*
    defining the global variables(to keep the track of offest used to fetch posts);
*/ 
offset = 0;
limit = 1;


/*
    this function fetches the feed through ajax using the post.php api
*/
function fetchAndFeed(){

    if(user_ID == 0){
        return;
    }
    var xhr = new XMLHttpRequest()
    xhr.onload = () => {
        result = xhr.response
        document.getElementById("main").innerHTML += '<div class="post">'+result+'</div>';
        offset++;
    }
    xhr.open('GET', 'API/post.php?user_ID='+user_ID+'&offset='+offset+'&limit='+limit, true);
    xhr.send();

}

// just a testing function remove it in the end 
function test(){
    for(var i =0; i<30; i++){
        document.getElementById('main').innerHTML += '<img src="https://picsum.photos/200/300">'
    }
}

test()

/*
    this function checks if user has reached the end or not
*/

window.addEventListener('scroll', ()=> {
    if(window.scrollY + window.innerHeight + 30>= document.documentElement.scrollHeight){
        fetchAndFeed();
    }
})

///////////////////////////////////// Last Scene Check and update code below //////////////////////////////////

function updateLastActive(){

    if(user_ID == 0){
        return;
    }
    var xhr = new XMLHttpRequest()
    xhr.onload = () => {
        result = xhr.response
    }
    xhr.open('GET', 'API/userLastActive.php?user_ID='+user_ID+'&fn=set', true);
    xhr.send();

}

setInterval(updateLastActive, 30000);

console.log(document.getElementsByClassName('post'))

