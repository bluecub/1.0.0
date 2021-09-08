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
        console.log(result)
        document.getElementById('feedPageAllPosts').innerHTML += '<div class=" postContainer">\
            <div class="row usernameRow">\
                <div class="col-6 col-6-sm DPBox flexAlign">\
                    <div class="DP"></div>\
                    <div class="userNamePost">UserName</div>\
                </div>\
                <div class="col-5 col-5-sm"></div>\
                <div class="col-1 col-1-sm bookmarkBtnBox flex">\
                    <button type="button" name="bookmarkBtn" class="postButtons borderNone backgroundNone"><span class="material-icons md-lights textShadowGray md-24">bookmark_border</span></button>\
                </div>\
            </div>\
            <div class="row postRow">\
                <div class="col-11 col-11-sm postBoxHeight post"></div>\
                <div class="col-1 col-1-sm postBoxHeight postButtonsBox flex">\
                    <button type="button" name="bookmarkBtn" class="postButtons borderNone backgroundNone"><span class="material-icons likeBtn textShadowBlue">favorite_border</span></button>\
                    <button type="button" name="bookmarkBtn" class="postButtons borderNone backgroundNone"><span class="material-icons commentBtn textShadowYellow">chat_bubble_outline</span></button>\
                    <button type="button" name="bookmarkBtn" class="postButtons borderNone backgroundNone"><span class="material-icons shareBtn textShadowRed">send</span></button>\
                    <button type="button" name="bookmarkBtn" class="postButtons borderNone backgroundNone"><span class="material-icons tagBtn textShadowPurple">filter_list</span></button>\
                </div>\
            </div>\
            <div class="row captionRow">\
                <div class="col-10 col-10-sm caption">'+result+'</div>\
            </div>\
        </div>';
        offset+=1;
    }
    xhr.open('GET', 'API/post.php?user_ID='+user_ID+'&offset='+offset+'&limit='+limit, true);
    xhr.send();

}


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


