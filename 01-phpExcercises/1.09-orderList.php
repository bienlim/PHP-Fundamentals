<?php
    $x = array('Spaghetti', 'Pizza', 'Iced tea');
    function print_orders($x){
        echo '<ol>';
        foreach($x as $value){
            echo '<li>'.$value.'</li>';
        };
        echo '</ol>';
    };
    print_orders($x)
?>
