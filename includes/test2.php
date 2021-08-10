<?php 

    include("profile.php");
    session_start();
    echo "<pre>";
    $user = $_SESSION['user'];
    print_r($user);

    $userUpdate = new userWriteOnly($user);

    $userUpdate->set('userName', 'vipulgupta');
    $userUpdate->update();

?>