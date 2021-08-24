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
            <form class="container" id="formSignUp" action="" method="post" name="signUp1">
                <div class="row">
                <input type="text" class="col-6 col-6-sm input" id="firstName" name="firstName" placeholder="First Name" required>
                <input type="text" class="col-6 col-6-sm input" id="lastName" name="lastName" placeholder="Last Name" required>
                </div>
                <div class="row">
                <input type="email" class="col-12 col-12-sm input" id="email" name="email" placeholder="Email" required>
                </div>
                <div class="row">
                    <label class="col-12 col-12-sm  labels" id="dobsulabel" for="dobsu">When were you born</label>
                </div>
                <div class="row">
                    <select name="dobsu" class="col-4 col-4-sm selectField" id="datesu">
                        <option value="DD">DD</option>
                    </select>
                    <select name="dobsu" class="col-4 col-4-sm selectField" id="monthsu">
                        <option value="MM">MM</option>
                    </select>
                    <select name="dobsu" class="col-4 col-4-sm selectField" id="monthsu">
                        <option value="YYYY">YYYY</option>
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