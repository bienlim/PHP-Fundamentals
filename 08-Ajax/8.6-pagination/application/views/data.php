<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
        <table class="col-12">
            <thead>
                <tr>
                    <th> Product Name </th>
                    <th> Stock </th>
                    <th> Price </th>
                    <th> Added on </th>
                </tr>
            </thead>
<?php       for($row = $start; $row < $end; $row++){ if(isset($search[$row])){
?>              <tr>
                    <td class="w-25"><?= $search[$row]['name_product'] ?></td>
                    <td class="w-25"><?= $search[$row]['count_stock'] ?></td>
                    <td class="w-25"><?= $search[$row]['price'] ?></td>
                    <td class="w-25"><?= $search[$row]['created_at'] ?></td>
                </tr>
<?php       }}
?>         </table>



<footer class ="row">
        <form class="col text-center">

<?php         for($page=1; $page<=$pagination;$page++){
?>            <a href="searches/pagination/<?=$page?>"> <?=$page?> </a>
<?php }
?>      <form>
</footer> 