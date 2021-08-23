<?php 

    require_once('/home/bipoool/Desktop/PHP_Projects/1.0.0/includes/CRUD.php');
    require_once('/home/bipoool/Desktop/PHP_Projects/1.0.0/includes/basicFunctions.php');

    global $databaseName;
    global $userInfoTable;

    if(isset($_GET['userName'])){

        $userName = $_GET['userName'];
        if(basicFunctions::validateString($userName)){
            $userInfoArray['userName'] = basicFunctions::escape($userName);
        }
        else{
            echo "-1";
            die();
        }
        $query = new query($databaseName);
        $result = $query->getdata($userInfoTable, "user_ID", array("userName"=>$userName));
        if($result){
            echo '0';
        }else{
            echo '1';
        }
        
    }

?>