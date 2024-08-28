<?php
    require_once('new-connection.php');

    if( isset($_POST['action']) && $_POST['action']=='upload' ){
        if (($_FILES['file_upload']['tmp_name']) != "") {
            if (is_uploaded_file($_FILES['file_upload']['tmp_name'])) {                                                                   //
                $file_content = file_get_contents($_FILES['file_upload']['tmp_name']);
                //var_dump($file_content);
                $file_blob = base64_encode($file_content);
                //var_dump($file_blob);
                $file_name = $_FILES['file_upload']['name'];
                $query = "INSERT INTO test_pagination(file_name ,file_blob) VALUES('{$file_name}', '{$file_blob}')";
                //echo ($query);

                if(run_mysql_query($query)){
                    //echo 'good query';
                    header('location: index.php');
                }else{
                    echo 'bad query';
                }  
            }
        }else{
            echo 'bad file';
        }
    }else{
        echo 'nothing';
    }
    header('location: index.php')
?>