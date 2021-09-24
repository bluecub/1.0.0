<?php 

//Some Global Variables
$databaseName = "blueCub";
$userInfoTable = "userInfo";
$userSecurityInfoTable = "userSecurityInfo";
$followInfoTable = "followInfo";
$postInfoTable = 'postInfo';
$postActivityTable = "postActivity";
$activityOnActivityTable = "activityOnActivity";


class basicFunctions{

    protected static $stringPattern = "/^[\w!@#$%^&*()~]*$/";
    protected static $emailPattern = "/[\w\.]+@[\w]+\.[\w]/";
    protected static $passswordPattern = "/^[\w!@#$%^&*()\.]+$/";
    protected static $numberpattern = "/^[0-9\+\-]+$/";
    protected static $passwordHashers = ['sha256', 'sha1', 'md5'];

    public static function escape($data){
        return addslashes(htmlspecialchars($data));
    }

    public static function validateString($data){
        if($data == "")return true;
        return preg_match(self::$stringPattern, $data);
    }

    public static function validateEmail($data){
        if($data == "")return true;
        return preg_match(self::$emailPattern, $data);
    }
    public static function validateNumber($data){
        if($data == "")return true;
        return preg_match(self::$numberpattern, $data);
    }
    public static function hashPassword($data){
       foreach(self::$passwordHashers as $algo){
           $data = hash($algo, $data);
       }
       return $data;
    }
    public static function verifyPassword($hashedPassword, $password, $remembered = false){

        if(!$remembered){
            $password = self::hashPassword($password);
        }
        
        if($password === $hashedPassword){
            return true;
        };
        return false;
    }
    //function to validate an image file
    public static function validateFile($fileName){

        $totalFiles = count($_FILES[$fileName]['tmp_name']);
        
        //initialize the error array
        $errorArray = array();
        $fileType = array();
        if($totalFiles>10){
            $errorArray['error'] = "Max 10 Files are allowed!!";
            return $errorArray;
        }
        for($i=0; $i<$totalFiles; $i++){

            $target_file = basename($_FILES[$fileName]["name"][$i]);
            $fileType[$i] = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
            // Check if image file is a actual image or fake image

            if($fileType[$i] != "mp4"){
                $check = getimagesize($_FILES[$fileName]["tmp_name"][$i]);
                if($check == false) {
                    $errorArray['error'] = "Not an Image";
                    return $errorArray;
                } 
            }
            
            // Check file size
            if ($_FILES[$fileName]["size"][$i] > 100000000) {
                $errorArray['error'] = "Max size of file is 100MB";
                return $errorArray;
            }
            
            if($fileType[$i] != "jpg" && $fileType[$i] != "png" && $fileType[$i] != "jpeg" && $fileType[$i] != "gif" && $fileType[$i] != "mp4") {
                $errorArray['error'] = 'Wrong extension';
                return $errorArray;
            }
            
        }

        return $fileType;

    }

    //function to check if a file exists or not
    public static function exists($path){
        return file_exists($path);
    }

    //function to check if the user is logged in or not
    public static function isLoggedIn(){

        $status = session_status() === PHP_SESSION_ACTIVE ? true : false;
        
        if($status and isset($_SESSION['userObject'])){
            if(is_object($_SESSION['userObject'])){
                return true;
            }
        }

        return false;
    }

    public static function isRemembered(){
        if(isset($_COOKIE['userName']) && isset($_COOKIE['password'])){
            return true;
        }
        return false;
    }

}

?>