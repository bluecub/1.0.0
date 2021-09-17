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

        else if($_GET['fn'] == 'set'){
                        
            $errorArray = array();

            $targetFile = $user_ID ."_". time();
            $path = "assets/postImg";

            $postData = array();
            $postData['user_ID'] = $user_ID;

            $fileName = "";
            $caption = "";

            $fileExtension = "";

            if($_GET['fileName'] != ""){
                $fileName = $_GET['fileName'];
                $fileExtension = basicFunctions::validateImage($fileName, $path);
                if(is_array($fileExtension)){
                    echo $fileExtension['error'];
                    die();
                }
                else{
                    // If there is no error $fileExtension is file extension
                    $targetFile .= $fileExtension;
                    if(basicFunctions::exists($targetFile)){
                        $errorArray["error"] = "Please Wait...";
                        echo $errorArray['error'];
                        die();
                    }
                    else{
                        if(move_uploaded_file($_FILES[$fileName]["tmp_name"], $target_file)){
                            
                        }
                    }
                }
            }
            if($_POST['caption'] != ""){
                $caption = basicFunctions::escape($_POST['caption']);
            }
            
            if($caption == "" and $fileName == ""){
                $errorArray["error"] = "Enter something...";
                echo $errorArray['error'];
                die();
            }
            
        
            //$query->addData($postInfoTable, );

        }
    }
    unset($query);
?>
