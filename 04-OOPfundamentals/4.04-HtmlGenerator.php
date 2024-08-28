<?php

Class HTML_Generator{

    public $array;


    public function render_input($array){
        
        foreach($array as $key => $value){
            echo '<p><label>'.$key.'<input type="text" name="'.$key.'" value="'. $value.'"></label></p>';
        }
        
    }

    public function render_list($array,$type){
        if($type == 'unordered'){
            echo '<ul>';
        } else if ($type == 'ordered'){
            echo '<ol>';
        }
        foreach($array as $value){
            echo '<li>'.$value.'</li>';
        }
        if($type == 'unordered'){
            echo '</ul>';
        } else if ($type == 'ordered'){
            echo '</ol>';
        }
    }
}


$array = array("name" => "Bag", "price" => "250", "stocks" => "10");

$item1 = new HTML_Generator();

$item1->render_input($array);

$array = array("Apple", "Banana", "Cherry");

$item1->render_list($array,'ordered');


