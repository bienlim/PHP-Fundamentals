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
<?php       foreach($search AS $data){
?>              <tr>
                    <td><?= $data['name_product'] ?></td>
                    <td><?= $data['count_stock'] ?></td>
                    <td><?= $data['price'] ?></td>
                    <td><?= $data['created_at'] ?></td>
                </tr>
<?php       }
?>         </table>