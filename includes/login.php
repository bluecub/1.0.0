<?php 

    require_once('profile.php');

    class login{

        protected $credentials;
        protected $errorArray;

        public function __construct($credentials){
            $this->errorArray = array();
            $this->credentials = $credentials;
        }

        public function getCredentials(){
            return $this->credentials;
        }

        public function setCredentials($credentials){
            $this->credentials = $credentials;
        }

        public function checkAuthentication($remembered = false){

            //take the database name and table names from global variables
            global $databaseName;
            global $userInfoTable;
            global $userSecurityInfoTable;
            
            //getting userName and Password
            $userName = $this->credentials['userName'];
            $password = $this->credentials['password'];

            //validating user name
            if(basicFunctions::validateString($userName)){
                $userInfoArray['userName'] = basicFunctions::escape($userName);
            }
            else{
                $this->errorArray['error'] = 'User Name is Not valid';
                return $this->errorArray;
            }

            $query = new query($databaseName);

            //checking if the user exists
            $condition = array('userName'=>$userName);
            $user_ID = $query->getData($userInfoTable, 'user_ID', $condition);

            if(!$user_ID){
                return array('error'=>'Username or Password was wrong');
            }
            $user_ID = $user_ID[0][0];

            //taking the password from userSecurityInfo for corresponding user
            $condition = array("user_ID"=>$user_ID);
            $hashedPassword = $query->getData($userSecurityInfoTable, 'password', $condition)[0][0];

            if(basicFunctions::verifyPassword($hashedPassword, $password, $remembered)){
                return $user_ID;
            }
            $this->errorArray['error'] = 'Username or Password incorrect';

            //deleting all the variables
            unset($query);
            unset($user_ID);

            return $this->errorArray;
        }

    }


?>