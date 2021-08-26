<?php

    require_once('basicFunctions.php');
    require_once('CRUD.php');

    class signUp{

        protected $infoToAdd;
        protected $errorArray;
        protected $userInfoArray;
        protected $securityInfoArray;

        public function __construct(){

            $this->errorArray = array();

            //intializing array for data to add
            $this->userInfoArray = array();
            $this->securityInfoArray = array();

        }

        public function setInfoArray($infoToAdd){
            $this->infoToAdd = $infoToAdd;
        }

        public function getInfoArray(){
            return $this->infoToAdd;
        }

        public function validate(){

            //removing the previous errors
            $this->errorArray = array();

            //initializing data for $userInfoArray and checking for errors

            if(isset($this->infoToAdd['userName'])){
                $userName = $this->infoToAdd['userName'];
                if(basicFunctions::validateString($userName)){
                    $this->userInfoArray['userName'] = basicFunctions::escape($userName);
                }
                else{
                    $this->errorArray['userNameError'] = 'User Name is Not valid';
                }
            }

            if(isset($this->infoToAdd['firstName'])){
                $firstname = $this->infoToAdd['firstName'];
                if(basicFunctions::validateString($firstname)){
                    $this->userInfoArray['firstName'] = basicFunctions::escape($firstname);
                }
                else{
                    $this->errorArray['firstNameError'] = 'Name is Not valid';
                }
            }

            if(isset($this->infoToAdd['lastName'])){
                $lastName = $this->infoToAdd['lastName'];
                if(basicFunctions::validateString($lastName)){
                    $this->userInfoArray['lastName'] = basicFunctions::escape($lastName);
                }
                else{
                    $this->errorArray['lastNameError'] = 'Name is Not valid';
                }
            }

            if(isset($this->infoToAdd['email'])){
                $email = $this->infoToAdd['email'];
                if(basicFunctions::validateEmail($email)){
                    $this->userInfoArray['email'] = basicFunctions::escape($email);
                }
                else{
                    $this->errorArray['emailError'] = 'Email is Not valid';
                }
            }

            if(isset($this->infoToAdd['number'])){
                $number = $this->infoToAdd['number'];
                if(basicFunctions::validateNumber($number)){
                    $this->userInfoArray['number'] = basicFunctions::escape($number);
                }
                else{
                    $this->errorArray['numberError'] = 'Number Not valid';
                }
            }

            if(isset($this->infoToAdd['DOB_D']) or isset($this->infoToAdd['DOB_M']) or isset($this->infoToAdd['DOB_Y'])){

                $DOB_D = $this->infoToAdd['DOB_D'];
                $DOB_M = $this->infoToAdd['DOB_M'];
                $DOB_Y = $this->infoToAdd['DOB_Y'];

                if($DOB_D == "-1" or $DOB_M == "-1" or $DOB_Y == "-1"){
                    $this->errorArray['DOB_Error']='Enter a valid date';
                }
                else{
                    $this->userInfoArray['DOB'] = $DOB_Y . "-" . $DOB_M . "-" . $DOB_D;
                }
            }

            if(isset($this->infoToAdd['about'])){
                $about = $this->infoToAdd['about'];
                $this->userInfoArray['about'] = basicFunctions::escape($about);
            }

            //initializing data for $securityInfoArray
            //hashing the password
            if(isset($this->infoToAdd['password']) and isset($this->infoToAdd['confirmPassword'])){
                $password = $this->infoToAdd['password'];
                $confirmPassword = $this->infoToAdd['confirmPassword'];
            
                if($password == $confirmPassword){
                    $password = basicFunctions::hashPassword($password);
                    $this->securityInfoArray['password'] = $password;
                }
                else{
                    $this->errorArray['passwordError'] = "passwords didn't match";
                }
            }
            if($this->errorArray){
                return $this->errorArray;
            }
            else{
                return true;
            } 
        }

        public function submitData(){

            //adding some default values to userInfoArray and securityInfo
            $lastSceneVisible = 1;
            $isPrivate = 0;
            $isEnabled = 1;
            $isVerified = 0;

            $this->userInfoArray['isVerified'] = $isVerified;
            $this->userInfoArray['isEnabled'] = $isEnabled;
            $this->userInfoArray['isPrivate'] = $isPrivate;
            $this->userInfoArray['lastSeenVisible'] = $lastSceneVisible;

            $this->securityInfoArray['isVerified'] = $isVerified;

            //take the database name and table names from global variables
            global $databaseName;
            global $userInfoTable;
            global $userSecurityInfoTable;
            //after validating and sanatizing the data, let's enter it in the database
            $query = new query($databaseName);
            $query->addData($userInfoTable, $this->userInfoArray);

            //getting userID to add Password and for returning
            $condition = array('userName'=>$this->userInfoArray['userName']);
            $user_ID = $query->getData($userInfoTable, "user_ID", $condition)[0][0];

            $this->securityInfoArray['user_ID'] = $user_ID;

            //adding the password to $userSecurityInfoArray
            $query->addData($userSecurityInfoTable, $this->securityInfoArray);

            //deleting all the objects
            unset($query);
            unset($condition);

            return $user_ID;

        }

    }

?>