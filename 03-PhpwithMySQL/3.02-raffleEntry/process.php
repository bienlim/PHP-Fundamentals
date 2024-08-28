<?php
    session_start();
    
    /* Initialize undefined session arrays */
    (!isset($_SESSION['thread']))?$_SESSION['thread']=array():'';
    (!isset($_SESSION['errors']))?$_SESSION['errors'] = array():'';

    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', 'root'); //may need to set DB_PASS as 'root'
    define('DB_DATABASE', 'test_for_php'); //make sure to set your database 
    $connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
    if ($connection->connect_errno) 
    {
    die("Failed to connect to MySQL: (" . $connection->connect_errno . ") " . $connection->connect_error);
    }



    /*Request from form submission*/
    if(isset($_POST['action']) && $_POST['action'] == 'process.php'){
    //empty array to collect errors
        $errors = array();
        if(empty($_POST['contact'])) {
            $errors[] = "No Contact number";
        } else if(!is_numeric( $_POST['contact'])){
            $errors[] = "Please fill-up correctly! (Numeric only)";
        } else if(strlen($_POST['contact'])!= 11){
            $errors[] = "Please fill-up correctly! (Input 11 digits only)";
        }

        if(count($errors) > 0){
            //if there are errors, assign the session variable!
            $_SESSION['errors'] = $errors;
            //redirect your user back using header('location: ')
        } else {
            array_push($_SESSION['errors'],"Success! Contact number {$_POST['contact']} is now added.");
            //redirect your user to the next part of the site!
        }

        
        if(empty($errors)){
            //var_dump ($_SESSION['thread']);
            $query_insert = "INSERT INTO test_raffle_entry(contact_number, date_inserted)
            VALUES('{$_POST['contact']}', NOW())";
            if(run_mysql_query($query_insert))
            {
                $_SESSION['message'] = "New lesson has been added!";
            }
            else
            {
                $_SESSION['message'] = "Failed to add new lesson "; 
            }
        }
    }

    $query_fetch = "SELECT  test_raffle_entry.contact_number AS contact, test_raffle_entry.date_inserted AS date
    FROM  test_raffle_entry";
    $_SESSION['result'] = fetch_all($query_fetch);
    var_dump($_SESSION['result']);
    var_dump($_SESSION['errors']);

    header('location: index.php');

    function fetch_all($query)
    {
    $data = array();
    global $connection;
    $result = $connection->query($query);
    while($row = mysqli_fetch_assoc($result)) 
    {
        $data[] = $row;
    }
    return $data;
    }

    function run_mysql_query($query)
    {
    global $connection;
    $result = $connection->query($query);
    return $connection->insert_id;
    }                                                           
?>
