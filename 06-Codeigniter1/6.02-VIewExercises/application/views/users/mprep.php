<h1> Username : <?= $name ?> </h1>
<h2> User Age: <?= $age ?>, Location:  <?= $location?></h2>
<h3><?= count($hobbies) ?> </h3>
<ul>
<?php   foreach($hobbies as $value){
?>               <li><?= $value ?></li>
<?php   }
?>

</ul>