<?php
    //connecting to a remote url using curl
    include "simple_html_dom.php";
    //see http://www.php.net/manual/en/function.curl-setopt.php for more info
    $ch = curl_init();
    //$keyword = "software+engineer";
    $url = "https://www.bing.com/search?q=software+engineer&qs=AS&pq=software+en&sc=10-11&cvid=C7037AD9A79B499D867A60B93A8AA345&FORM=QBLH&sp=1";
    //$url = "https://www.bing.com/search?q=$keyword";
    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
      
    $data = curl_exec($ch);
    $info = curl_getinfo($ch);

    curl_close($ch);

    //echo $data;

    $html = new simple_html_dom();
    $html->load($data);
    
    $finding = array(array(),array());
    //foreach($html->find('a[href]') as $results){
        foreach(array_slice($html->find('h2 a'),0,5) as $link){
            array_push($finding[0], $link);
        }
        foreach(array_slice($html->find('h2 a'),0,5) as $title){
            array_push($finding[1], $title->href);

        }
    
        for($i=0;$i<5;$i++){
            
                echo '<br>'.$finding[0][$i].'<br>'.$finding[1][$i].'<br>';
        }

    //}
?>