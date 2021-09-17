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
    
            $condition = array('user_ID'=>[12, 26, 12, 22, 9]);
            $orderBy = 'updatedAt';
            $result = $query->getDataWithOr($postInfoTable, '*', $condition, $orderBy, "DESC", $limit, $offset);
    
            if($result){
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
                    echo $fileExtension['error'];
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
                                echo $errorArray['error'];
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
                                echo $errorArray['error'];
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
                echo $errorArray['error'];
                die();
            }
            $result = $query->addData($postInfoTable, $postData);
            if($result){
                echo "Some Thing Went wrong From Server Side!!";
                die();
            }
            echo true;

        }
    }
    unset($query);
?>
