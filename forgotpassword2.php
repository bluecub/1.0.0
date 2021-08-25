<?php 

    //title of the page(will be diplayed by includes/formHeader.php)
    $title = 'BlueCub-ForgotPassword';
    
    //including the header
    include_once 'includes/formHeader.php';

?>

<body class="container" id="mainframe">
    
    <!-- This is the main login area-->
    <div class="row" id="loginRow">
        <div class="col-6 hidden-sm" id="picture"></div><!-- check for how to mak e0 coloumns when sm or add own classes-->
        <div class="col-6 col-12-sm"  id="form">
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
            <form class="container" id="formForPass" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post" name="forgotPassword">
                <div class="row">
                    <input type="password" class="col-12 col-12-sm input" id="passwordForPass" name="passwordForPass" placeholder="New Password"required>
                </div>
                <div class="row">
                    <input type="password" class="col-12 col-12-sm input" id="confirmPasswordForPas" name="confirmPasswordForPass" placeholder="Confirm Password" required>
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