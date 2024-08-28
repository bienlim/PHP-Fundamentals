<?php
    
    $cards = array(
            'King' => 13,
            'Queen' => 12,
            'Jack' => 11,
            'Ace' => 1
    );

    foreach($cards as $key => $value){
        echo 'The value of '.$key.' in Pyramid Solitare is '.$value.'<br>';
    }
?>
