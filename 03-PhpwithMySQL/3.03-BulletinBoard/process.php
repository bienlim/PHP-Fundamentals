<?php
    require_once('new-connection.php');
        /*Request from form submission*/
        session_start();
        if(isset($_POST['submit']) && $_POST['submit'] == 'Submit'){
            //empty array to collect errors
                $errors = array();
                if(empty($_POST['title'])) {
                    $errors[] = "Pleasse enter Subject";
                }

                if(empty($_POST['detail'])) {
                    $errors[] = "Please enter Details";
                }
        
                if(count($errors) > 0){
                    //if there are errors, assign the session variable!
                    $_SESSION['errors'] = $errors;
                    
                    //redirect your user back using header('location: ')
                    header('location: index.php');
                } else {

                    $query_insert = "INSERT INTO test_bulletin_board(title, detail, created_at)
                    VALUES('{$_POST['title']}','{$_POST['detail']}', '{$_POST['date']}')";
                    if(run_mysql_query($query_insert))
                    {
                        $_SESSION['message'] = "New lesson has been added!";
                        header('location: main.php');
                        var_dump($_SESSION['message']);
                    }
                    else
                    {
                        $_SESSION['message'] = "Failed to add new lesson "; 
                        var_dump($_SESSION['message']);
                    }
                }
            }
        

           
            //var_dump($_SESSION['result']);
            var_dump($_SESSION['errors']);
        
            //header('location: index.php');
     
?>