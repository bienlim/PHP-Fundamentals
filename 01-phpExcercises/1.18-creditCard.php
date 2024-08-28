<?php
    $users = array( 
        array('cardholder_name'=> 'Michael Choi', 'cvc' => 123, 'acc_num' => '1234 5678 9876 5432'),
        array('cardholder_name'=> 'John Supsupin','cvc' => 789, 'acc_num' => '0001 1200 1500 1510'),
        array('cardholder_name'=> 'KB Tonel', 'cvc' => 567, 'acc_num' => '4568 456 123 5214'),
        array('cardholder_name'=> 'Mark Guillen', 'cvc' => 345, 'acc_num' => '123 123 123 123'),
        array('cardholder_name'=> 'Marko Ping', 'cvc' => 295, 'acc_num' => '234 1323 1323 1233') ,
        array('cardholder_name'=> 'Polo Pil', 'cvc' => 945, 'acc_num' => '3422 13113 242 455`'),
        array('cardholder_name'=> 'John Jim', 'cvc' => 376, 'acc_num' => '235 123 333 123'),
        array('cardholder_name'=> 'Park Lang', 'cvc' => 845, 'acc_num' => '5422 123 432 123') ,
        array('cardholder_name'=> 'Manny Pats', 'cvc' => 675, 'acc_num' => '5242 1313 1312 123')  
     );
     $table = array(count($users),8);
     $tr = array('<tr style="background-color: lightgrey;">','<tr>');
     $th = array('<th style="border-style: solid;">','</th>');
     $td = array('<td style="border-style: solid;">','</td>');
     $thead = array('ID','Name','Name in Uppercase', 'Account Num','CVC Num','Full account','Length of Full account','Is valid')
?>

<html>
<body>
     <table style="border-style: solid; border-collapse: collapse">
<?php for($row=0;$row<=$table[0];$row++){ ?>
        <?=$row%3==0?$tr[0]:$tr[1] ?>

<?php for($col=0;$col<$table[1];$col++){  ?>
                <?= $row==0? $th[0]:$td[0]  ?>
                <?=(($col==0&&$row==0)?$thead[$col].$th[1]:($col==0?$row.$td[1]:''));?>
                <?= (($col==1&&$row==0)?$thead[$col].$th[1]:($col==1?$users[$row-1]['cardholder_name'].$td[1]:''));?>
                <?= (($col==2&&$row==0)?$thead[$col].$th[1]:($col==2?strtoupper($users[$row-1]['cardholder_name'].$td[1]):''));?>
                <?= (($col==3&&$row==0)?$thead[$col].$th[1]:($col==3?$users[$row-1]['acc_num'].$td[1]:''));?>
                <?= (($col==4&&$row==0)?$thead[$col].$th[1]:($col==4?$users[$row-1]['cvc'].$td[1]:''));?>
                <?= (($col==5&&$row==0)?$thead[$col].$th[1]:($col==5?$users[$row-1]['acc_num'].' '.$users[$row-1]['cvc'].$td[1]:''));?>
                <?= (($col==6&&$row==0)?$thead[$col].$th[1]:($col==6?strlen(str_replace(' ','',$users[$row-1]['acc_num'].' '.$users[$row-1]['cvc'])).$td[1]:''));?>
                <?= (($col==7&&$row==0)?$thead[$col].$th[1]:($col==7?(strlen(str_replace(' ','',$users[$row-1]['acc_num'].' '.$users[$row-1]['cvc']))>18?'yes'.$td[1]:'no'.$td[1]):''));?>       
<?php  } ?>
        </tr>
<?php } ?>
    </table>
</body>
</html>

 