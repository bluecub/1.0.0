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

<body class="" id="mainframe">
    
    <!-- This is the main login area-->
    <div class="row" id="loginRow">
        <div class="col-6 col-1-sm" id="picture"></div><!-- check for how to mak e0 coloumns when sm or add own classes-->
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
            <!-- main form-->
            <input type="text" class="input" placeholder="Username" id="username">
            <input type="password" class="input" placeholder="Password" id="password">

            <div class="multiements">

                <input type="checkbox" id="rememberMe" value="rememberMe"> 
                <label for="rememberMe" id="rememberMelabel">Remember Me</label>
                <button type="button" class="submit" id="submitli"><span class="material-icons" id="subbtn">expand_less</span></button>

            </div>
            
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