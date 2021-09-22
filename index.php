
<?php 

    require_once 'includes/basicFunctions.php';

    session_start();
    if(!basicFunctions::isLoggedIn()){
        header('location: login.php');
    }

    $userObject = $_SESSION['userObject'];

?>

<?php 

    //title of the page(will be diplayed by includes/formHeader.php)
    $title = 'BlueCub-FeedPage';

    //including the header
    include_once 'includes/pageHeader.php';

?>
    <!-- main display area -->
    
    <!-- post create modal (created by vipul) write code for post creation here  action="<?php //echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST" -->
    <div class="modalWrapper flex" id="postCreateWrapper">
        <div class="container wrapper overFlowScroll backgroundw border10" >

            <form  id="createPostForm">

                <div class="col-8 col-sm-12 closeButton">
                    <button type="button" class=" backgroundw borderNone hoverPointer" id="postCreateModalClose"><span class="material-icons md-red">close</span></button>
                </div> 

                <div class="row">
                    <div class="col-12 col-12-sm stylebar5"></div>
                </div>
                <div class="row">
                    <div class="col-12 col-12-sm center font30" id="createPostHeading">Create Post</div>
                </div>
                <div class="row">
                    <div class="col-1 col-1-sm"></div>
                    <input type="file" name='images[]' multiple accept="video/*|image/*" id="postImgVidInput" onchange="previewImages(this);" onclick="deleteAllFiles(this)"> 
                    <div class="col-10 col-10-sm borderdashed border5" id="imgPreview">
                        <label for="postImgVidInput" class="hoverPointer widthMinWidth100">
                            <div class="addImg imgBox flex  hoverPointer">
                                <div><span class="material-icons md-25 md-blue">cloud_upload </span></div>
                                <p class="color font15 p">Browse Files</p>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-12-sm stylebar5"></div>
                </div>
                <div class="row">
                    <div class="col-1 col-1-sm"></div>
                    <div class="col-6 col-6-sm color  font15">Caption</div>
                    <div class="col-4 col-4-sm  formatBtn">
                        <button class=" borderNone backgroundNone flex" type="button"><span class="material-icons md-blue md-17">format_bold</span></button>
                        <button class=" borderNone backgroundNone flex" type="button"><span class="material-icons md-blue md-17">format_italic</span></button>
                        <button class=" borderNone backgroundNone flex" type="button"><span class="material-icons md-blue md-17">format_underlined</span></button>
                        <button class=" borderNone backgroundNone flex" type="button"><span class="material-icons md-blue md-17">emoji_emotions</span></button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1 col-1-sm"></div>
                    <div class="col-10 col-10-sm">
                        <textarea class="caption borderBox widthMinWidth100" id="CreatePostCaption" rows="4" cols="37" maxlength="250" placeholder="What is your post about &#128526;"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1 col-1-sm"></div>
                    <label class="col-10 col-10-sm color font15">Visibility</label>
                </div>
                <div class="row">
                    <div class="col-1 col-1-sm"></div>
                    <div class="col-5 col-5-sm">
                        <input value="0" type="radio" name="visibility" class="hoverPointer" id="postCreatePublic" checked><label for="postCreatePublic" class="hoverPointer">Public</label> <br>
                        <input value="1" type="radio" name="visibility" class="hoverPointer" id="postCreateFollowers"><label for="postCreateFollowers" class="hoverPointer">Followers</label> <br>
                        <input value="2" type="radio" name="visibility" class="hoverPointer" id="postCreatePrivate"><label for="postCreatePrivate" class="hoverPointer">Private</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 col-4-sm"></div>
                    <div class="col-4 col-4-sm center" id="createPostButton">
                        <button type="submit" class="backgroundDarkBlue shadowhover hoverPointer" id="submit"  name="submit"><span class="material-icons" id="subbtn">expand_less</span></button>
                    </div>
                    <div class="col-4 col-4-sm"></div>
                </div>
                <div class="row">
                    <div class="col-12 col-12-sm stylebar5"></div>
                </div>
            </form>
        </div>
    </div>

    <div class="container everyPageShadow borderBox" id="displayArea">

        <!--tagged row-->
        <div class="row borderBox flex" id="tagRow">
            <div class="col-3 col-3-sm" id="tagHeadingCol">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-12-sm Center" id="tagHeading">Tagged Posts</div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-12-sm font-13 Center" id="tagInfo">See all posts that you have tagged</div>
                    </div>
                </div>
            </div>

            <div class="col-9 col-9-sm" id="TagCol">
                <div class="box overFlowHidden"><img class="postContentBox" src="./assets/profilePictures/download.jpeg" alt=""></div>
                <div class="box overFlowHidden"><img class="postContentBox" src="./assets/profilePictures/images (1).jpeg" alt=""></div>
                <div class="box overFlowHidden"><img class="postContentBox" src="./assets/profilePictures/images (2).jpeg" alt=""></div>
                <div class="box overFlowHidden"><img class="postContentBox" src="./assets/profilePictures/images.jpeg" alt=""></div>
                <div class="box overFlowHidden"><img class="postContentBox" src="./assets/profilePictures/photo-1503023345310-bd7c1de61c7d.jpeg" alt=""></div>
                <div class="box"></div>
                <div class="box"></div>
                <div class="box"></div>
                <div class="box"></div>
                <div class="box"></div>
                <div class="box"></div>
                <div class="box"></div>
                <div class="box"></div>
                <div class="box"></div>
            </div>
        </div>

        <!-- ends here-->
        <!-- post and stock price row -->
        <!-- place the add button where ever you want (created by vipul)-->
        <div class="row" id="headingRow">
            <div class="col-12 col-12-sm headings Center borderBox flex" id="postHeading">Posts <button id="postCreateModalButton" onclick="openPostCreateModal(this)"><span class="material-icons">add</span></button></div>
        </div>
        

        <div class="row" id="imgStockRow"> 
            <!-- change it to 8 columns (reason of change = i didn't like it) -->
            <div class="col-12 col-12-sm imgPost" id="feedPageAllPosts">
                <!-- post box html -->
                <div class=" postContainer">
                    <div class="row usernameRow">
                        <div class="col-6 col-6-sm DPBox flexAlign">
                            <div class="DP overFlowHidden hoverPointer shadowhover"><img class="postContentBox" src="./assets/profilePictures/testimonials-3.jpg" alt=""></div>
                            <div class="userNamePost hoverPointer">UserName</div>
                        </div>
                        <div class="col-5 col-5-sm"></div>
                        <div class="col-1 col-1-sm bookmarkBtnBox flex">
                            <button type="button" name="bookmarkBtn" class="hoverPointer postButtons borderNone backgroundNone"><span class="material-icons md-lights textShadowGray md-24">bookmark_border</span></button>
                        </div>
                    </div>
                    <div class="row postRow">
                        <div class="col-12 col-12-sm post borderBox">
                            <img class="postContentBox widthMinWidth100 borderThin" src="./assets/profilePictures/Messenger.png" alt="">
                            <img class="postContentBox widthMinWidth100 borderThin" src="./assets/profilePictures/Messenger.png" alt="">
                        </div>
                    </div>
                    
                    <div class="row captionRow">
                        <div class="col-12 col-12-sm caption borderBox">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla eveniet sunt eligendi, porro facere officia atque non iusto rem, veritatis neque magni quia sit facilis deleniti excepturi animi rerum perspiciatis! Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore consequatur et impedit quis omnis vero, neque quidem esse cumque eligendi labore laudantium nostrum voluptatem numquam commodi. Sunt placeat numquam vel?<a href="">read more...</a></div>
                    </div>
                    <div class="row postRow">
                        <div class="col-12 col-12-sm postBoxHeightCaption postButtonsBox flex ">
                            <div class="pqr  ">
                                <div class="flex flexColumn">
                                    <button type="button" name="bookmarkBtn" class="hoverPointer postButtonsCaption borderNone backgroundNone"><span class="material-icons likeBtn textShadowBlue">favorite_border</span></button>
                                    <div class="countLikes font-10 colorGrey">1000</div> 
                                </div>
                                <div class="flex flexColumn">
                                    <button onclick="toggleDisplayFromID(1_1, this)" type="button" name="bookmarkBtn" class="hoverPointer postButtonsCaption borderNone backgroundNone"><span class="material-icons commentBtn textShadowYellow">chat_bubble_outline</span></button>
                                    <div class="countComments font-10 colorGrey">1000</div>
                                </div>
                                <div class="flex flexColumn">
                                    <button type="button" name="bookmarkBtn" class="hoverPointer postButtonsCaption borderNone backgroundNone"><span class="material-icons shareBtn textShadowRed">send</span></button>
                                </div>
                                <div class="flex flexColumn">
                                    <button type="button" name="bookmarkBtn" class="hoverPointer postButtonsCaption borderNone backgroundNone"><span class="material-icons tagBtn textShadowPurple">tag</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- comment row do display block when button clicked and display none for post row when button clicked -->
                    <div class="row  commentRow none" id = "1" >
                        <div class="commentContainer">
                            
                            <div class="row inputCommentBox borderThinDark backgroundw border10 flexAlign shadowhover">
                               <div class="col-11 col-11-sm "> <textarea class=" inputComment " rows="2" cols="33" maxlength="250" placeholder="Add Comment ..."></textarea></div>   
                               <div class="col-1 col-1-sm"><button type="button" onclick="createComment(2,3)" class="backgroundNav shadowhover hoverPointer flex" id="submitSmall" ><span class="material-icons" id="subbtnSmall">expand_less</span></button></div>
                             </div>
                            <!-- every row is a comment -->
                            <div class="row comment  borderThinDark backgroundw border10 flexAlign shadowhover">
                                <div class="col-2 col-2-sm flex overFlowHidden hoverPointer "><img class=" DPcomment" src="./assets/profilePictures/testimonials-3.jpg" alt=""></div>
                                <div class="col-10 col-10-sm CommentArea">
                                    <div class="usernamelikeBox flexAlign ">
                                        <div class="usernameComment color font20 hoverPointer">Username</div>
                                        <button class="likeComment hoverPointer borderNone backgroundNone hoverPointer" type="button"><span class="material-icons  likeBtn textShadowBlue">favorite_border</span></button>
                                    </div>
                                    <div class="userComment font15">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting 
                                        industry. Lorem Ipsum has been the industry's standard dummy text ever since 
                                    </div>
                                </div>
                            </div>
                            <div class="row comment  borderThinDark backgroundw border10 flexAlign shadowhover">
                                <div class="col-2 col-2-sm flex overFlowHidden hoverPointer "><img class=" DPcomment" src="./assets/profilePictures/testimonials-3.jpg" alt=""></div>
                                <div class="col-10 col-10-sm CommentArea">
                                    <div class="usernamelikeBox flexAlign ">
                                        <div class="usernameComment color font20">Username</div>
                                        <button class="likeComment hoverPointer borderNone backgroundNone" type="button"><span class="material-icons  likeBtn textShadowBlue">favorite_border</span></button>
                                    </div>
                                    <div class="userComment font15">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting 
                                        industry. Lorem Ipsum has been the industry's standard dummy text ever since 
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-12-sm flex">
                                    <button type="submit" class="backgroundNav shadowhover hoverPointer flex" id="loadMoresmall"  name="submit"><span class="material-icons" id="loadMorebtnsmall">keyboard_double_arrow_down</span></button>
                                </div>
                            </div>
                        </div>  
                    </div>
                    <!-- ends here -->
                </div>
            </div>

        </div>
        <!-- ends here-->
    </div>

    <script src="admin/javascript/feedPage.js"></script>

<?php
    //including footer
    include_once 'includes/footer.php';

?>