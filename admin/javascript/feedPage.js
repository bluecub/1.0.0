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
            //initially printing n posts
            fetchAndFeed();
            
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
limit = 5;

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
            result = JSON.parse(result);

            for(var i =0; i<result.length; i++){
                feedPageAllPosts = document.getElementById('feedPageAllPosts');
                feedPageAllPosts.innerHTML += postStructure(result[i]);
            }

        }
        else{
            feedPageAllPosts.innerHTML += "no more posts left";
        }

    }
    xhr.open('GET', 'API/post.php?fn=get&user_ID='+user_ID+'&offset='+offset+'&limit='+limit, true);
    xhr.send();
    offset+=limit;
    return 1;

}

//this function returns the skeleton of the post 
function postStructure(data){

    var likeButtonType = 'favorite_border';
    var liked = 0;
    if(data['likedStatus']){
        liked = "1";
        likeButtonType = 'favorite';
    }

    if(!data['totalLikes']){
        data['totalLikes'] = 0;
    }
    if(!data['totalComments']){
        data['totalComments'] = 0;
    }

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
                    <video class="postContentBox widthMinWidth100" controls>\
                        <source src="./assets/postVid/'+vidPath[i]+'" type="video/mp4">\
                        Your browser does not support the video tag.\
                    </video>'   
                }
    
    
            }if(data['images']){
    
                var imgPath = data['images'].split(",");
    
                for(var i =0; i<imgPath.length; i++){
                    postStruct += '<img class="postContentBox widthMinWidth100" src="./assets/postImg/'+imgPath[i]+'" alt="">';
                }
    
            }
            postStruct += '</div>\
        </div>'

        }

        if(data['text']){
            postStruct +=  '\
            <div class="row captionRow">\
                <div class="col-12 col-12-sm caption borderBox">'+data['text']+'<a href="">read more...</a></div>\
            </div>'
        }

        postStruct +=  '\
        <div class="row postRow">\
            <div class="col-12 col-12-sm postBoxHeightCaption postButtonsBox flex ">\
                <div class="pqr">\
                    <div class="flex flexColumn">\
                        <button id = "like_'+data['post_ID']+'_'+liked+'" onclick="likePC('+data['post_ID']+', this, 0)" type="button" name="bookmarkBtn" class="hoverPointer postButtonsCaption borderNone backgroundNone"><span class="material-icons likeBtn textShadowBlue">'+likeButtonType+'</span></button>\
                        <div class="countLikes font-10 colorGrey" id = totalLikes_'+data['post_ID']+'>'+data['totalLikes']+'</div>\
                    </div>\
                    \
                    <div class="flex flexColumn">\
                        <button onclick="toggleDisplayFromID(\'comment_'+data['post_ID']+'\', this)" type="button" name="bookmarkBtn" class="hoverPointer postButtonsCaption borderNone backgroundNone"><span class="material-icons commentBtn textShadowYellow">chat_bubble_outline</span></button>\
                        <div id="totalComments_'+data['post_ID']+'" class="countComments font-10 colorGrey">'+data['totalComments']+'</div>\
                    </div>\
                    \
                    <div class="flex flexColumn">\
                        <button type="button" name="bookmarkBtn" class="hoverPointer postButtonsCaption borderNone backgroundNone"><span class="material-icons shareBtn textShadowRed">send</span></button>\
                    </div>\
                    \
                    <div class="flex flexColumn">\
                        <button type="button" name="bookmarkBtn" class="hoverPointer postButtonsCaption borderNone backgroundNone"><span class="material-icons tagBtn textShadowPurple">tag</span></button>\
                    </div>\
                </div>\
            </div>\
        </div>';

        postStruct += '\
        <div class="row  commentRow none" id = "comment_'+data['post_ID']+'">\
            <div class="commentContainer">\
                \
                <div class="row inputCommentBox borderThinDark backgroundw border10 flexAlign shadowhover" id = "loadComment_'+data['post_ID']+'">\
                    <div class="col-11 col-11-sm "><textarea class="inputComment" id="createComment_'+data['post_ID']+'" rows="2" cols="33" maxlength="250" placeholder="Add Comment ..."></textarea></div>\
                    <div class="col-1 col-1-sm"><button type="button" class="backgroundNav shadowhover hoverPointer flex" id="submitSmall" onclick="createCom('+user_ID+', '+data['post_ID']+');"><span class="material-icons" id="subbtnSmall">expand_less</span></button></div>\
                </div>\
                <div class="row">\
                    <div class="col-12 col-12-sm flex">\
                        <button type="button" onclick="fetchCom('+data['post_ID']+');" class="backgroundNav shadowhover hoverPointer flex" id="loadMoresmall" name="submit"><span class="material-icons" id="loadMorebtnsmall">keyboard_double_arrow_down</span></button>\
                    </div>\
                </div>\
            </div>\
        </div>'
        
    postStruct += '\
    </div>';

    return postStruct;

}

//function to like a post or comment
function likePC(parent_ID, element, type){
    
    var liked = element.id.split("_")[2];
    if(liked == "1"){

        var xhr = new XMLHttpRequest();
        xhr.onload = () =>{

            if(xhr.response == "0"){
                window.alert("something Went Wrong")
            }
            var totalLikesField = document.getElementById('totalLikes_'+parent_ID);
            if(type==0){
                var totalLikesField = document.getElementById('totalLikes_'+parent_ID);
                var totalLikes = parseInt(totalLikesField.innerHTML);
                totalLikesField.innerHTML = (totalLikes - 1).toString();
        
                element.firstChild.innerHTML = "favorite_border";
                element.id = "like_"+parent_ID+"_"+"0";
            }
            else{
                var totalLikesField = document.getElementById('totalLikesCom_'+parent_ID);
                var totalLikes = parseInt(totalLikesField.innerHTML);
                totalLikesField.innerHTML = (totalLikes - 1).toString();
        
                element.firstChild.innerHTML = "favorite_border";
                element.id = "comLike_"+parent_ID+"_"+"0";
            }

        }
        //!!!!!!!!!!!!!!!! remove total likes and total comments if not needed !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!//
        xhr.open("GET", 'API/likeAndComment.php?fn=setLike&liked='+liked+'&parentType='+type+'&user_ID='+user_ID+'&parent_ID='+parent_ID);
        xhr.send();

    }
    else{

        var xhr = new XMLHttpRequest();
        xhr.onload = () =>{

            if(xhr.response == "0"){
                window.alert("something Went Wrong")
            }
            if(type==0){
                var totalLikesField = document.getElementById('totalLikes_'+parent_ID);
                var totalLikes = parseInt(totalLikesField.innerHTML);
                totalLikesField.innerHTML = (totalLikes + 1).toString();
        
                element.firstChild.innerHTML = "favorite";
                element.id = "like_"+parent_ID+"_"+"1";
            }
            else{
                var totalLikesField = document.getElementById('totalLikesCom_'+parent_ID);
                var totalLikes = parseInt(totalLikesField.innerHTML);
                totalLikesField.innerHTML = (totalLikes + 1).toString();
        
                element.firstChild.innerHTML = "favorite";
                element.id = "comLike_"+parent_ID+"_"+"1";
            }

        }
        //!!!!!!!!!!!!!!!! remove total likes and total comments if not needed !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!//
        xhr.open("GET", 'API/likeAndComment.php?fn=setLike&liked='+liked+'&parentType='+type+'&user_ID='+user_ID+'&parent_ID='+parent_ID);
        xhr.send();
    }
    console.log(element.childNodes);

}

//function for comment structure
function commentStructure(index, post_ID, result){

    var likeButtonType = 'favorite_border';
    var liked = 0;
    if(result['likedStatus']){
        liked = "1";
        likeButtonType = 'favorite';
    }
    if(!result['totalLikes'])result['totalLikes'] = 0;

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
            <div class="flex flexColumn">\
                <button id="comLike_'+result['activity_ID']+'_'+liked+'" onclick="likePC('+result['activity_ID']+', this, 1)" class="likeComment hoverPointer borderNone backgroundNone hoverPointer">\<span class="material-icons likeBtn textShadowBlue">'+likeButtonType+'</span></button>\
                <div class="font-10 colorGrey" id = totalLikesCom_'+result['activity_ID']+'>'+result['totalLikes']+'</div>\
            </div>\
        </div>\
        <div class="userComment font15">'+result['commentText']+'</div>\
    </div>'
    return divElement;
}

//function to fetch comments
function fetchCom(post_ID){ 

    //processing parameters to fetch comments
    if(!postOffsetCount[post_ID]){
        postOffsetCount[post_ID] = 0;
    }

    var comLimit = 4;
    var comOffset = postOffsetCount[post_ID];

    //fetching comments by ajax
    var xhr =new XMLHttpRequest();
    xhr.onload = () => {
        result = JSON.parse(xhr.response);
        console.log(result)
        if(result.length){
            for(var i =0; i<result.length; i++){
                postOffsetCount[post_ID]++;
                var insertBeforeEle = document.getElementById('loadComment_'+post_ID);
                var commentBox = commentStructure(postOffsetCount[post_ID], post_ID, result[i]);                
                insertBeforeEle.insertAdjacentElement('beforebegin', commentBox);
            }
        }
        console.log(postOffsetCount[post_ID], 'fc')
    }
    console.log(offset)
    xhr.open("get", 'API/likeAndComment.php?fn=get&get=comment&user_ID='+user_ID+'&parent_ID='+post_ID+'&limit='+comLimit+'&offset='+comOffset);
    xhr.send();

}

//function to create comment
function createCom(user_ID, post_ID){

    var commentField = document.getElementById('createComment_'+post_ID)
    var commentText = commentField.value;

    var fd = new FormData();
    fd.append('user_ID', user_ID);
    fd.append('parent_ID', post_ID);
    fd.append('commentText', commentText);
    fd.append('activityType', 1);

    var xhr = new XMLHttpRequest();
    xhr.onload = () => {
        result = xhr.responseText;
        if(result == "1"){
            var res = [];
            res['commentText'] = commentText;
            res['userName'] = userName;
            var index = postOffsetCount[post_ID]+1;
            var commentBox = commentStructure(index, post_ID, res);

            var insertBeforeEle = document.getElementById('loadComment_'+post_ID);
            insertBeforeEle.insertAdjacentElement('beforebegin', commentBox);
            
            postOffsetCount[post_ID]++;
            document.getElementById('createComment_'+post_ID).value = null;
            var totalCommentsField = document.getElementById('totalComments_'+post_ID)
            var totalComments = parseInt(totalCommentsField.innerHTML);
            totalCommentsField.innerHTML = (totalComments+1).toString();
        }
        else{
            window.alert("some thing went wrong!!!");
        }
    }

    xhr.open("POST", 'API/likeAndComment.php?fn=set')
    xhr.send(fd);    
}

// functions to hide and show an element

function toggleDisplayFromID(id, e){
    var element = document.getElementById(id);
    var tempPostId = id.split("_")[1];
    if(element.classList.contains("none")){

        if(!postOffsetCount[tempPostId]){
            fetchCom(tempPostId);
        }
        element.classList.remove('none');
        e.firstChild.innerHTML = "chat_bubble";
    }
    else{   
        element.classList.add("none");
        e.firstChild.innerHTML = "chat_bubble_outline";
    }
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
    for(var i = 0; i<uploadCount; i++){
        deleteFile(i);
    }
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
        if(xhr.responseText == "1"){
            closeButton.click();
        }
        else{
            document.getElementById('modalErrorMsg').innerHTML = "Something Went Wrong !!!"
        }
    }
    xhr.open("POST", "API/post.php?fileName="+fileName+"&fn=set&user_ID="+user_ID, true);
    xhr.send(fd);
    
}

