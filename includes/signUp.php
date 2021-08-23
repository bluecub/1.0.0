<?php

    require_once('basicFunctions.php');
    require_once('CRUD.php');

    class signUp{

        protected $infoToAdd;
        protected $errorArray;

        public function __construct(){
            $this->errorArray = array();
        }

        public function setInfoArray($infoToAdd){
            $this->infoToAdd = $infoToAdd;
        }

        public function getInfoArray(){
            return $this->infoToAdd;
        }

        public function submitData(){
            
            //intializing array for data to add
            $userInfoArray = array();
            $securityInfoArray = array();

            //take the database name and table names from global variables
            global $databaseName;
            global $userInfoTable;
            global $userSecurityInfoTable;

            //initializing data for $userInfoArray
            $userName = $this->infoToAdd['userName'];
            $firstname = $this->infoToAdd['firstName'];
            $lastName = $this->infoToAdd['lastName'];
            $DOB = $this->infoToAdd['DOB'];
            $email = $this->infoToAdd['email'];

            //checking the not-required fields. If exists pushing it into the infoToAdd array
            if(isset($this->infoToAdd['number'])){
                $number = $this->infoToAdd['number'];
            }
            if(isset($this->infoToAdd['about'])){
                $about = $this->infoToAdd['about'];
            }
            if(isset($this->infoToAdd['profilePic'])){
                $profilePic = $this->infoToAdd['profilePic'];
            }
            $lastSceneVisible = 1;
            $isPrivate = 0;
            $isEnabled = 1;
            $isVerified = 0;

            //initializing data for $securityInfoArray
            //hashing the password
            $password = $this->infoToAdd['password'];
            $confirmPassword = $this->infoToAdd['confirmPassword'];

            //perform validation here 
            //if data is validated successfully enter the data back to $infoToAdd
            //otherwise return false

            if(basicFunctions::validateString($userName)){
                $userInfoArray['userName'] = basicFunctions::escape($userName);
            }
            else{
                $this->errorArray['userNameError'] = 'User Name is Not valid';
                return $this->errorArray;
            }

            if(basicFunctions::validateString($firstname)){
                $userInfoArray['firstName'] = basicFunctions::escape($firstname);
            }
            else{
                $this->errorArray['firstnameError'] = 'First Name is Not valid';
                return $this->errorArray;
            }

            if(basicFunctions::validateString($lastName)){
                $userInfoArray['lastName'] = basicFunctions::escape($lastName);
            }
            else{
                $this->errorArray['lastNameError'] = 'Last Name is Not valid';
                return $this->errorArray;
            }

            if(basicFunctions::validateEmail($email)){
                $userInfoArray['email'] = basicFunctions::escape($email);
            }
            else{
                $this->errorArray['emailError'] = 'Email is Not valid';
                return $this->errorArray;
            }

            if(isset($number)){
                if(basicFunctions::validateNumber($number)){
                    $userInfoArray['number'] = basicFunctions::escape($number);
                }
                else{
                    $this->errorArray['numberError'] = 'Number Not valid';
                    return $this->errorArray;
                }
            }

            if(isset($about)){
                $userInfoArray['about'] = basicFunctions::escape($about);
            }

            $userInfoArray['DOB'] = $DOB;
            $userInfoArray['isVerified'] = $isVerified;
            $userInfoArray['isEnabled'] = $isEnabled;
            $userInfoArray['isPrivate'] = $isPrivate;
            $userInfoArray['lastSeenVisible'] = $lastSceneVisible;

            //validation for passwords
            if($password == $confirmPassword){
                $password = basicFunctions::hashPassword($password);
                $securityInfoArray['password'] = $password;
            }
            else{
                $this->errorArray['passwordError'] = "password didn't match";
                return $this->errorArray;
            }

            //after validating and sanatizing the data, let's enter it in the database
            $query = new query($databaseName);
            $query->addData($userInfoTable, $userInfoArray);

            //getting userID to add Password and for returning
            $condition = array('userName'=>$userInfoArray['userName']);
            $user_ID = $query->getData($userInfoTable, "user_ID", $condition)[0][0];

            $securityInfoArray['user_ID'] = $user_ID;
            $securityInfoArray['isVerified'] = $isVerified;

            //adding the password to $userSecurityInfoArray
            $query->addData($userSecurityInfoTable, $securityInfoArray);

            //deleting all the objects
            unset($query);
            unset($condition);

            return $user_ID;

        }

    }

?>