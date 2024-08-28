<?php
    $score = 0;
    $fail = 0;
    echo 'Practice starts...';
    for($attempt=1;$attempt<=1000;$attempt++){
        $shoot = rand(0,1);
        if($shoot){
            $score = $score +1;
            echo '<br>Attempt #'.$attempt.': Shooting the ball..Success! ... Got '.$score.'x success and '.$fail.'x epic fail(s) so far';
        }else{
            $fail = $fail + 1;
            echo '<br>Attempt #'.$attempt.': Shooting the ball..Epic Fail! ... Got '.$score.'x success and '.$fail.'x epic fail(s) so far';
        }
    }
    echo '<br> Practice ended';
?>

