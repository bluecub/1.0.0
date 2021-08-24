<?php 

    require_once('includes/signUp.php');

    $errorArray = array();
    if(isset($_POST['submit'])){

        $infoToAdd = array();

        $infoToAdd['userName'] = $_POST['userName'];
        $infoToAdd['firstName'] = $_POST['firstName'];
        $infoToAdd['lastName'] = $_POST['lastName'];
        $infoToAdd['email'] = $_POST['email'];
        $infoToAdd['password'] = $_POST['password'];
        $infoToAdd['confirmPassword'] = $_POST['confirmPassword'];

        //for now add a temp date of birth
        $infoToAdd['DOB'] = date('Y-m-d');

        $signUpObject = new signUp();
        $signUpObject->setInfoArray($infoToAdd);
        $status = $signUpObject->submitData();

        if(!is_array($status)){
            echo "success!!";
        }
        else{
            echo "failed";
        }

    }

?>

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
        <div class="col-6 col-11-sm" id="formsu">
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
            <form action="" method="post">
                <input type="text" class="input" id="firstName" placeholder="First Name" name="firstName" required>
                <input type="text" class="input" id="lastName" placeholder="Last Name" name="lastName" required>
                <input type="text" class="input" id="usernamesignup" placeholder="Username" name="userName" required>
                <input type="email" class="input" id="emailsignup" placeholder="Email" name="email" required>
                <input type="password" class="input" id="passwordsignup" placeholder="Password" name="password" required>
                <input type="password" class="input" id="confirmpassword" placeholder="Confirm Password" name="confirmPassword" required>
                <button type="submit" class="submit" name="submit" id="submitsu"><span class="material-icons" id="subbtn">expand_less</span></button>
            </form>
           
            <!-- buttons to toggle-->
            
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
                <p id="copyright"> &copy; <?php echo date('Y') ?> BlueCub</p>
            </div>
            <div class="col-1"></div>
        </div>
    </footer>
</body>
</html>