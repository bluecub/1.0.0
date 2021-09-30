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
        if($_GET['fn'] == "get"){
            $offset = $_GET['offset'];
            $limit = $_GET['limit'];
    
            $condition = array('user_ID'=>[12, 27, 12, 22, 9]);
            $orderBy = 'updatedAt';
            $result = $query->getDataWithOr($postInfoTable, '*', $condition, $orderBy, "DESC", $limit, $offset);
    
            if($result){
                $len = count($result);
                for($i=0; $i<$len; $i++){

                    $post_ID = $result[$i]['post_ID'];
                    $author_ID = $result[$i]['user_ID'];

                    $likedStatus = $query->getData($postActivityTable, "*", ['user_ID'=>$user_ID, 'post_ID'=>$post_ID, 'activityType'=>0]);
                    
                    if($likedStatus){
                        $result[$i]['likedStatus'] = 1;
                    }

                    $userName = $query->getData($userInfoTable, "userName", ['user_ID'=>$author_ID]);
                    if($userName){
                        $result[$i]['userName'] = $userName[0]['userName'];
                    }

                }
                print_r(json_encode($result));
            }
            else{
                echo "0";
            }
        }

        else if($_GET['fn'] == 'set'){
                        
            $errorArray = array();

            $imgPath = "../assets/postImg/";
            $vidPath = "../assets/postVid/";
            $targetFile = $imgPath;

            $visibility = $_POST['visibility'];

            $imagesFilePath = array();
            $videosFilePath = array();
            $fileName = "";
            $caption = "";

            if($_GET['fileName'] != ""){
                $fileName = $_GET['fileName'];
                $fileExtension = basicFunctions::validateFile($fileName);

                // If there was any error $fileExtension is error
                if(isset($fileExtension['error'])){
                    print_r(json_encode($fileExtension));
                    die();
                }
                else{
                    $len = count($fileExtension);

                    for($i=0; $i<$len; $i++){
                        $tmpName = $user_ID . "_". time()."_" . $i.".".$fileExtension[$i];
                        if($fileExtension[$i] == "mp4"){
                            $targetFile = $vidPath . $tmpName;
                            if(move_uploaded_file($_FILES[$fileName]["tmp_name"][$i], $targetFile)){
                                $videosFilePath[] = $tmpName;
                            }
                            else{
                                $errorArray["error"] = "Somwthing Went Wrong...";
                                print_r(json_encode($errorArray));
                                die();
                            }
                        }
                        else{
                            $targetFile = $imgPath . $tmpName;
                            if(move_uploaded_file($_FILES[$fileName]["tmp_name"][$i], $targetFile)){
                                $imagesFilePath[] = $tmpName;
                            }
                            else{
                                $errorArray["error"] = "Somwthing Went Wrong...";
                                print_r(json_encode($errorArray));
                                die();
                            }
                        }
                        $targetFile .=  $tmpName;
                        
                    }

                }
            }
            $imagesFilePath = implode(",",$imagesFilePath);
            $videosFilePath = implode(",",$videosFilePath);
            $postData = array();
            $postData['user_ID'] = $user_ID;
            $postData['type'] = 0;
            $postData['visibility'] = $visibility;
            $postData["images"] = $imagesFilePath;
            $postData["videos"] = $videosFilePath;

            if($_POST['caption'] != ""){
                $caption = basicFunctions::escape($_POST['caption']);
                $postData['text'] = $caption;
            }
            
            if($caption == "" and $fileName == ""){
                $errorArray["error"] = "Enter something...";
                print_r(json_encode($errorArray));
                die();
            }
            $result = $query->addData($postInfoTable, $postData);
            print_r(json_encode($result));

        }
    }
    unset($query);
?>
