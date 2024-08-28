<?php
//require_once('sites.php');
require_once('database.php');

$sites = new Table('test_for_php','sites');
$sites->select([ "client_id" , $sites->count(null) ]);
$sites->group_by(['client_id']);
$sites->having([$sites->count("client_id"), ">", 5]);
$result1 = $sites->get(); //returns the resultset

$clients = new Table('test_for_php','clients');
$result2 = $clients->where(array("last_name",'=',"Owen"))->get(); 
//$result2 = $clients->select([ "id" => "client_id" , "Biling" => "email" ])->get(); 

?>

<table>
    <thead>
        <tr>
<?php       foreach($result1[0] as $key=>$data){
?>              <th><?=$key?></th>
<?php       }
?>      </tr>
    </thead>
<?php       foreach($result1 as $data){
?>       <tr>   
<?php           foreach($data as $value){
?>                  <td><?=$value?></td>
<?php               } 
?>       </tr>
<?php       }
?>

</table>

<table>
    <thead>
        <tr>
<?php       foreach($result2[0] as $key=>$data){
?>              <th><?=$key?></th>
<?php       }
?>      </tr>
    </thead>
<?php    foreach($result2 as $data){
?>       <tr>   
<?php       foreach($data as $value){
?>              <td><?=$value?></td>
<?php       } 
?>       </tr>
<?php   }
?>

</table>
