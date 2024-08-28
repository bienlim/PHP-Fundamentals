<?php
    ini_set('auto_detect_line_endings', true);
    if (($open = fopen("us-500.csv", "r")) !== FALSE) 
    {
    while (($data = fgetcsv($open, 1000, ",")) !== FALSE) 
    {        
        $array[] = $data; 
    }
    //reformat array to have field name keys
    foreach($array as $entry){
            foreach($entry as $key => &$value){
                ($key==0?$key='first_name':
                    ($key==1?$key='last_name':
                        ($key==2?$key='company_name': 
                            ($key==3?$key='address': 
                                ($key==4?$key='city':
                                    ($key==5?$key='country':
                                        ($key==6?$key='state':
                                            ($key==7?$key='zip': 
                                                ($key==8?$key='phone':
                                                    ($key==9?$key='phone2':
                                                        ($key==10?$key='email':
                                                            ($key==11?$key='web':'')
                                                        )    
                                                    )
                                                )
                                            )
                                        )
                                    )
                                )
                            )
                        )
                    )
                );
            }
    }
    fclose($open);
  }
?>
<html>
<body>
    <table style="border-style: solid; border-collapse: collapse">
<?php   foreach($array as $entry){
?>       
        <tr>
<?php            foreach($entry as $value){
?>
            <td style="border-style: solid;"> <?=$value?>
            </td>
<?php }
?>  
        </tr>
<?php }
?>   
    </table>
</body>
</html>
