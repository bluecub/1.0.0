<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlueCub-SignUp</title>

    <link href="admin\stylesheet\login.css" rel="stylesheet" type="text/css">
    <link href="admin\stylesheet\main.css" rel="stylesheet" type="text/css">
    <link href="admin\stylesheet\simpleGrid\simple-grid.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body class="container" id="mainframe">
    
    <!-- This is the main login area-->
    <div class="row" id="loginRow">
        <div class="col-6 col-1-sm" id="picturesu"></div><!-- check for how to mak e0 coloumns when sm or add own classes-->
        <div class="col-6 col-11-sm"  id="formsu">
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
            <form class="container" id="formSignUp" action="" method="post" name="signUp2">
                <div class="row">
                    <input type="text" class="col-12 col-12-sm input" id="userNameSignUp" name="userName" placeholder="Username"required>
                    <!-- name username is used twice check with vipul-->
                </div>
                <div class="row">
                    <input type="password" class="col-6 col-6-sm input" id="passwordSignUp" name="password" placeholder="Password" required>
                    <!-- name password is used twice check with vipul-->
                    <input type="password" class="col-6 col-6-sm input"  id="confirmPasswordSignUp" name="confirmPassword" placeholder="Confirm Password" required>
                </div>
                <div class="row">
                    <label class="col-6 col-6-sm labels" id="gendersulabel" for="gender">Gender</label>
                    <label class="col-6 col-6-sm labels" id="gendersulabel" for="gender">Experience</label>
                </div>
                <div class="row">
                    <select name="gender" class="col-6 col-6-sm options">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="others">Others</option>
                    </select> 
                    <select name="experience" class="col-6 col-6-sm options">
                        <option value="none">No Experience</option>
                        <option value="little">Intermediate</option>
                        <option value="adnavce">Advanced</option>
                        <option value="god">Stocks are life</option>
                    </select> 
                </div>
                <div class="row">
                    <div class="col-5 col-5-sm"></div>
                    <button type="submit" class="col-4 col-4-sm" id="submit"  name="submit" ><span class="material-icons" id="subbtn">expand_less</span></button>
                </div>
            </form>
           
            <!-- buttons to toggle-->
            
        </div>
    </div>

<?php
    //including footer
    include_once 'includes/footer.php'

?>