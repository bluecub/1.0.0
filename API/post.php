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
        $profile = new profileObject($user_ID);

        $followingList = [1,2,3,4,5];

        $prepQuery = 'SELECT user_ID, text, images, videos, createdAt, updatedAt from ' . $followInfoTable . ' where ';

        $i = 0;
        $count = count($followingList);
        foreach($followingList as $follower_ID){

            if($count-1 != $i){
                $prepQuery .= 'user_ID=' . $follower_ID . ' or ';
            }
            else{
                $prepQuery .= 'user_ID=' . $follower_ID;
            }
            $i++;

        }
        $prepQuery .= ' limit 20 offset' . $offset; 
        echo $prepQuery;
    }

?>
