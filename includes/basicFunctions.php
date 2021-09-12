<?php 

//Some Global Variables
$databaseName = "blueCub";
$userInfoTable = "userInfo";
$userSecurityInfoTable = "userSecurityInfo";
$followInfoTable = "followInfo";
$postInfoTable = 'postInfo';
$postActivityTable = "postActivity";
$postTotalActivityTable = "postActivityTable";


//path to upload files
$postImage = "../assets/";

class basicFunctions{

    protected static $stringPattern = "/^[\w!@#$%^&*()~]*$/";
    protected static $emailPattern = "/[\w\.]+@[\w]+\.[\w]/";
    protected static $passswordPattern = "/^[\w!@#$%^&*()\.]+$/";
    protected static $numberpattern = "/^[0-9\+\-]+$/";
    protected static $passwordHashers = ['sha256', 'sha1', 'md5'];

    public static function escape($data){
        return htmlentities($data);
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
    public static function validateImage($fileName){

        $totalFiles = count($_FILES[$fileName]['tmp_name']);
        //initialize the error array
        $errorArray = array();

        for($i=0; $i<$totalFiles; $i++){

            $target_file =  basename($_FILES[$fileName]["name"][$i]);
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
            // Check if image file is a actual image or fake image

            $check = getimagesize($_FILES[$fileName]["tmp_name"][$i]);
            if($check == false) {
                $errorArray['error'] = "Not an Image";
                return $errorArray;
            } 
            // Check file size
            if ($_FILES[$fileName]["size"][$i] > 50000000) {
                $errorArray['error'] = "Max size of file is 50MB";
                return $errorArray;
            }
            
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                $errorArray['error'] = 'Wrong extension';
                return $errorArray;
            }
            
        }

        return true;

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