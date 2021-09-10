
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
    
    <div class="container everyPageShadow borderBox" id="displayArea">

        <!--tagged row-->
        <div class="row borderBox flex" id="tagRow">
            <div class="col-3 col-3-sm" id="tagHeadingCol">
                <div class="container">
                    <div class="row">
                        <div class="Col-12 col-12-sm Center" id="tagHeading">Tagged Posts</div>
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
        <div class="row" id="headingRow">
            <div class="col-12 col-12-sm headings Center borderBox" id="postHeading">Posts</div>
        </div>
        

        <div class="row" id="imgStockRow">
            <!-- change it to 8 columns (reason of change = i didn't like it) -->
            <div class="col-12 col-12-sm imgPost" id="feedPageAllPosts">
                <!-- post box html -->
                <div class=" postContainer">
                    <div class="row usernameRow">
                        <div class="col-6 col-6-sm DPBox flexAlign">
                            <div class="DP overFlowHidden"><img class="postContentBox" src="./assets/profilePictures/testimonials-3.jpg" alt=""></div>
                            <div class="userNamePost">UserName</div>
                        </div>
                        <div class="col-5 col-5-sm"></div>
                        <div class="col-1 col-1-sm bookmarkBtnBox flex">
                            <button type="button" name="bookmarkBtn" class="postButtons borderNone backgroundNone"><span class="material-icons md-lights textShadowGray md-24">bookmark_border</span></button>
                        </div>
                    </div>
                    <div class="row postRow">
                        <div class="col-11 col-11-sm postBoxHeight post overFlowHidden borderBox"><img class="postContentBox" src="./assets/profilePictures/Messenger.png" alt=""></div>
                        <div class="col-1 col-1-sm postBoxHeight postButtonsBox flex">
                            <button type="button" name="bookmarkBtn" class="postButtons borderNone backgroundNone"><span class="material-icons likeBtn textShadowBlue">favorite_border</span></button>
                            <button type="button" name="bookmarkBtn" class="postButtons borderNone backgroundNone"><span class="material-icons commentBtn textShadowYellow">chat_bubble_outline</span></button>
                            <button type="button" name="bookmarkBtn" class="postButtons borderNone backgroundNone"><span class="material-icons shareBtn textShadowRed">send</span></button>
                            <button type="button" name="bookmarkBtn" class="postButtons borderNone backgroundNone"><span class="material-icons tagBtn textShadowPurple">filter_list</span></button>
                        </div>
                    </div>
                    <div class="row captionRow">
                        <div class="col-10 col-10-sm caption">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi nulla deserunt numquam asperiores excepturi facilis, molestiae recusandae enim exercitationem perferendis debitis tempore excepturi facilis, molestiae recusandae enim exercitationem perferendis debitis tempore <a href="">read more...</a></div>
                    </div>
                </div>

                <div class=" postContainer">
                    <div class="row usernameRow">
                        <div class="col-6 col-6-sm DPBox flexAlign">
                            <div class="DP overFlowHidden"><img class="postContentBox" src="./assets/profilePictures/testimonials-3.jpg" alt=""></div>
                            <div class="userNamePost">UserName</div>
                        </div>
                        <div class="col-5 col-5-sm"></div>
                        <div class="col-1 col-1-sm bookmarkBtnBox flex">
                            <button type="button" name="bookmarkBtn" class="postButtons borderNone backgroundNone"><span class="material-icons md-lights textShadowGray md-24">bookmark_border</span></button>
                        </div>
                    </div>
                    <div class="row postRow">
                        <div class="col-11 col-11-sm postBoxHeight post overFlowHidden borderBox"><img class="postContentBox" src="./assets/profilePictures/images (2).jpeg" alt=""></div>
                        <div class="col-1 col-1-sm postBoxHeight postButtonsBox flex">
                            <button type="button" name="bookmarkBtn" class="postButtons borderNone backgroundNone"><span class="material-icons likeBtn textShadowBlue">favorite_border</span></button>
                            <button type="button" name="bookmarkBtn" class="postButtons borderNone backgroundNone"><span class="material-icons commentBtn textShadowYellow">chat_bubble_outline</span></button>
                            <button type="button" name="bookmarkBtn" class="postButtons borderNone backgroundNone"><span class="material-icons shareBtn textShadowRed">send</span></button>
                            <button type="button" name="bookmarkBtn" class="postButtons borderNone backgroundNone"><span class="material-icons tagBtn textShadowPurple">filter_list</span></button>
                        </div>
                    </div>
                    <div class="row captionRow">
                        <div class="col-10 col-10-sm caption">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi nulla deserunt numquam asperiores excepturi facilis, molestiae recusandae enim exercitationem perferendis debitis tempore excepturi facilis, molestiae recusandae enim exercitationem perferendis debitis tempore <a href="">read more...</a></div>
                    </div>
                </div>

                <div class=" postContainer">
                    <div class="row usernameRow">
                        <div class="col-6 col-6-sm DPBox flexAlign">
                            <div class="DP overFlowHidden"><img class="postContentBox" src="./assets/profilePictures/testimonials-3.jpg" alt=""></div>
                            <div class="userNamePost">UserName</div>
                        </div>
                        <div class="col-5 col-5-sm"></div>
                        <div class="col-1 col-1-sm bookmarkBtnBox flex">
                            <button type="button" name="bookmarkBtn" class="postButtons borderNone backgroundNone"><span class="material-icons md-lights textShadowGray md-24">bookmark_border</span></button>
                        </div>
                    </div>
                    <div class="row postRow">
                        <div class="col-11 col-11-sm postBoxHeight post overFlowHidden borderBox"><img class="postContentBox" src="./assets/profilePictures/images.jpeg" alt=""></div>
                        <div class="col-1 col-1-sm postBoxHeight postButtonsBox flex">
                            <button type="button" name="bookmarkBtn" class="postButtons borderNone backgroundNone"><span class="material-icons likeBtn textShadowBlue">favorite_border</span></button>
                            <button type="button" name="bookmarkBtn" class="postButtons borderNone backgroundNone"><span class="material-icons commentBtn textShadowYellow">chat_bubble_outline</span></button>
                            <button type="button" name="bookmarkBtn" class="postButtons borderNone backgroundNone"><span class="material-icons shareBtn textShadowRed">send</span></button>
                            <button type="button" name="bookmarkBtn" class="postButtons borderNone backgroundNone"><span class="material-icons tagBtn textShadowPurple">filter_list</span></button>
                        </div>
                    </div>
                    <div class="row captionRow">
                        <div class="col-10 col-10-sm caption">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi nulla deserunt numquam asperiores excepturi facilis, molestiae recusandae enim exercitationem perferendis debitis tempore excepturi facilis, molestiae recusandae enim exercitationem perferendis debitis tempore <a href="">read more...</a></div>
                    </div>
                </div>


                
                <!-- ends here -->
            </div>

            <!--------------------------- I dont't like it -------------------------------->
            <!-- <div class="col-4 hidden-sm stockPrice"></div> -->

        </div>
        <!-- ends here-->
    </div>

    <!-- <script src="admin/javascript/feedPage.js"></script> -->

<?php
    //including footer
    include_once 'includes/footer.php';

?>