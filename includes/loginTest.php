<?php 

    include 'login.php';
    if(isset($_POST['submit'])){

        $credentials = array();
        $credentials['userName'] = $_POST['userName'];
        $credentials['password'] = $_POST['password'];
        $loginObject = new login($credentials);

        $status = $loginObject->checkAuthentication();
        print_r($status);

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
    
    <form action="" method="post">

        <input type="text" name="userName" id="" placeholder="userName">
        <input type="password" name="password" id="" placeholder="password">
        <input type="submit" value="submit" name="submit">

    </form>


</body>
</html>