<?php 

    require_once 'includes/signUp.php';
    $monthsArray = array(
        'Jan' => '1',
        'Feb' => '2',
        'Mar' => '3',
        'Apr' => '4',
        'May' => '5',
        'Jun' => '6',
        'Jul' => '7',
        'Aug' => '8',
        'Sep' => '9',
        'Oct' => '10',
        'Nov' => '11',
        'Dec' => '12',
    );

    $yearArray = array();
    $currYear = date("Y");

    //intializing the field values
    $firstName = "";
    $lastName = "";
    $email = "";
    $DOB_D = "";
    $DOB_M = "";
    $DOB_Y = "";

    //initializing error array
    $errorArray = array();

    if(isset($_POST['submit'])){

        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];

        $DOB_D = $_POST['DOB_D'];
        $DOB_M = $_POST['DOB_M'];
        $DOB_Y = $_POST['DOB_Y'];

        $infoArray = array();
        $infoArray['firstName'] = $firstName;
        $infoArray['lastName'] = $lastName;
        $infoArray['email'] = $email;

        $infoArray['DOB_D'] = $DOB_D;
        $infoArray['DOB_M'] = $DOB_M;
        $infoArray['DOB_Y'] = $DOB_Y;

        $signUpObject = new signUp();
        $signUpObject->setInfoArray($infoArray);
        $status = $signUpObject->validate();
        if(is_array($status)){
            $errorArray = $status;
        }
        else{
            session_start();
            $_SESSION['signUpObject'] = $signUpObject;
            unset($infoArray);
            header("location: signup2.php");
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
        <div class="col-6 hidden-sm" id="picturesu"></div><!-- check for how to mak e0 coloumns when sm or add own classes-->
        <div class="col-6 col-12-sm"  id="formsu">
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
            <form class="container" id="formSignUp" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post" name="signUp1">

                <?php 

                    if(isset($errorArray['firstNameError']) or isset($errorArray['lastNameError'])){
                        echo '<div class="row error">';
                        if(isset($errorArray['lastNameError'])){
                            echo '<div class="col-12 col-12-sm colerror errorStyle">&#9888;'.$errorArray['lastNameError'].'</div>';
                        }
                        else{
                            echo '<div class="col-12 col-12-sm colerror errorStyle">&#9888;'.$errorArray['firstNameError'].'</div>';
                        }
                        echo '</div>';
                    }
                
                ?>

                <div class="row">
                    <input type="text" class="col-6 col-6-sm input" id="firstName" name="firstName" value= "<?php echo "$firstName" ?>" placeholder="First Name" required>
                    <input type="text" class="col-6 col-6-sm input" id="lastName" name="lastName" value= '<?php echo "$lastName" ?>' placeholder="Last Name" required>
                </div>
                
                <?php 
                
                    if(isset($errorArray['emailError'])){
                        echo '<div class="row error">
                                <div class="col-12 col-12-sm colerror">&#9888;'.$errorArray['emailError'].'</div>
                            </div>';
                    }

                ?>
    
                <div class="row">
                    <input type="email" class="col-12 col-12-sm input" id="email" name="email" value= '<?php echo "$email" ?>' placeholder="Email" required>
                </div>

                <div class="row">
                    <label class="col-12 col-12-sm  labels" id="dobsulabel" for="dobsu">When were you born</label>
                </div>


                <?php 
                
                    if(isset($errorArray['DOB_Error'])){
                        
                        echo '<div class="row error">
                                <div class="col-12 col-12-sm colerror">&#9888;'.$errorArray['DOB_Error'].'</div>
                            </div>';
                    }

                ?>

                <div class="row">
                    <select name="DOB_D" class="col-4 col-4-sm options" id="datesu">
                        <option value="-1">DD</option>

                        <?php 
                        
                            for($i = 1; $i<=31; $i++){

                                if($i == $DOB_D){
                                    echo '<option value="'.$i.'" selected>'.$i.'</option>';
                                    continue;
                                }
                                echo '<option value="'.$i.'">'.$i.'</option>';
                            }

                        ?>
                    </select>
                    <select name="DOB_M" class="col-4 col-4-sm options" id="monthsu">
                        <option value="-1">MM</option>

                        <?php
                        
                            foreach($monthsArray as $k=>$v){

                                if($v == $DOB_M){
                                    echo '<option value="'.$v.'" onclick="update(this)" selected>'.$k.'</option>';
                                    continue;
                                }
                                echo '<option value="'.$v.'" onclick="update(this)">'.$k.'</option>';
                            }
                        
                        ?>

                    </select>
                    <select name="DOB_Y" class="col-4 col-4-sm options" id="yearsu">

                        <option value="-1">YYYY</option>

                        <?php 
                        
                            for($i = $currYear-1; $i>=1940; $i--){
                                if($i == $DOB_Y){
                                    echo '<option value="'.$i.'" selected>'.$i.'</option>';
                                    continue;
                                }
                                echo '<option value="'.$i.'">'.$i.'</option>';
                            }

                        ?>

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
    <!-- includin the javascript file for singup -->
    <script src="admin/javascript/signup.js"></script>
<?php
    //including footer
    include_once 'includes/footer.php'

?>