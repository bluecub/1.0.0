<?php

    require_once('CRUD.php');

    //Some Global Variables
    $userInfoTable = "userInfo";
    $userSecurityInfoTable = "userSecurityInfo";
    $userAccountStatusTable = "userAccountStatus";
    $databaseName = "blueCub";

    class userReadOnly{

        //protected userInfoArray (Holds all the user basic info)
        protected $userInfoArray;

        public function __construct($user_ID){
            
            //take the global variables
            global $userInfoTable;
            global $databaseName;

            //conditions array for mysql statements
            $condition = array('user_ID'=>$user_ID);

            //initialize the userInfo array
            $this->userInfoArray = array('user_ID'=>'', 'userName'=>'', 'firstName'=>'', 'lastName'=>'', 'DOB'=>'', 'email'=>'', 'number'=>'', 'profilePicture'=>'', 'about'=>'', 'joinedDate'=>'', 'lastActive'=>'', 'lastSeenVisible'=>'');

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

    class userWriteOnly{

        //protected userInfoArray (Holds all the user basic info)
        protected $userInfoArray;

        //conditions for mysql statements
        protected $condition;

        public function __construct(userReadOnly $user){
            
            $this->userInfoArray = $user->getUserInfoArray();

        }

        //set the component you want to change
        public function set($component, $value){
            $this->userInfoArray[$component] = $value;
        }

        public function update(){

            //take the global variables
            global $userInfoTable;
            global $databaseName;

            //conditions array for mysql statements
            $condition = array('user_ID'=>$this->userInfoArray['user_ID']);

            //update data in the data base using query and properties
            $query = new query($databaseName);

            $query->updateData($userInfoTable, $this->userInfoArray, $condition);

            unset($query);

        }

    }

?>