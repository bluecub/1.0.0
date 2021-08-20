<?php 

include('signUp.php');

session_unset();
session_destroy();

if($_POST['submit']){

    $dataToAdd = array();
    $dataToAdd['userName'] = $_POST['userName'];
    $dataToAdd['firstName'] = $_POST['firstName'];
    $dataToAdd['password'] = $_POST['password'];
    $dataToAdd['lastName'] = $_POST['lastName'];

    $signUpObject = new signUp();   
    $signUpObject->setInfoArray($dataToAdd);
    session_start();
    $_SESSION['signUpObject'] = $signUpObject;
    header('location: test2.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <div>
        <form action="" method="post">

            <input type="text" name="userName" placeholder="userName"><br>
            <input type="text" name="firstName" placeholder="firstName"><br>
            <input type="text" name="lastName" placeholder="lastName"><br>
            <input type="password" name="password" placeholder="password"><br>
            <input type="submit" value="submit" name = 'submit'><br>

        </form>
    </div>

</body>
</html>



