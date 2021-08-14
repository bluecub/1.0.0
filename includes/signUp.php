<?php

    require_once("profile.php");

    class signUp{

        protected $userInfoArray;
        protected $errorArray;

        public function __construct(){
            $this->errorArray = array();
        }

        public function setInfoArray($userInfoArray){
            $this->userInfoArray = $userInfoArray;
        }

        public function getInfoArray(){
            return $this->userInfoArray;
        }

        public function submitData(){
            
            //take the database name and table names from global variables
            global $databaseName;
            global $userInfoTable;
            global $userSecurityInfoTable;

            $password = $this->userInfoArray['password'];
            $userName = $this->userInfoArray['userName'];
            $firstname = $this->userInfoArray['firstName'];
            $lastName = $this->userInfoArray['lastName'];
            $DOB = $this->userInfoArray['DOB'];
            $email = $this->userInfoArray['email'];
            $number = $this->userInfoArray['number'];
            $profilePic = $this->userInfoArray['profilePic'];
            $about = $this->userInfoArray['about'];
            $lastSeenVisible = $this->userInfoArray['lastSeenVisible'];

            //perform validation here 
            //if data is validated successfully enter the data back to $userInfoArray
            //otherwise return false

            if(basicFunctions::validateString($userName)){
                $userInfoArray['userName'] = basicFunctions::escape($userName);
            }
            else{
                return $this->errorArray['userNameError'] = 'User Name is Not valid';
            }

            if(basicFunctions::validateString($firstname)){
                $userInfoArray['firstname'] = basicFunctions::escape($firstname);
            }
            else{
                return $this->errorArray['firstnameError'] = 'First Name is Not valid';
            }

            if(basicFunctions::validateString($lastName)){
                $userInfoArray['lastName'] = basicFunctions::escape($lastName);
            }
            else{
                return $this->errorArray['lastNameError'] = 'Last Name is Not valid';
            }

            if(basicFunctions::validateEmail($email)){
                $userInfoArray['email'] = basicFunctions::escape($email);
            }
            else{
                return $this->errorArray['emailError'] = 'Email is Not valid';
            }

            if(basicFunctions::validateNumber($number)){
                $userInfoArray['number'] = basicFunctions::escape($number);
            }
            else{
                return $this->errorArray['numberError'] = 'Number Not valid';
            }

            $userInfoArray['DOB'] = $DOB;
            $userInfoArray['about'] = basicFunctions::escape($about);

            //after validating and sanatizing the data, let's enter it in the database

            $query = new query($databaseName);
            $condition = array('user_ID'=>$this->user_ID);
            $query->updateData($userInfoTable, $this->userInfoArray, $condition);

            unset($query);

        }

    }

?>