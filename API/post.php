<?php

    require_once('/home/bipoool/Desktop/PHP_Projects/1.0.0/includes/CRUD.php');
    require_once('/home/bipoool/Desktop/PHP_Projects/1.0.0/includes/basicFunctions.php');
    require_once('/home/bipoool/Desktop/PHP_Projects/1.0.0/includes/profile.php');
    
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
        echo $prepQuery;
    }



?>