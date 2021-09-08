<?php 

    require_once '../includes/profile.php';
    require_once '../includes/basicFunctions.php';
    session_start();
    if(basicFunctions::isLoggedIn()){
        echo $_SESSION['userObject']->get('user_ID');
    }
    else{
        echo 0;
    }

?>