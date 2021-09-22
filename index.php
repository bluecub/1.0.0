
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
            </div>

        </div>
        <!-- ends here-->
    </div>

    <script src="admin/javascript/feedPage.js"></script>

<?php
    //including footer
    include_once 'includes/footer.php';

?>