<?php 

include('signUp.php');

if($_POST['submit']){

    $dataToAdd = array();
    $dataToAdd['userName'] = $_POST['userName'];
    $dataToAdd['firstName'] = $_POST['firstName'];
    $dataToAdd['password'] = $_POST['password'];
    $dataToAdd['lastName'] = $_POST['lastName'];
    $dataToAdd['DOB'] = $_POST['DOB'];
    $dataToAdd['email'] = $_POST['email'];
    $dataToAdd['number'] = $_POST['number'];
    $dataToAdd['about'] = $_POST['about'];

    $signUpObject = new signUp();   
    $signUpObject->setInfoArray($dataToAdd);
    $status = $signUpObject->submitData();
    if(is_array($status)){
        print_r($status);
    }
    else print('done');
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
            <input type="date" name="DOB" placeholder="DOB"><br>
            <input type="text" name="email" placeholder="email"><br>
            <input type="text" name="number" placeholder="number"><br>
            <textarea name="about" placeholder="about"></textarea><br>
            <input type="submit" value="submit" name = 'submit'><br>

        </form>
    </div>

</body>
</html>



