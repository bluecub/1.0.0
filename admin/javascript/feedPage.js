///////////////////////////////////// Getting user_ID for global use ////////////////////////////////////

//defining user Id for global use
var user_ID = 0;

function getUserID(){

    var xhr = new XMLHttpRequest();
    xhr.onload = () => {
        user_ID = parseInt(xhr.response);
    }
    xhr.open('GET', 'API/userData.php?fn=user_ID', true);
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
    var xhr = new XMLHttpRequest();
    xhr.onload = () => {
        result = xhr.response;
        if(result != "0"){
            result = JSON.parse(result)[0];
            feedPageAllPosts = document.getElementById('feedPageAllPosts');
            var userName = "";
            var ID = result['user_ID'];
            console.log(result);

            //getting the userName of the post author
            var xhr2 = new XMLHttpRequest();
            xhr2.onload = () => {
                res = xhr2.response;
                res = JSON.parse(res);
                userName = res['userName'];

                feedPageAllPosts.innerHTML += '<div class=" postContainer">\
                \
                <div class="row usernameRow">\
                    <div class="col-6 col-6-sm DPBox flexAlign">\
                        <div class="DP overFlowHidden"><img class="postContentBox" src="./assets/profilePictures/testimonials-3.jpg" alt=""></div>\
                        <div class="userNamePost">'+userName+'</div>\
                    </div>\
                    <div class="col-5 col-5-sm"></div>\
                    <div class="col-1 col-1-sm bookmarkBtnBox flex">\
                        <button type="button" name="bookmarkBtn" class="postButtons borderNone backgroundNone"><span class="material-icons md-lights textShadowGray md-24">bookmark_border</span></button>\
                    </div>\
                </div>\
                <div class="row postRow">\
                    <div class="col-11 col-11-sm postBoxHeight post overFlowHidden borderBox"><img class="postContentBox" src="./assets/profilePictures/'+result['images']+'" alt=""></div>\
                    <div class="col-1 col-1-sm postBoxHeight postButtonsBox flex">\
                        <button type="button" name="bookmarkBtn" class="postButtons borderNone backgroundNone"><span class="material-icons likeBtn textShadowBlue">favorite_border</span></button>\
                        <button type="button" name="bookmarkBtn" class="postButtons borderNone backgroundNone"><span class="material-icons commentBtn textShadowYellow">chat_bubble_outline</span></button>\
                        <button type="button" name="bookmarkBtn" class="postButtons borderNone backgroundNone"><span class="material-icons shareBtn textShadowRed">send</span></button>\
                        <button type="button" name="bookmarkBtn" class="postButtons borderNone backgroundNone"><span class="material-icons tagBtn textShadowPurple">filter_list</span></button>\
                    </div>\
                </div>\
                <div class="row captionRow">\
                    <div class="col-10 col-10-sm caption">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi nulla deserunt numquam asperiores excepturi facilis, molestiae recusandae enim exercitationem perferendis debitis tempore excepturi facilis, molestiae recusandae enim exercitationem perferendis debitis tempore <a href="">read more...</a></div>\
                </div>\
            </div>'
            }
            xhr2.open('GET', 'API/userData.php?fn=userData&user_ID='+ID+'&dataNeeded=userName', true);
            xhr2.send();
        }
        else{
            feedPageAllPosts.innerHTML += "no more posts left";
        }

    }
    xhr.open('GET', 'API/post.php?user_ID='+user_ID+'&offset='+offset+'&limit='+limit, true);
    xhr.send();
    offset+=1;

}


/*
    this function checks if user has reached the end or not
*/

window.addEventListener('scroll', ()=> {
    
    if(window.scrollY + window.innerHeight + 30>= document.documentElement.scrollHeight){
        fetchAndFeed();
    }
})

//initially printing n posts
for(var i =0; i<5; i++){
    //fetchAndFeed();
}

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


/////////////////// this is the function to preview the uploaded images without submiting the form ///////////////

function previewImages(input, height, width) {
    if (input.files.length) {
        for(var i =0; i<input.files.length; i++){
            
            const img = document.createElement("img");
            img.src = URL.createObjectURL(input.files[i]);
            img.height = height;
            img.width = width; 
            img.onload = function() {
                URL.revokeObjectURL(input.src);
            }
            document.getElementById('test').appendChild(img);
        }
    }
}



////////////////////////////////// post create modal js ////////////////////////////
function openPostCreateModal(e){
    document.getElementById('postCreateWrapper').style.display = "flex";
}
// to close the modal

closeButton = document.getElementById('postCreateModalClose')
closeButton.addEventListener('click', closeModal);

function closeModal(e){
    e.preventDefault();
    closeButton.parentElement.parentElement.parentElement.parentElement.style.display = "none";
}

//initally closing it
closeButton.parentElement.parentElement.parentElement.parentElement.style.display = "none";