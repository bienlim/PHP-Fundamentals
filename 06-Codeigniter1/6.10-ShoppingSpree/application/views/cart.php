<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>Shop Pre</title>
</head>
<body>

    <nav class="navbar navbar-dark bg-dark main-nav">
        <div class="container-fluid bg-dark">
            <h1 class="navbar-brand pe-30"><span class="text-danger"> SHOP </span> PRE</h1>
            <div class="d-flex">
                <h3 class="navbar-brand" > <a class=" btn btn-outline-success" href="<?=base_url()?>"> More pa </a></h3>
                <!-- <a class="btn btn-outline-success ms-12 " href="login.php">Login</a>
                <form action="process.php" method="post" class="">
                    <input type="hidden" name="action" value="logout">
                    <input type="submit" class="btn btn-outline-success ms-12" href="login.php" value="Log out">
                </form> -->
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            
            <div class=" col-6 bg-light mt-4 offset-3">
                <h1>Check Out</h1>
                <table class="table table-hover">
                    <thead>
                        <tr> 
                            <th scope="col"> Item</th>    
                            <th scope="col"> Item Name </th>
                            <th scope="col"> Qty </th>
                            <th scope="col"> Unit Price </th>
                            <th scope="col"> Subtotal </th>
                            <th scope="col"> Action </th>
                        </tr>
                    </thead>

<?php           foreach($cart_list as $record){{
?>              <tr> 
                    <td><img class="rounded mx-auto d-block img-fluid" style="height:150px" src='<?= $record['img_src']?>'> </td>
                    <td><?= $record['name_product']?> </td>
                    <td><?= $record['qty']?> </td>
                    <td><?= $record['price']?> </td>
                    <td><?= $record['price']*$record['qty']?> </td>
                    <td>
                        <form method="post" action="<?=base_url('shops/remove')?>">
                            <input type="hidden" name="id" value="<?= $record['id']?>" >
                            <input class="m-3 btn btn-outline-success" type="submit" value="Remove">
                        </form>
                    </td>
                </tr>
<?php           }}
?>
                </table>
                <div class="d-flex flex-row-reverse">
                    <form action="<?=base_url('shops/checkout')?>" method="post">
                        <input type="hidden" name="action" value="logout">
                        <input type="submit" class="btn btn-dark" href="" value="Pay Now">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>