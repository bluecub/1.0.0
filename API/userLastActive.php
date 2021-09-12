<?php 

    require '../includes/profile.php';
    //first check for get or set functions
    if(isset($_GET['fn'])){

        if($_GET['fn'] == 'set'){
            $user_ID = $_GET['user_ID'];

            if($_GET['fn'] == 'set'){
    
                // advancing the time to +30 seconds
                $d = strtotime('+30 seconds');
                $date = date('Y-m-d H:i:s', $d);
            
                $user = new userObject($user_ID);
                if($user->get('lastSeenVisible') == "1"){
                    $user->set('lastActive', $date);
                    $user->updateProfile();
                    echo '1';
                }
                else{
                    echo "0";
                }
                unset($user);
    
            }
            else if($_GET['fn'] == 'get'){
                $user = new profileObject($user_ID);
                if($user->get('lastSeenVisible') == "1"){
                    echo $user->get('lastActive');
                }
                else{
                    echo "0";
                }
                
            }
            unset($user_ID);
        }
    }


?>