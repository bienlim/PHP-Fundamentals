<?php
    $numbers = array(13, 143, 88, 65, 120);
    $total = count($numbers);
    $sum = 0;
    foreach($numbers as $number){
        $sum = $sum + $number;
    }
    $mean = $sum/$total;
    echo $mean;
?>
