<?php 

    include('profile.php');
    $user = new userObject(1);
    //print_r($user->getUserInfoArray());
    session_start();
    $_SESSION["user"] = $user;

    $password = 'hello';
    $data = basicFunctions::hashPassword('helo');
    echo basicFunctions::verifyPassword($data, $password);

?>