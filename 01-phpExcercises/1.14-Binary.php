<?php
    $binary = array( 1, 1, 0, 1, 1, 0, 1);
    $output = get_count($binary);
    var_dump($output);

    function get_count($arr){
        $binaryCount =array('zeroes' => 0,  'ones' => 0);
        foreach($arr as $value){
            $value == 0? $binaryCount['zeroes']++:$binaryCount['ones']++;
        }
        return $binaryCount;
    }
    //$output should be equal to array("zeroes" => 2,  "ones" => 5);

?>
