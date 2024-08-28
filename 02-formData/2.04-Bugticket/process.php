<?php
    session_start();

    /*-------Initialize session arrays--------------------------------------*/
    (!isset($_SESSION['thread']))?$_SESSION['thread']=array():'';
    (!isset($_SESSION['errors']))?$_SESSION['errors'] = array():'';
    

    /*-------Request from form submission-----------------------------------*/
    if(isset($_POST['action']) && $_POST['action'] == 'process.php'){
    //empty array to collect errors
        $errors = array();
        if(empty($_POST['name_first']) || empty($_POST['name_last'])) {
            $errors[] = "First name or Last Name  cannot be blank";
        } else if(preg_match('~[0-9]+~', $_POST['name_first']) || preg_match('~[0-9]+~', $_POST['name_last'])){
            $errors[] = "First name or Last Name  cannot have numbers";
        }
        
        if(empty($_POST['email'])) {
            $errors[] = "Email cannot be blank";
        } else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Email not valid";
        } 

        if(empty($_POST['date'])){
            $errors[] = "date cannot be blank";
        }
        if(empty($_POST['title'])){
            $errors[] = "Title cannot be blank";
        } else if(strlen($_POST['title'])>50){
            $errors[] = "Title cannot be longer then 50 characters";
        }
        if(empty($_POST['details'])){
        $errors[] = "Details cannot be blank";
        } else if(strlen($_POST['details'])>250){
            $errors[] = "Details cannot be longer then 250 characters";
        }

        if(count($errors) > 0){
            //if there are errors, assign the session variable!
            $_SESSION['errors'] = $errors;
            //redirect your user back
        } else {
            $_SESSION['errors'] = array();;
            //redirect your user to the next part of the site!
        }

        if(empty($errors)){
            //var_dump ($_SESSION['thread']);
            array_push($_SESSION['thread'], 
                            "<div class='report mb-2 list-group-item border form-control p-2 bg-light'><h4 class ='border-bottom border-danger'>{$_POST['title']}</h4>
                            <small class='mt-0 pt-0'>Reported by {$_POST['name_first']} {$_POST['name_last']} [{$_POST['email']}] on {$_POST['date']} </small>
                            <p class ='details'>{$_POST['details']}</p></div>"
            )  ;
        }
    }
    header('location: index.php');

?>
