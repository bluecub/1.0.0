<?php

    require_once('CRUD.php');

    //Some Global Variables
    $databaseName = "blueCub";
    $userInfoTable = "userInfo";
    $userSecurityInfoTable = "userSecurityInfo";
    $userAccountStatusTable = "userAccountStatus";
    $followInfoTable = "followInfo";

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
        public static function verifyPassword($hashedPassword, $password){
            foreach(self::$passwordHashers as $algo){
                $password = hash($algo, $password);
            }
            if($password === $hashedPassword){
                return true;
            };
            return false;
        }

    }

    class userBaseObject{

        //protected userInfoArray (Holds all the user basic info)
        protected $userInfoArray;
        protected $user_ID;

        public function __construct($user_ID){
            
            //take the global variables
            global $userInfoTable;
            global $databaseName;

            //initialize the userInfo array
            $this->userInfoArray = array('user_ID'=>'', 'userName'=>'', 'firstName'=>'', 'lastName'=>'', 'DOB'=>'', 'email'=>'', 'number'=>'', 'profilePicture'=>'', 'about'=>'', 'lastActive'=>'', 'joinedDate'=>'', 'lastSeenVisible'=>'', 'isPrivate'=>'', 'isEnabled'=>'', 'isVerified'=>'');
            $this->user_ID = $user_ID;
            $condition = array('user_ID'=>$this->user_ID);

            //intialize the query object from include/CRUD.php (database Name = blueCub)
            $query = new query($databaseName);

            $allData = $query->getData($userInfoTable, "*", $condition);

            //check is data is recieved
            if(isset($this->userInfoArray)){

                //taking the first element of the array because of query returns array(array(allData))
                $allData = $allData[0];
                $counter = 0;

                foreach($this->userInfoArray as $k=>$v){
                    $this->userInfoArray[$k] = $allData[$counter];
                    $counter++;
                }
            }

            //delete the query object after use(Security purposes)
            unset($query);
            
        }

        //Get the component you want from userInfoArray
        public function get($component){
            return $this->userInfoArray[$component];
        }

        //Get full userInfo array
        public function getUserInfoArray(){
            return $this->userInfoArray;
        }

    }

    class userObject extends userBaseObject{

        protected $user_ID;

        public function __construct($user_ID){
            $this->user_ID = $user_ID;
            parent::__construct($user_ID);
        }

        //Get the component you want from userInfoArray
        public function set($component, $value){
            $this->userInfoArray[$component] = $value;
        }

        public function updateProfile(){

            //take the global variables
            global $userInfoTable;
            global $databaseName;

            //update data in the data base using query and properties
            $query = new query($databaseName);
            $condition = array('user_ID'=>$this->user_ID);
            $query->updateData($userInfoTable, $this->userInfoArray, $condition);

            unset($query);

        }

        public function getFollowingList(){

            //take the global variables
            global $userInfoTable;
            global $databaseName;

            //update data in the data base using query and properties
            $query = new query($databaseName);
            $condition = array('user_ID'=>$this->user_ID);
            $query->updateData($userInfoTable, $this->userInfoArray, $condition);

            unset($query);

        }

        public function getAllRequests(){

            global $databaseName;
            global $followInfoTable;
            $query = new query($databaseName);

            $condition = array('following_ID'=>$this->user_ID, 'status'=>'0');

            $result = $query->getData($followInfoTable, 'follower_ID', $condition);

            unset($query);
            return $result;

        }
        
    }

    class profileObject extends userBaseObject{

        protected $user_ID;
        protected $values;

        public function __construct($user_ID){
            $this->user_ID = $user_ID;
            $this->values = array('follower_ID'=>'', 'following_ID'=>'', 'status'=>'0');
            parent::__construct($user_ID);
        }

        public function followRequest($sourceUserId){

            global $databaseName;
            global $followInfoTable;

            $this->values['follower_ID'] = $sourceUserId;
            $this->values['following_ID'] = $this->user_ID;

            $query = new query($databaseName);
            $query->addData($followInfoTable, $this->values);
            unset($query);

        }

        public function unFollow($sourceUserId){

            global $databaseName;
            global $followInfoTable;

            $condition = array('follower_ID'=>$sourceUserId, 'following_ID'=>$this->user_ID);

            $query = new query($databaseName);
            $query->deleteData($followInfoTable, $condition);
            unset($query);

        }

        public function isFollowedByYou($user_ID){

            global $databaseName;
            global $followInfoTable;
            $query = new query($databaseName);

            $condition = array();
            $condition['follower_ID']=$user_ID;
            $condition['following_ID'] = $this->user_ID;

            $status = $query->getData($followInfoTable, 'status', $condition);
            unset($query);

            if($status[0][0] == '1')return true;
            return false;

        }

        public function isFollowingYou($user_ID){

            global $databaseName;
            global $followInfoTable;
            $query = new query($databaseName);

            $condition = array();
            $condition['following_ID']=$user_ID;
            $condition['follower_ID'] = $this->user_ID;

            $status = $query->getData($followInfoTable, 'status', $condition);

            unset($query);
            
            if($status[0][0] == '1')return true;
            return false;
        }

    }

?>