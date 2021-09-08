
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
        <div class="row borderBox" id="tagRow">
            <div class="col-2 col-2-sm" id="tagHeadingCol">
                <div class="container">
                    <div class="row">
                        <div class="Col-12 col-12-sm Center" id="tagHeading">Tagged Posts</div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-12-sm font-13 Center" id="tagInfo">See all posts that you have tagged</div>
                    </div>
                </div>
            </div>

           <div class="col-1 col-1-sm"></div>

            <div class="col-9 col-9-sm" id="TagCol">
                <div class="box"></div>
                <div class="box"></div>
                <div class="box"></div>
                <div class="box"></div>
                <div class="box"></div>
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
            <div class="col-8 col-12-sm headings Center borderBox" id="postHeading">Posts</div>
            <div class="col-4 hidden-sm headings Center borderBox" id="stockPriceHeading">StockPrice</div>
        </div>
        

        <div class="row" id="imgStockRow">
            <div class="col-8 col-12-sm imgPost">
                <!-- post box html -->
                <div class=" postContainer">
                    <div class="row usernameRow">
                        <div class="col-6 col-6-sm DPBox flexAlign">
                            <div class="DP"></div>
                            <div class="userNamePost">UserName</div>
                        </div>
                        <div class="col-5 col-5-sm"></div>
                        <div class="col-1 col-1-sm bookmarkBtnBox flex">
                            <button type="button" name="bookmarkBtn" class="bookmarkBtn borderNone backgroundNone"><span class="material-icons md-lights md-24">bookmark_border</span></button>
                        </div>
                    </div>
                    <div class="row postRow">
                        <div class="col-11 col-11-sm postBoxHeight post"></div>
                        <div class="col-1 col-1-sm postBoxHeight postButtonsBox flex">
                            <button type="button" name="bookmarkBtn" class="postButtons borderNone backgroundNone"><span class="material-icons likeBtn">favorite_border</span></button>
                            <button type="button" name="bookmarkBtn" class="postButtons borderNone backgroundNone"><span class="material-icons commentBtn">chat_bubble_outline</span></button>
                            <button type="button" name="bookmarkBtn" class="postButtons borderNone backgroundNone"><span class="material-icons shareBtn">send</span></button>
                            <button type="button" name="bookmarkBtn" class="postButtons borderNone backgroundNone"><span class="material-icons tagBtn">filter_list</span></button>
                        </div>
                    </div>
                    <div class="row captionRow">
                        <div class="col-10 col-10-sm caption">my name is parth i am 20 years 
                            old my fav colour is pink</div>
                    </div>
                </div>

                <div class=" postContainer">
                    <div class="row usernameRow">
                        <div class="col-6 col-6-sm DPBox flexAlign">
                            <div class="DP"></div>
                            <div class="userNamePost">UserName</div>
                        </div>
                        <div class="col-5 col-5-sm"></div>
                        <div class="col-1 col-1-sm bookmarkBtnBox flex">
                        </div>
                    </div>
                    <div class="row postRow">
                        <div class="col-11 col-11-sm postBoxHeight post"></div>
                        <div class="col-1 col-1-sm postBoxHeight postButtonsBox flex">
                        <button type="button" name="bookmarkBtn" class="bookmarkBtn borderNone backgroundNone"><span class="material-icons md-lights md-24">bookmark_border</span></button>
                            <button type="button" name="bookmarkBtn" class="postButtons borderNone backgroundNone"><span class="material-icons likeBtn">favorite_border</span></button>
                            <button type="button" name="bookmarkBtn" class="postButtons borderNone backgroundNone"><span class="material-icons commentBtn">chat_bubble_outline</span></button>
                            <button type="button" name="bookmarkBtn" class="postButtons borderNone backgroundNone"><span class="material-icons shareBtn">send</span></button>
                            <button type="button" name="bookmarkBtn" class="postButtons borderNone backgroundNone"><span class="material-icons tagBtn">filter_list</span></button>
                        </div>
                    </div>
                    <div class="row captionRow">
                        <div class="col-10 col-10-sm caption">my name is parth i am 20 years 
                            old my fav colour is pink</div>
                    </div>
                </div>

                <div class=" postContainer">
                    <div class="row usernameRow">
                        <div class="col-6 col-6-sm DPBox flexAlign">
                            <div class="DP"></div>
                            <div class="userNamePost">UserName</div>
                        </div>
                        <div class="col-5 col-5-sm"></div>
                        <div class="col-1 col-1-sm bookmarkBtnBox flex">
                            <button type="button" name="bookmarkBtn" class="bookmarkBtn borderNone backgroundNone"><span class="material-icons md-lights md-24">bookmark_border</span></button>
                        </div>
                    </div>
                    <div class="row postRow">
                        <div class="col-11 col-11-sm postBoxHeight post"></div>
                        <div class="col-1 col-1-sm postBoxHeight postButtonsBox flex">
                            <button type="button" name="bookmarkBtn" class="postButtons borderNone backgroundNone"><span class="material-icons likeBtn">favorite_border</span></button>
                            <button type="button" name="bookmarkBtn" class="postButtons borderNone backgroundNone"><span class="material-icons commentBtn">chat_bubble_outline</span></button>
                            <button type="button" name="bookmarkBtn" class="postButtons borderNone backgroundNone"><span class="material-icons shareBtn">send</span></button>
                            <button type="button" name="bookmarkBtn" class="postButtons borderNone backgroundNone"><span class="material-icons tagBtn">filter_list</span></button>
                        </div>
                    </div>
                    <div class="row captionRow">
                        <div class="col-10 col-10-sm caption">my name is parth i am 20 years 
                            old my fav colour is pink</div>
                    </div>
                </div>

                <div class=" postContainer">
                    <div class="row usernameRow">
                        <div class="col-6 col-6-sm DPBox flexAlign">
                            <div class="DP"></div>
                            <div class="userNamePost">UserName</div>
                        </div>
                        <div class="col-5 col-5-sm"></div>
                        <div class="col-1 col-1-sm bookmarkBtnBox flex">
                            <button type="button" name="bookmarkBtn" class="bookmarkBtn borderNone backgroundNone"><span class="material-icons md-lights md-24">bookmark_border</span></button>
                        </div>
                    </div>
                    <div class="row postRow">
                        <div class="col-11 col-11-sm postBoxHeight post"></div>
                        <div class="col-1 col-1-sm postBoxHeight postButtonsBox flex">
                            <button type="button" name="bookmarkBtn" class="postButtons borderNone backgroundNone"><span class="material-icons likeBtn">favorite_border</span></button>
                            <button type="button" name="bookmarkBtn" class="postButtons borderNone backgroundNone"><span class="material-icons commentBtn">chat_bubble_outline</span></button>
                            <button type="button" name="bookmarkBtn" class="postButtons borderNone backgroundNone"><span class="material-icons shareBtn">send</span></button>
                            <button type="button" name="bookmarkBtn" class="postButtons borderNone backgroundNone"><span class="material-icons tagBtn">filter_list</span></button>
                        </div>
                    </div>
                    <div class="row captionRow">
                        <div class="col-10 col-10-sm caption">my name is parth i am 20 years 
                            old my fav colour is pink</div>
                    </div>
                </div>
                
                
                <!-- ends here -->
            </div>
            <div class="col-4 hidden-sm stockPrice"></div>
        </div>
        <!-- ends here-->
    </div>

    <script src="admin/javascript/feedPage.js"></script>

<?php
    //including footer
    include_once 'includes/footer.php';

?>