<?php

    require_once 'includes/basicFunctions.php';
    require_once 'includes/CRUD.php';
    require_once 'includes/login.php';
    require_once 'includes/profile.php';

    // checking if user is already logged in or not(if yes throw them to index.php)
    session_start();
    if(basicFunctions::isLoggedIn()){
        header('location: index.php');
    }

    $errorArray = array();
    $remembered = basicFunctions::isRemembered();

    if(isset($_POST['submit']) or $remembered){

        //initializing the userName and password variables
        $userName = "";
        $password = "";

        //taking the credentials either from coockies or from fields (depends on which one is set)
        if($remembered){
            $userName = $_COOKIE['userName'];
            $password = $_COOKIE['password'];
        }

        else{
            $userName = $_POST['userName'];
            $password = $_POST['password'];
        }

        $credentials['userName'] = $userName;
        $credentials['password'] = $password;
        
        //creating the login object using credentials and checking for authentication it
        $loginObject = new login($credentials);
        $status = $loginObject->checkAuthentication($remembered);
        unset($loginObject);

        if(is_array($status)){
            $errorArray = $status;
        }
        else{

            //checking for remeber me is checked or not
            if(isset($_POST['rememberMe'])){
                $daysToRemeber = 4;
                setcookie("userName", $userName, time() + (86400 * $daysToRemeber));
                setcookie("password", basicFunctions::hashPassword($password), time() + (86400 * $daysToRemeber));
            }

            //jump to feed page(user_ID is returned)
            session_start();
            $_SESSION['userObject'] = new profileObject($status);
            header("location: index.php");

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
        <div class="col-6 hidden-sm border backgroundb" id="picture"><div style="width:100%;height:0;padding-bottom:100%;position:relative;"><iframe src="https://giphy.com/embed/JtBZm3Getg3dqxK0zP" width="100%" height="100%" style="position:absolute" frameBorder="0" class="giphy-embed" allowFullScreen></iframe></div><p><a href="https://giphy.com/gifs/JtBZm3Getg3dqxK0zP">via GIPHY</a></p></div><!-- check for how to make 0 coloumns when sm or add own classes-->
        <div class="col-6 col-12-sm border backgroundw" id="form">
            <!-- top 3 bars -->
            <div class="bar" id="loginBar"></div>
            <div class="bar" id="signUpbar"></div>
            <div class="bar" id="forPassbar"></div>
            <!-- title and slogan -->
            <div id="textArea">
                <span class="inlineBlock logoLisufp"><?php include('includes/logo.php') ?></span>
                <p id="title">BlueCub</p>
                <p id="slogan" class="font-13">Flaunt Your Stocks</p>
            </div>
            <!-- main form-->
            
            <form class="container" id="formLogIn" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post" name="logIn">

                <!-- this is the error message feild-->
                <?php 
                    //displaying error if exists any
                    if($errorArray){
                        echo '<div class="row">
                                <div class="col-1 col-1-sm"></div>
                                <div class="col-10 col-10-sm errorStyle font-13">
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
                <div class="row" id="wrapper">
                    <div class="col-1 col-1-sm"></div>

                    <input type="password" class="col-10 col-10-sm input shadowhover" id="passwordLogIn" placeholder="Password" name="password" required>
                    <!-- ------------ password visible button ------------ -->
                    <spna class="material-icons backgroundw" id="visibilityLogin" onclick="showPassword(this)">visibility</span>
                </div>

                <div class="row">
                    <div class="col-1 col-1-sm"></div>
                    <div class="col-7 col-7-sm">
                    <input type="checkbox" class="rememberMe"  name="rememberMe" id="loginRemeberMe">
                    <label for="loginRemeberMe" class="rememberMeBtn font-13">Remember Me</label>
                    </div>
                    <button type="submit" class="col-4 col-4-sm backgroundb shadowhover" id="submit"  name="submit" ><span class="material-icons" id="subbtn">expand_less</span></button>
                </div>
            </form>
            <!-- buttons below -->
            <!--<button type="button" id="loginBut" class="buttons">Log In</button>
            <button type="button" id="signUpbut" class="buttons">Sign Up</button>
            <button type="button" id="forPassbut" class="buttons">Forgot Password</button>-->
        </div>

        <!-- includin the javascript file for singup -->
        <script src="admin/javascript/login.js"></script>

    </div>


<?php
    //including footer
    include_once 'includes/footer.php';

?>