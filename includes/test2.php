<?php 

    include("profile.php");
    session_start();
    echo "<pre>";
    $user = $_SESSION['user'];
    print_r($user);


    if(isset($_POST["hello"])){
        $user->set('about', '');
        $user->updateProfile();
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
        <input type="submit" value="submit" name = "hello">
    </form>

</body>
</html>


