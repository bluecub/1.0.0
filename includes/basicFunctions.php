<?php 

//Some Global Variables
$databaseName = "blueCub";
$userInfoTable = "userInfo";
$userSecurityInfoTable = "userSecurityInfo";
$userAccountStatusTable = "userAccountStatus";
$followInfoTable = "followInfo";
$postInfoTable = 'postInfo';

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
    public static function validatePhoto($fileName){

        $target_dir = "../assets/postImages/";
        $target_file = $target_dir . basename($_FILES[$fileName]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES[$fileName]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES[$fileName]["size"] > 50000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" && $imageFileType != "heic" ) {
            echo "Sorry, only JPG, JPEG, PNG, heic & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } 
        else {
            if (move_uploaded_file($_FILES[$fileName]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars( basename( $_FILES[$fileName]["name"])). " has been uploaded.";
            }else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        

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