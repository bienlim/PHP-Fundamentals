<?php
    for($var=0;$var<50; $var++){
        $number = rand(1,100);
        if($number < 50){
            echo '<h1>'.$number.'</h1><h2>Never sing again, ever!</h2>';
        } else if ($number >= 95){
            echo '<h1>'.$number.'</h1><h2>What an excellent singer!</h2>';
        } else if ($number >= 80 ){
            echo '<h1>'.$number."</h1><h2>You're getting better!</h2>";
        } else if ($number >= 50 ) {
            echo '<h1>'.$number.'</h1><h2>Practice more!</h2>';
        }
    }
?>
