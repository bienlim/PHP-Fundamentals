<?php
    $list = array(6, 1, 3, 5, 7);
    convert_to_blanks($list);

    $list = array(4, "Michael", 3, "Karen", 2, "Rogie");
    convert_to_blanks($list);

    function convert_to_blanks($list){

        foreach($list as $value){

            if(is_int($value)){
                for($rep=0 ; $rep < $value;$rep++){
                    echo '_ ';
                }
            } else {
                for($rep=0 ; $rep < strlen($value);$rep++){
                    
                    echo ($rep==0?substr($value,0,1):'_ ');
                }

            }

            echo '<br>';
        }
        


    }
?>
