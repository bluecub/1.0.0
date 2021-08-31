<?php 

//Some Global Variables
$databaseName = "blueCub";
$userInfoTable = "userInfo";
$userSecurityInfoTable = "userSecurityInfo";
$userAccountStatusTable = "userAccountStatus";
$followInfoTable = "followInfo";
$postInfoTable = 'postInfo';

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