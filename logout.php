<?php 

if(isset($_COOKIE['userName'])){
    setcookie("userName", "", time()-3600);
}
if(isset($_COOKIE['password'])){
    setcookie('password', "". time()-3600);
}
session_start();
unset($_SESSION['userObject']);
session_unset();
session_destroy();

header("location: login.php");

