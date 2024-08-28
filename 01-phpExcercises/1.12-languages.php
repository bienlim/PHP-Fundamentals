<?php
    $languages = array('PHP', 'JS', 'Ruby');
    
    echo '<select>';
    for($row=0;$row<count($languages);$row++){
        echo '<option>'.$languages[$row].'</option>';
    }
    echo '</select>';
    
    echo '<select>';
    foreach($languages as $language){
        echo '<option>'.$language.'</option>';
    }
    echo '</select>';

    array_push($languages,'HTML','CSS');
    echo '<select>';
    foreach($languages as $language){
        echo '<option>'.$language.'</option>';
    }
    echo '</select>';

?>
