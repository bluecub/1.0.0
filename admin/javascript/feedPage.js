///////////////////////////////////// Getting user_ID for global use ////////////////////////////////////

//defining user Id for global use
var user_ID = 0;
var userName = "";

//functio to get userID and userName
function getCurrUser(){

    var xhr = new XMLHttpRequest();
    xhr.onload = () => {
        user_ID = parseInt(xhr.response);
        var xr = new XMLHttpRequest();
        xr.onload = () => {
            userName = JSON.parse(xr.response)['userName'];
        }
        xr.open('GET', 'API/userData.php?fn=userData&dataNeeded=userName&user_ID='+user_ID, true);
        xr.send();
    }
    xhr.open('GET', 'API/userData.php?fn=user_ID', true);
    xhr.send();

}

//getting the user ID
getCurrUser();


///////////////////////////////////// Script load on window end Code below /////////////////////////////////

/*
    defining the global variables(to keep the track of offest used to fetch posts);
*/ 
offset = 0;
limit = 1;

var postOffsetCount = [];

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
    <div class="postContainer" id = '+data['post_ID']+'>\
        <div class="row usernameRow">\
            <div class="col-6 col-6-sm DPBox flexAlign">\
                <div class="DP overFlowHidden hoverPointer shadowhover"><img class="postContentBox" src="./assets/profilePictures/testimonials-3.jpg" alt=""></div>\
                <div class="userNamePost hoverPointer">'+data['userName']+'</div>\
            </div>\
            <div class="col-5 col-5-sm"></div>\
            <div class="col-1 col-1-sm bookmarkBtnBox flex">\
                <button type="button" name="bookmarkBtn" class="hoverPointer postButtons borderNone backgroundNone"><span class="material-icons md-lights textShadowGray md-24">bookmark_border</span></button>\
            </div>\
        </div>';

        if(data['images'] || data['videos']){

        postStruct += '\
        <div class="row postRow">';
            postStruct += '<div class="col-12 col-12-sm post borderBox backgroundDark">';

            if(data['videos']){

                var vidPath = data['videos'].split(",");
    
                for(var i =0; i<vidPath.length; i++){
                    postStruct += '\
                    <video class="postContentBox widthMinWidth100 borderThin" controls>\
                        <source src="./assets/postVid/'+vidPath[i]+'" type="video/mp4">\
                        Your browser does not support the video tag.\
                    </video>'   
                }
    
    
            }if(data['images']){
    
                var imgPath = data['images'].split(",");
    
                for(var i =0; i<imgPath.length; i++){
                    postStruct += '<img class="postContentBox widthMinWidth100 borderThin" src="./assets/postImg/'+imgPath[i]+'" alt="">';
                }
    
            }
            postStruct += '</div>\
        </div>'

        }

        postStruct +=  '\
        <div class="row captionRow">\
            <div class="col-12 col-12-sm caption borderBox">'+data['text']+'<a href="">read more...</a></div>\
        </div>\
        <div class="row postRow">\
            <div class="col-12 col-12-sm postBoxHeightCaption postButtonsBox flex ">\
                <div class="pqr flexAlign ">\
                    <button type="button" name="bookmarkBtn" class="hoverPointer postButtonsCaption borderNone backgroundNone"><span class="material-icons likeBtn textShadowBlue">favorite_border</span></button>\
                    <button onclick="toggleDisplayFromID(\'comment_'+data['post_ID']+'\', this)" type="button" name="bookmarkBtn" class="hoverPointer postButtonsCaption borderNone backgroundNone"><span class="material-icons commentBtn textShadowYellow">chat_bubble_outline</span></button>\
                    <button type="button" name="bookmarkBtn" class="hoverPointer postButtonsCaption borderNone backgroundNone"><span class="material-icons shareBtn textShadowRed">send</span></button>\
                    <button type="button" name="bookmarkBtn" class="hoverPointer postButtonsCaption borderNone backgroundNone"><span class="material-icons tagBtn textShadowPurple">tag</span></button>\
                </div>\
            </div>\
        </div>'

        postStruct += '\
        <div class="row  commentRow none" id = "comment_'+data['post_ID']+'">\
            <div class="commentContainer">\
                \
                <div class="row inputCommentBox borderThinDark backgroundw border10 flexAlign shadowhover" >\
                    <div class="col-11 col-11-sm "><textarea class="inputComment" id="createComment_'+data['post_ID']+'" rows="2" cols="33" maxlength="250" placeholder="Add Comment ..."></textarea></div>\
                    <div class="col-1 col-1-sm"><button type="button" class="backgroundNav shadowhover hoverPointer flex" id="submitSmall" onclick="createCom('+user_ID+', '+data['post_ID']+');"><span class="material-icons" id="subbtnSmall">expand_less</span></button></div>\
                </div>\
                <div class="row" id = loadComment_'+data['post_ID']+'>\
                    <div class="col-12 col-12-sm flex">\
                        <button type="button" onclick="fetchCom('+data['post_ID']+');" class="backgroundNav shadowhover hoverPointer flex" id="loadMoresmall"  name="submit"><span class="material-icons" id="loadMorebtnsmall">keyboard_double_arrow_down</span></button>\
                    </div>\
                </div>\
            </div>\
        </div>'
        
    postStruct += '</div>';

    return postStruct;

}

//function to fetch comments
function fetchCom(post_ID){ 

    //processing parameters to fetch comments
    if(postOffsetCount[post_ID] == 0 || postOffsetCount[post_ID]){
        postOffsetCount[post_ID] += 4;
    }
    else{
        postOffsetCount[post_ID] = 0;
    }
    var limit = 4;
    var offset = postOffsetCount[post_ID];
    
    //fetching comments by ajax
    var xhr =new XMLHttpRequest();
    xhr.onload = () => {
        result = JSON.parse(xhr.response);
        console.log(result)
        if(result.length){
            for(var i =0; i<result.length; i++){
                var insertBeforeEle = document.getElementById('loadComment_'+post_ID);
                var commentBox = commentStructure(i, post_ID, result[i]);                
                insertBeforeEle.insertAdjacentElement('beforebegin', commentBox);
            }
        }
        else{
            postOffsetCount[post_ID] -= 4;
        }
        console.log(postOffsetCount[post_ID])
    }
    console.log(offset)
    xhr.open("get", 'API/likeAndComment.php?fn=get&get=comment&post_ID='+post_ID+'&limit='+limit+'&offset='+offset);
    xhr.send();

}

//function to create comment
function createCom(user_ID, post_ID){

    var commentField = document.getElementById('createComment_'+post_ID)
    var commentText = commentField.value;

    var fd = new FormData();
    fd.append('user_ID', user_ID);
    fd.append('post_ID', post_ID);
    fd.append('commentText', commentText);
    fd.append('activityType', 1);

    var xhr = new XMLHttpRequest();
    xhr.onload = () => {
        result = xhr.responseText;
        if(result == "1"){
            var res = []
            res['commentText'] = commentText;
            res['userName'] = userName;
            postOffsetCount[[post_ID]]++
            var index = postOffsetCount[[post_ID]];
            var commentBox = commentStructure(index, post_ID, res);
            console.log(commentBox)
            var insertBeforeEle = "";
            if(postOffsetCount[post_ID]){
                insertBeforeEle = document.getElementById('comment_'+0+"_"+post_ID);
                insertBeforeEle.insertAdjacentElement('beforebegin', commentBox);
            }
            else{
                insertBeforeEle = document.getElementById('loadComment_'+post_ID);
            }
            
            document.getElementById('createComment_'+post_ID).value = null;
        }
        else{
            window.alert("some thing went wrong!!!");
        }
    }

    xhr.open("POST", 'API/likeAndComment.php?fn=set')
    xhr.send(fd)    
}

// functions to hide and show an element

function toggleDisplayFromID(id, e){
    var element = document.getElementById(id);
    var tempPostId = id.split("_")[1];
    if(element.classList.contains("none")){
        fetchCom(tempPostId);
        element.classList.remove('none');
        e.firstChild.innerHTML = "chat_bubble";
    }
    else{   

        console.log(postOffsetCount[tempPostId])
        element.classList.add("none");
        e.firstChild.innerHTML = "chat_bubble_outline";
    }
}

//function for comment structure
function commentStructure(index, post_ID, result){
    var divElement = document.createElement('div');   
    divElement.classList.add("row");
    divElement.classList.add("comment");
    divElement.classList.add("borderThinDark");
    divElement.classList.add("backgroundw");
    divElement.classList.add("border10");
    divElement.classList.add("flexAlign");
    divElement.classList.add("shadowhover");

    divElement.id = "comment_"+index+"_"+post_ID;

    divElement.innerHTML += '\
    <div class="col-2 col-2-sm flex overFlowHidden hoverPointer"><img class=" DPcomment" src="./assets/profilePictures/testimonials-3.jpg" alt=""></div>\
    <div class="col-10 col-10-sm CommentArea">\
        <div class="usernamelikeBox flexAlign ">\
            <div class="usernameComment color font20 hoverPointer">'+result['userName']+'</div>\
            <button class="likeComment hoverPointer borderNone backgroundNone hoverPointer" type="button"><span class="material-icons  likeBtn textShadowBlue">favorite_border</span></button>\
        </div>\
        <div class="userComment font15">'+result['commentText']+'</div>\
    </div>'
    return divElement;
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
        deleteFile(i);
    }
    removedImages = {};
    uploadCount=0;
    if (input.files.length) {
        for(var i =0; i<input.files.length; i++){
            
            var fileExtension = input.files[i]['name'].split(".")[1];
            
            if(fileExtension == "mp4"){
                const source = document.createElement("source");
                source.src = URL.createObjectURL(input.files[i]);
                source.type = "video/mp4";
                imagePreview.innerHTML+= '\
                    <div class="imgBox overflowHidden backgroundDark border5" id='+uploadCount+'>\
                        <div class="imageDelete closeButton">\
                            <button type="button" class="borderNone hoverPointer border10" onclick="deleteFile('+uploadCount+');"><span class="material-icons md-red">close</span></button>\
                        </div>\
                        <video class="fullSize" id = "vid'+uploadCount+'" autoplay muted>\
                            Your browser does not support the video tag.\
                        </video> \
                    </div>';
                source.onload = function() {
                    URL.revokeObjectURL(input.src);
                }
                document.getElementById('vid'+uploadCount).appendChild(source); 
            }
            else{
                const img = document.createElement("img");
                img.src = URL.createObjectURL(input.files[i]);
                img.classList.add("fullSize");
                imagePreview.innerHTML+= '\
                    <div class="imgBox overflowHidden backgroundDark border5" id='+uploadCount+'>\
                        <div class="imageDelete closeButton">\
                            <button type="button" class="borderNone hoverPointer border10" onclick="deleteFile('+uploadCount+');"><span class="material-icons md-red">close</span></button>\
                        </div>\
                    </div>';
                img.onload = function() {
                    URL.revokeObjectURL(input.src);
                }
                document.getElementById(uploadCount).appendChild(img);
            }
            uploadCount++;
        }
    }

}

////////////////// function to delete files from create post modal /////////////////////

function deleteFile(id){

    removedImages[id] = 1;
    var element = document.getElementById(id);
    if(element){
        element.remove();
    }

}

function deleteAllFiles(e){
    e.value= "";
    for(var i = 0; i<uploadCount; i++){
        deleteFile(i);
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
