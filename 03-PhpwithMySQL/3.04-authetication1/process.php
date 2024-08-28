<?php
session_start();
require('new-connection.php');
/**-------------------------INITIALIZIE---------------------------------------------------------------------- */




/**-------------------------REGISTER---------------------------------------------------------------------- */



if(isset($_POST['action']) && $_POST['action'] == 'register'){
    //echo $name_first.'<br>'.$name_last.'<br>'.$password.'<br>'.$confirm_password.'<br>'.$contact_number;
    $name_first = escape_this_string($_POST['name_last']);
    $name_last = escape_this_string($_POST['name_first']);
    $password =($_POST['password']);
    $confirm_password = ($_POST['confirm_password']);
    $contact_number = escape_this_string($_POST['contact_number']);

    user_register($name_first,$name_last,$contact_number,$password,$confirm_password);
    echo 'shoot';
}

/**-------------------------LOGIN---------------------------------------------------------------------- */
if(isset($_POST['action']) && $_POST['action'] == 'login'){
    $contact_number = escape_this_string($_POST['contact_number']);

    user_login($_POST['contact_number'],$_POST['password']);
}

if(isset($_POST['action']) && $_POST['action'] == 'reset'){
    $contact_number = escape_this_string($_POST['contact_number']);

    user_reset($_POST['contact_number']);
}

function user_register($name_first,$name_last,$contact_number,$password,$confirm_password){
    $msg_process = array();
    if(empty($name_first) || empty($name_last)) {
        $msg_process[] = "First name or Last Name  cannot be blank";
    } else if(preg_match('~[0-9]+~', $name_first) || preg_match('~[0-9]+~', $name_last)){
        $msg_process[] = "First name or Last Name  cannot have numbers";
    } else if(strlen($name_first)<2 || strlen($name_last)<2){
        $msg_process[] = "First name or Last Name  must be atleast 2 characters";
    }
    

    if(empty($contact_number)){
        $msg_process[] = "Contact cannot be blank";
    } else if(!is_numeric($contact_number)||strlen($contact_number)!=11){
        $msg_process[] = "Invalid contact number. Must be 11 digits".strlen($contact_number);
    }

    if(empty($password) || empty($confirm_password)){
        $msg_process[] = "Password cannot be blank";
    }else if(strlen($password)<8){
        $msg_process[] = "Password must be atleast 8 characters";
    }
    else if(($password)!=($confirm_password)){
        $msg_process[] = "Password did not match";
    }
    

    if(count($msg_process) > 0){
        //if there are msg_process, assign the session variable!
        $_SESSION['msg_process'] = $msg_process;
        var_dump($_SESSION['msg_process']);
        header('location: index.php');
        die();
    } else {
        $msg_process[] = 'Registration succcessful!';
        $_SESSION['msg_process'] = $msg_process;
        $salt = bin2hex(openssl_random_pseudo_bytes(22));
        $npassword = md5($password.''.$salt);
        $query_insert = "INSERT INTO test_authentication1(name_first,name_last,contact_number,password,salt,created_at,updated_at)
        VALUES('{$name_first}','{$name_last}', '{$contact_number}','{$npassword}', '{$salt}',NOW(), NOW())";
        if(run_mysql_query($query_insert)){
            $_SESSION['message'] = "New lesson has been added!";
            header('location: index.php');
            var_dump($_SESSION['message']);
            die();
        }else{
            $_SESSION['message'] = "Failed to add new lesson "; 
            var_dump($_SESSION['message']); 
        }
        
    }
    
}

function user_login($contact_number,$password){       
    //empty array to collect msg_process
        $msg_login = array();
        if(empty($contact_number)) {
            $msg_login[] = "Contact number is blank";
        } 
        
        if(empty($password)) {
            $msg_login[] = "Password is blank";
        } 



        if(count($msg_login) > 0){
            //if there are errors, assign the session variable!
            $_SESSION['msg_login'] = $msg_login;
        } else{
            $_SESSION['msg_login'] = $msg_login;
            $password = escape_this_string($password);
            $query_fetch = "SELECT * FROM test_authentication1 
                            WHERE test_authentication1.contact_number = '{$contact_number}'";
            $user_query = fetch_record($query_fetch);
            if(!empty($user_query)){
                $npassword =  md5($password . '' . $user_query['salt']);
                if($user_query['password']==$npassword){
                    $msg_login[] = 'Login successful!';
                }else{
                    $msg_login[] = 'Incorrect Password!';
                }
            }else{
                $msg_login[] = 'Login failed!';
            }
            $_SESSION['msg_login'] = $msg_login;
            
            
        }
        header('location: index.php');
            die();
}

    function user_reset($contact_number){       
        //empty array to collect msg_process
            $msg_login = array();
            if(empty($contact_number)) {
                $msg_login[] = "Contact number is blank";
            } 
                
    
    
            if(count($msg_login) > 0){
                //if there are errors, assign the session variable!
            } else{
                $query_fetch = "SELECT * FROM test_authentication1 
                                WHERE test_authentication1.contact_number = '{$contact_number}'";
                $user_query = fetch_record($query_fetch);
                if(!empty($user_query)){
                    $salt = bin2hex(openssl_random_pseudo_bytes(22));
                    $npassword = md5('village88'.''.$salt);
                    $query_update ="UPDATE test_authentication1
                                    SET password = '{$npassword}', salt = '{$salt}'
                                    WHERE contact_number = '{$contact_number}'";

                    run_mysql_query($query_update);
                    $msg_login[]="Successfully set password to default.";
               
                }else{
                    $msg_login[] = 'Contact number not found. Mag Resiter ka nalang.';
                }
                
                
            }
            $_SESSION['msg_login'] = $msg_login;
            var_dump($_SESSION['msg_login']);
            header('location: index.php');
            die();
        }
?>