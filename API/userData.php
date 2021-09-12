<?php 

    require_once '../includes/profile.php';
    require_once '../includes/basicFunctions.php';

    if(isset($_GET['fn'])){
        if($_GET['fn'] == 'user_ID'){
            session_start();
            if(basicFunctions::isLoggedIn()){
                echo $_SESSION['userObject']->get('user_ID');
            }
            else{
                echo 0;
            }
        }
    
        else if($_GET['fn'] == 'userData'){

            $dataNeeded = $_GET['dataNeeded'];
            $user_ID = $_GET['user_ID'];
            $profile = new profileObject($user_ID);
            $dataNeeded = explode(",", $dataNeeded);
            $result = array();
            foreach($dataNeeded as $component){
                $result[$component] = $profile->get($component);
            }
            print_r(json_encode($result));
            unset($profile);
            
        }

    }



?>