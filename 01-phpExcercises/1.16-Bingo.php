<?php
    $table = array(6,5);
    echo '<table style="border-style: solid; border-collapse: collapse;">';
    for($row=0;$row<$table[0];$row++){
        if($row==0){
            echo '<tr>';
        } else{
        echo  $row%2==0?'<tr style="color: blue">':'<tr style="color: red">';
        }
        for($col=0;$col<$table[1];$col++){
            echo ($row==0?'<th style="border-style: solid;">':'<td style="border-style: solid;">');
            if($row==0){
                echo ($col==0?'B':'');
                echo ($col==1?'I':'');
                echo ($col==2?'N':'');
                echo ($col==3?'G':'');
                echo ($col==4?'O':'');
            } else{
                echo rand(5,30);
            }
            echo ($row==0?'</th>':'</td>');
        }
        echo '</tr>';
    }
    echo '</table>';
?>