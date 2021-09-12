<?php

    require_once('../includes/CRUD.php');
    require_once('../includes/basicFunctions.php');
    require_once('../includes/profile.php');
    
    global $userInfoTable;
    global $databaseName;
    global $postInfoTable;

    $query = new query($databaseName);

    if(isset($_GET['user_ID'])){
        
        $user_ID = $_GET['user_ID'];
        $offset = $_GET['offset'];
        $limit = $_GET['limit'];

        $condition = array('user_ID'=>[12, 26, 12, 22]);
        $orderBy = 'updatedAt';
        $result = $query->getDataWithOr($postInfoTable, '*', $condition, $orderBy, "DESC", $limit, $offset);

        if($result){
            print_r(json_encode($result));
        }
        else{
            echo "0";
        }
        
    }

?>
