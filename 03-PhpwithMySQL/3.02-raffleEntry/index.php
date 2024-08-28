<?php
session_start();
$today = date("Y-m-d", time());
(!isset($_SESSION['result'])||!isset($_SESSION['errors']))?header('location: process.php'):'';
//a session object is to be defined prior a call; like wise a session object is by default an element, should be defined if it is used as an array

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>Raffle Entry</title>
</head>
<body>

    <nav class="navbar navbar-dark bg-dark main-nav">
        <div class="container-fluid bg-dark fixed-top justify-content-center">
            <h1 class="navbar-brand "><span class="text-danger"> Raffle </span> Entry</h1>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="p-3 col-4 bg-light mt-4">
                <form action="process.php" method="post">
                    <h2 class="text-center">Raffle Entry</h2>
                    <ul class="list-unstyled">
<?php                   foreach($_SESSION['errors'] as $values){ 
?>                      <li class="h6 text-danger text-center alert-warning "> <?= $values; ?>
                        </l1>
<?php                   } unset($_SESSION['errors']);
?>                  </ul>
                    <div class="form-floating mb-3">
                        <input type="text" name="contact" class="form-control" id="floatingInput" maxlength="11" pattern="{0-9}{11}">
                        <label for="floatingInput">Contact number</label>
                    </div>
                    <div class="d-flex justify-content-end">
                        <input type="hidden" name="action" value="process.php">
                        <input type="submit" class="btn btn-danger">
                    </div>
                </form>
            </div>
            <div class="col-8 mt-4">
                <h2 class="text-center p-1 bg-danger "> Entries </h2>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>Contact Number</th>
                            <th>Datetime inserted</th>
                        </tr>
                    </thead>
<?php            foreach(array_reverse($_SESSION['result']) as $values){ ;
 ?>                        <tr>     <!-- this is wrongfully indented for a sourcepage-->
                            <td><?= $values['contact'];?></td>
                            <td><?= $values['date'];?></td> 
                        </tr>
<?php                    }
?>

                </table>
            </div>
        </div>
    </div>

</body>
</html>
