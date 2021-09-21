<?php 

    require_once '../includes/basicFunctions.php';
    require_once '../includes/CRUD.php';

    $query = new query($databaseName);
    if($_GET['fn'] == 'get'){

        $post_ID = $_GET['post_ID'];
        $condition = array('post_ID'=>$post_ID);
        $result = "";
        if(isset($_GET['get'])){
            if($_GET['get']== 'comment'){
                $condition['activityType'] = 1;
                $limit = $_GET['limit'];
                $offset = $_GET['offset'];
                $result = $query->getData($postActivityTable, "*", $condition, 'updatedAt', 'DESC', $limit, $offset);
                $count = count($result);
                for($i=0; $i<$count; $i++){
                    $result[$i]['userName']= $query->getData($userInfoTable, 'userName', ['user_ID'=>$result[$i]['user_ID']])[0][0];
                }
                
            }
        }

        print_r(json_encode($result));

    }
    else if($_GET['fn'] == 'set'){
        $commentInfo = array();
        $commentInfo['user_ID'] = $_POST['user_ID'];
        $commentInfo['post_ID'] = $_POST['post_ID'];
        $commentInfo['activityType'] = $_POST['activityType'];

        if($commentInfo['activityType'] == 1){
            $commentInfo['commentText'] = basicFunctions::escape($_POST['commentText']);
        }
        
        $result = $query->addData($postActivityTable, $commentInfo);

        if(!isset($result['error'])){
            echo "1";
        }
        else{
            print_r($result);
        }
    }
    unset($query);
    

?>