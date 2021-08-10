<?php 

    include('profile.php');
    $user = new userObject(1);
    print_r($user->getUserInfoArray());
    session_start();
    $_SESSION["user"] = $user;

?>