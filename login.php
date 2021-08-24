<?php

    require_once 'includes/basicFunctions.php';
    require_once 'includes/CRUD.php';
    require_once 'includes/login.php';

    $errorArray = array();
    if(isset($_POST['submit'])){

        $credentials['userName'] = $_POST['userName'];
        $credentials['password'] = $_POST['password'];

        $loginObject = new login($credentials);
        $status = $loginObject->checkAuthentication();

        if(is_array($status)){
            $errorArray = $status;
        }
        else{
            echo "success";
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlueCub-Login</title>

    <link href="admin\stylesheet\login.css" rel="stylesheet" type="text/css">
    <link href="admin\stylesheet\main.css" rel="stylesheet" type="text/css">
    <link href="admin\stylesheet\simpleGrid\simple-grid.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body class="container" id="mainframe">
    
    <!-- This is the main login area-->
    <div class="row" id="loginRow">
        <div class="col-6 col-1-sm" id="picture"></div><!-- check for how to make 0 coloumns when sm or add own classes-->
        <div class="col-6 col-11-sm" id="form">
            <!-- top 3 bars -->
            <div class="bar" id="loginBar"></div>
            <div class="bar" id="signUpbar"></div>
            <div class="bar" id="forPassbar"></div>
            <!-- title and slogan -->
            <div id="textArea">
                <p id="title">BlueCub</p>
                <p id="slogan">Flaunt Your Stocks</p>
            </div>
            <div class="error">
                <?php
                 
                    if($errorArray){
                        echo "&#9888; ".$errorArray['error'];
                    }
                    
                ?>
            </div>
            <!-- main form-->
            <form class="container" id="formLogIn" action="" method="post" name="logIn">
                <div class="row">
                    <div class="col-1 col-1-sm"></div>
                    <input type="text" class="col-10 col-10-sm input" id="userNameLogIn" placeholder="Username" name="userName" required>
                </div>
                <div class="row">
                    <div class="col-1 col-1-sm"></div>
                    <input type="password" class="col-10 col-10-sm input" id="passwordLogIn" placeholder="Password" name="password" required>
                </div>
                <div class="row">
                    <div class="col-1 col-1-sm"></div>
                    <div class="col-7 col-7-sm">
                    <input type="checkbox" class="rememberMe"  name="rememberMe">
                    <label for="rememberMe" class="rememberMeBtn">Remember Me</label>
                    </div>
                    <button type="submit" class="col-4 col-4-sm" id="submit"  name="submit" ><span class="material-icons" id="subbtn">expand_less</span></button>
                </div>
            </form>
            <!-- buttons below -->
            <!--<button type="button" id="loginBut" class="buttons">Log In</button>
            <button type="button" id="signUpbut" class="buttons">Sign Up</button>
            <button type="button" id="forPassbut" class="buttons">Forgot Password</button>-->
        </div>
    </div>
    <!-- footer-->
    <footer>
        <div class="row" id="footer">
            <div class="col-1"></div>
            <div class="col-10" id="footContent">
                <a href="a.html" class="footLinks">About</a>
                <a href="a.html" class="footLinks">Creators</a>
                <a href="a.html" class="footLinks">Help</a>
                <a href="a.html" class="footLinks">Privacy Policy</a>
                <a href="a.html" class="footLinks">Terms</a>
                <a href="a.html" class="footLinks">Top Accounts</a><br>
                <p id="copyright"> &copy; 2021 BlueCub</p>
            </div>
            <div class="col-1"></div>
        </div>
    </footer>
</body>
</html>