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
            var ID = result['user_ID'];
            console.log(result);

            //getting the userName of the post author
            var xhr2 = new XMLHttpRequest();
            xhr2.onload = () => {
                res = xhr2.response;
                res = JSON.parse(res);
                result['userName'] = res['userName'];
                //finally printing the post
                feedPageAllPosts.innerHTML += postStructure(result);
            }
            xhr2.open('GET', 'API/userData.php?fn=userData&user_ID='+ID+'&dataNeeded=userName', true);
            xhr2.send();
        }
        else{
            feedPageAllPosts.innerHTML += "no more posts left";
        }

    }
    xhr.open('GET', 'API/post.php?fn=get&user_ID='+user_ID+'&offset='+offset+'&limit='+limit, true);
    xhr.send();
    offset+=1;
    return 1;

}

//this function returns the skeleton of the post 
function postStructure(data){
    var postStruct = "";

    postStruct += '\
    <div class=" postContainer">\
        <div class="row usernameRow">\
            <div class="col-6 col-6-sm DPBox flexAlign">\
                <div class="DP overFlowHidden hoverPointer"><img class="postContentBox" src="./assets/profilePictures/testimonials-3.jpg" alt=""></div>\
                <div class="userNamePost hoverPointer">'+data['userName']+'</div>\
            </div>\
            <div class="col-5 col-5-sm"></div>\
            <div class="col-1 col-1-sm bookmarkBtnBox flex">\
                <button type="button" name="bookmarkBtn" class="hoverPointer postButtons borderNone backgroundNone"><span class="material-icons md-lights textShadowGray md-24">bookmark_border</span></button>\
            </div>\
        </div>\
        <div class="row postRow">';
            
        if(data['videos']){
            postStruct += '\
            <div class="col-11 col-11-sm postBoxHeight post overFlowHidden borderBox">\
                <video class="postContentBox" controls>\
                    <source src="./assets/postVid/'+data['videos']+'" type="video/mp4">\
                Your browser does not support the video tag.\
                </video> \
            </div>'
        }else if(data['images']){
            postStruct += '\
            <div class="col-11 col-11-sm postBoxHeight post overFlowHidden borderBox">\
                <img class="postContentBox" src="./assets/postImg/'+data['images']+'" alt="">\
            </div>';
        }

    postStruct +=  '\
            <div class="col-1 col-1-sm postBoxHeight postButtonsBox flex">\
                <button type="button" name="bookmarkBtn" class="hoverPointer postButtons borderNone backgroundNone"><span class="material-icons likeBtn textShadowBlue">favorite_border</span></button>\
                <button type="button" name="bookmarkBtn" class="hoverPointer postButtons borderNone backgroundNone"><span class="material-icons commentBtn textShadowYellow">chat_bubble_outline</span></button>\
                <button type="button" name="bookmarkBtn" class="hoverPointer postButtons borderNone backgroundNone"><span class="material-icons shareBtn textShadowRed">send</span></button>\
                <button type="button" name="bookmarkBtn" class="hoverPointer postButtons borderNone backgroundNone"><span class="material-icons tagBtn textShadowPurple">tag</span></button>\
            </div>\
        </div>\
        <div class="row captionRow">\
            <div class="col-10 col-10-sm caption"> '+data['text']+'</div>\
        </div>\
    </div>'

    return postStruct;

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


/////////////////// this is the function to preview the uploaded images without submiting the form ///////////////
// this array will be used to exclude the deletes images as they can't be deleted from the files object
var removedImages = {};
var uploadCount = 0;
function previewImages(input) {
    var imagePreview = document.getElementById("imgPreview");
    for(var i = 0; i<uploadCount; i++){
        deleteImage(i);
    }
    removedImages = {};
    uploadCount=0;
    if (input.files.length) {
        for(var i =0; i<input.files.length; i++){
            const img = document.createElement("img");
            img.src = URL.createObjectURL(input.files[i]);
            img.classList.add("fullSize");
            imagePreview.innerHTML+= '<div class="imgBox overflowHidden" id='+uploadCount+'><div class="imageDelete closeButton">\
            <button type="button" class="borderNone hoverPointer border10" onclick="deleteImage('+uploadCount+');"><span class="material-icons md-red">close</span></button>\
            </div></div>';
            img.onload = function() {
                URL.revokeObjectURL(input.src);
            }
            document.getElementById(uploadCount).appendChild(img);
            uploadCount++;
        }
    }

}

////////////////// function to delete image from create post modal /////////////////////

function deleteImage(id){

    removedImages[id] = 1;
    var element = document.getElementById(id);
    if(element){
        element.remove();
    }
    console.log(removedImages);

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
closeButton.click();

//submiting the form 
createPostEle = document.getElementById('createPostForm');
createPostEle.addEventListener('submit',createPost);


function createPost(e){
    e.preventDefault();

    //creating a form data element to send with ajax request
    var fd = new FormData();

    //lets start by taking the data from each field.
    var visibilityEle = document.getElementsByName("visibility");
    var visibility = 0;

    for(var i =0; i<visibilityEle.length; i++){
        if(visibilityEle[i].type == "radio"){
            if(visibilityEle[i].checked){
                visibility = visibilityEle[i].value;
            }
        }
    }
    fd.append("visibility", visibility);
    
    var caption = document.getElementById("CreatePostCaption").value;

    fd.append("caption", caption);
    
    var imgVid = document.getElementById("postImgVidInput");

    for(var i =0; i<imgVid.files.length; i++){
        if(!removedImages[i]){
            fd.append("imgVid[]", imgVid.files[i]);
        }
    }
    fileName = "";
    if(imgVid.value){
        fileName = "imgVid";
    }
    var xhr = new XMLHttpRequest();
    xhr.onload = ()=>{
           console.log(xhr.responseText)
    }
    xhr.open("POST", "API/post.php?fileName="+fileName+"&fn=set&user_ID="+user_ID, true);
    xhr.send(fd);
    closeButton.click();

}

//initially printing n posts
for(var i =0; i<2; i++){
    fetchAndFeed();
    console.log("hello")
}
