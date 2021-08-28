<?php

    require_once 'includes/basicFunctions.php';
    require_once 'includes/CRUD.php';
    require_once 'includes/login.php';

    $errorArray = array();
    if(isset($_POST['submit'])){

        //taking the credentials
        $credentials['userName'] = $_POST['userName'];
        $credentials['password'] = $_POST['password'];

        //creating the login object using credentials and checking for authentication it
        $loginObject = new login($credentials);
        $status = $loginObject->checkAuthentication();

        if(is_array($status)){
            $errorArray = $status;
        }
        else{
            //jump to feed page(user_ID is returned)
            echo $status;
        }
    }

?>

<?php 

    //title of the page(will be diplayed by includes/formHeader.php)
    $title = 'BlueCub-Login';
    
    //including the header
    include_once 'includes/formHeader.php';

?>

<body class="container" id="mainframe">
    
    <!-- This is the main login area-->
    <div class="row" id="loginRow">
        <div class="col-6 hidden-sm border backgroundb" id="picture"></div><!-- check for how to make 0 coloumns when sm or add own classes-->
        <div class="col-6 col-12-sm border backgroundw" id="form">
            <!-- top 3 bars -->
            <div class="bar" id="loginBar"></div>
            <div class="bar" id="signUpbar"></div>
            <div class="bar" id="forPassbar"></div>
            <!-- title and slogan -->
            <div id="textArea">
                <span class="inlineBlock logoLisufp"><?php include('includes/logo.php') ?></span>
                <p id="title">BlueCub</p>
                <p id="slogan">Flaunt Your Stocks</p>
            </div>
            <!-- main form-->
            
            <form class="container" id="formLogIn" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post" name="logIn">

                <!-- this is the error message feild-->
                <?php 
                    //displaying error if exists any
                    if($errorArray){
                        echo '<div class="row">
                                <div class="col-1 col-1-sm"></div>
                                <div class="col-10 col-10-sm errorStyle">
                                    &#9888; You have entered the wrong details
                                </div>
                            </div>';
                    }
                
                ?>
                <!-- error message feild ends here-->

                <div class="row">
                    <div class="col-1 col-1-sm"></div>
                    <input type="text" class="col-10 col-10-sm input shadowhover" id="userNameLogIn" placeholder="Username" name="userName" required>
                </div>
                <div class="row">
                    <div class="col-1 col-1-sm"></div>
                    <input type="password" class="col-10 col-10-sm input shadowhover" id="passwordLogIn" placeholder="Password" name="password" required>
                </div>

                <div class="row">
                    <div class="col-1 col-1-sm"></div>
                    <div class="col-7 col-7-sm">
                    <input type="checkbox" class="rememberMe"  name="rememberMe">
                    <label for="rememberMe" class="rememberMeBtn">Remember Me</label>
                    </div>
                    <button type="submit" class="col-4 col-4-sm backgroundb shadowhover" id="submit"  name="submit" ><span class="material-icons" id="subbtn">expand_less</span></button>
                </div>
            </form>
            <!-- buttons below -->
            <!--<button type="button" id="loginBut" class="buttons">Log In</button>
            <button type="button" id="signUpbut" class="buttons">Sign Up</button>
            <button type="button" id="forPassbut" class="buttons">Forgot Password</button>-->
        </div>
    </div>


<?php
    //including footer
    include_once 'includes/footer.php';

?>