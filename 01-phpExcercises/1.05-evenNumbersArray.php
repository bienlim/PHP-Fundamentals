<?php
    $even_array = array();
    for($row = 0; $row <= 10000; $row+=2){
        array_push($even_array,$row);
    }
    var_dump($even_array)
?>
