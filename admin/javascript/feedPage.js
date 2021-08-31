/*
    defining the global variables(to keep the track of offest used to fetch posts);
*/ 
offset = 0;
limit = 1;


/*
    this function fetches the feed through ajax using the post.php api
*/
function fetchAndFeed(){

    var xhr = new XMLHttpRequest()
    xhr.onload = () => {
        result = xhr.response
        document.getElementById("main").innerHTML += '<div class="post">'+result+'</div>';
        offset++;
    }
    xhr.open('GET', 'API/post.php?user_ID=9&offset='+offset+'&limit='+limit, true);
    xhr.send();

}

/*
    this function check if user has reached the end or not
*/
function test(){
    for(var i =0; i<30; i++){
        document.getElementById('main').innerHTML += '<img src="https://picsum.photos/200/300">'
    }
}

test()


window.addEventListener('scroll', ()=> {
    if(window.scrollY + window.innerHeight + 40>= document.documentElement.scrollHeight){
        fetchAndFeed();
    }
})