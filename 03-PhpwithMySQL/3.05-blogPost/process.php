<?php
    require_once('new-connection.php');
        /*Request from form submission*/
        session_start();

if(isset($_POST['action']) && $_POST['action'] == 'login'){
    user_login($_POST['email'],$_POST['password']);
}

if(isset($_POST['action']) && $_POST['action'] == 'logout'){
        session_destroy();
        header('location: index.php');   
}

if(isset($_POST['action']) && $_POST['action'] == 'review'){

    submit_review($_POST['context']);
    echo "shoot";
}

if(isset($_POST['action']) && $_POST['action'] == 'reply'){
    submit_reply($_POST['context'],$_POST['review']);
}


function user_login($email,$password){       
    //empty array to collect msg_process
        $msg_login = array();
        if(empty($email)) {
            $msg_login[] = "Email is blank";
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
            $query_fetch = "SELECT * FROM test_tbp_user 
                            WHERE test_tbp_user.email = '{$email}'";
            $user_query = fetch_record($query_fetch);
            if(!empty($user_query)){
                $npassword =  md5($password . '' . $user_query['salt']);
                if($user_query['password']==$npassword){
                    $msg_login[] = 'Login successful!';
                    $_SESSION['user'] = $user_query['id_user'];
                    header('location: index.php');
                    die();

                }else{
                    $msg_login[] = 'Incorrect Password!';
                }
            }else{
                $msg_login[] = 'Login failed!';
            }
            $_SESSION['msg_login'] = $msg_login;
            
            
        }
        $_SESSION['msg_login'] = $msg_login;
        header('location: login.php');
        die();
        
}

var_dump($_SESSION['msg_login']);

function submit_review($context){

    $query_insert = "INSERT INTO test_tbp_reviews(id_user, context, update_at)
    VALUES('{$_SESSION['user']}','{$context}', NOW())";
    if(run_mysql_query($query_insert)){
        $_SESSION['message'] = "New lesson has been added!";
        header('location: index.php');
        var_dump($_SESSION['message']);
        die();
    }


}

function submit_reply($context,$id_review){
    
    $query_insert = "INSERT INTO test_tbp_replies(id_user,id_review, context, update_at)
    VALUES('{$_SESSION['user']}','$id_review','{$context}', NOW())";
    if(run_mysql_query($query_insert)){
        $_SESSION['message'] = "New lesson has been added!";
        header('location: index.php');
        var_dump($_SESSION['message']);
        die();
    }

}
     
?>