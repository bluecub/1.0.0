<?php 

include('signUp.php');


if($_POST['submit']){

    session_start();
    $signUpObject = $_SESSION['signUpObject'];
    $dataToAdd = $signUpObject->getInfoArray();
    $dataToAdd['DOB'] = $_POST['DOB'];
    $dataToAdd['email'] = $_POST['email'];
    $dataToAdd['number'] = $_POST['number'];
    $dataToAdd['about'] = $_POST['about'];
    $signUpObject->setInfoArray($dataToAdd);
    $signUpObject->submitData();

    session_unset();
    session_destroy();

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

        <input type="date" name="DOB" placeholder="DOB"><br>
            <input type="text" name="email" placeholder="email"><br>
            <input type="text" name="number" placeholder="number"><br>
            <textarea name="about" placeholder="about"></textarea><br>
            <input type="submit" value="submit" name = 'submit'><br>
        </form>
    </div>

</body>
</html>

