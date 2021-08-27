<?php 

    require_once 'includes/signUp.php';

    //this variable decides the shadow/border color for each field i.e, error/normal
    $shadow = 'shadowhover';

    //initializing the singup object 
    $signUpObject = "";

    //intializing the gender array
    $genderArray = [
        'Male'=>0,
        'Female'=>1,
        'Others'=>2,
    ];

    //checking if the signUpObject exists
    session_start();
    if(isset($_SESSION['signUpObject'])){
        $signUpObject = $_SESSION['signUpObject'];
    }
    else{
        session_unset();
        session_destroy();
        header('location: signup1.php');
    }
    
    //initializing the field parameters
    $userName = "";
    $gender = "";
    $number = "";

    //intializing the error array
    $errorArray = array();

    if(isset($_POST['submit'])){

        $infoArray = $signUpObject->getInfoArray();

        $userName = $_POST['userName'];
        $gender = $_POST['gender'];
        if(isset($_POST['number'])){
            $number = $_POST['number'];
            $infoArray['number'] = $number;
        }

        $infoArray['userName'] = $userName;
        $infoArray['password'] = $_POST['password'];
        $infoArray['confirmPassword'] = $_POST['confirmPassword'];
        
        $signUpObject->setInfoArray($infoArray);
        $status = $signUpObject->validate();

        if(is_array($status)){
            $errorArray = $status;
        }
        else{
            $user_ID = $signUpObject->submitData();
            echo $user_ID;
            unset($infoArray);
            session_unset();
            session_destroy();
            // header('location: signup1.php');
        }

    }

?>

<?php 

    //title of the page(will be diplayed by includes/formHeader.php)
    $title = 'BlueCub-SignUp';
    
    //including the header
    include_once 'includes/formHeader.php';

?>

<body class="container" id="mainframe">
    
    <!-- This is the main login area-->
    <div class="row" id="loginRow">
        <div class="col-6 hidden-sm border backgroundb" id="picturesu"></div><!-- check for how to mak e0 coloumns when sm or add own classes-->
        <div class="col-6 col-12-sm border backgroundw"  id="formsu">
            <!-- top 3 bars -->
            <div class="bar" id="loginBar"></div>
            <div class="bar" id="signUpbar"></div>
            <div class="bar" id="forPassbar"></div>
            <!-- title and slogan -->
            <div id="textArea">
                <p id="title">BlueCub<?php include('includes/logo.php') ?></p>
                <p id="slogan">Flaunt Your Stocks</p>
            </div>
            <!-- main form-->
            <form class="container" id="formSignUp" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post" name="signUp2">

            <div class="row error">
                <div class="col-12 col-12-sm colerror error" id="userNameSignUpError">

                <?php 
                    
                    if(isset($errorArray['userNameError'])){
                        echo '&#9888; '.$errorArray['userNameError'];
                        $shadow = 'errorShadow';
                    }
                    else{
                        $shadow = 'shadowhover';
                    }

                ?>

                    </div>
                </div>

                <div class="row">
                    <input onfocusout = "isUserNameAvailable(this)" type="text" class="col-12 col-12-sm input <?php echo $shadow ?>" id="userNameSignUp" name="userName" placeholder="Username" value= '<?php echo "$userName" ?>' required>
                    <!-- name username is used twice check with vipul-->
                </div>

                <?php 
                
                if(isset($errorArray['passwordError'])){
                    echo '<div class="row error">
                            <div class="col-12 col-12-sm colerror error">&#9888;'.$errorArray['passwordError'].'</div>
                    </div>';
                    $shadow = 'errorShadow';
                }
                else{
                    $shadow = 'shadowhover';
                }

                ?>

                <div class="row">
                    <input type="password" class="col-6 col-6-sm input <?php echo $shadow ?>" id="passwordSignUp" name="password" placeholder="Password" required>
                    <!-- name password is used twice check with vipul-->
                    <input type="password" class="col-6 col-6-sm input <?php echo $shadow ?>"  id="confirmPasswordSignUp" name="confirmPassword" placeholder="Confirm Password" required>
                </div>

                <div class="row">
                    <label class="col-6 col-6-sm labels" id="gendersulabel" for="gender">Gender</label>
                    <label class="col-6 col-6-sm labels" id="gendersulabel" for="number">Number(Optional)</label>
                </div>
                
                <?php 
                
                    if(isset($errorArray['numberError'])){
                        $shadow = 'errorShadow';
                    }
                    else{
                        $shadow = 'shadowhover';
                    }
                
                ?>

                <div class="row">
                    <select name="gender" id="gender" class="col-6 col-6-sm options shadowhover">

                        <?php 
                        
                            foreach($genderArray as $k=>$v){

                                if($gender == $v){
                                    echo '<option value="'.$v.'" selected>'.$k.'</option>';
                                    continue;
                                }

                                echo '<option value="'.$v.'">'.$k.'</option>';
                            }

                        ?>
                        
                    </select> 
                    <input name="number" class="col-6 col-6-sm input <?php echo $shadow ?>" type="tel" value= '<?php echo "$number" ?>' placeholder="Number">
                </div>
                <div class="row">
                    <div class="col-5 col-5-sm"></div>
                    <button type="submit" class="col-4 col-4-sm backgroundb" id="submit" name="submit" ><span class="material-icons" id="subbtn">expand_less</span></button>
                </div>
            </form>
           
            <!-- buttons to toggle-->
            
        </div>
    </div>
    <!-- includin the javascript file for singup -->
    <script src="admin/javascript/signup.js"></script>
<?php
    //including footer
    include_once 'includes/footer.php'

?>