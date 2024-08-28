<?php
session_start();
$today = date("Y-m-d", time());
(!isset($_SESSION['thread'])||!isset($_SESSION['errors']))?header('location: process.php'):'';
//a session object is to be defined prior a call; like wise a session object is by default a non-array, it should be defined otherwise.
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>Bug Ticket</title>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark main-nav">
        <div class="container-fluid bg-dark fixed-top justify-content-center">
            <h1 class="navbar-brand "><span class="text-danger"> Bug </span> Busters</h1>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="p-3 col-4 bg-light mt-4">
                <form action="process.php" method="post">
                    <h2 class="text-center"> Report Bug </h2>
                    <ul class="list-unstyled">
<?php                   foreach($_SESSION['errors'] as $values){ 
?>                      <li class="h6 text-danger text-center alert-warning "> <?= $values; ?></l1>
<?php                   } unset($_SESSION['errors']);
?>                    </ul>
                    <div class="form-floating mb-3">
                        <input type="text" name="name_first" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">First Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="name_last" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Last Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Email Address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="date" name="date" class="form-control" id="floatingInput" value="<?= $today ?>" placeholder="title">
                        <label for="floatingInput">Date</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="title" class="form-control" id="floatingInput" placeholder="Title here">
                        <label for="floatingInput">Title (up to 50 characters)</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea name="details" class="form-control" placeholder="Write the details here" id="floatingTextarea2" style="height: 120px"></textarea>
                        <label for="floatingTextarea2">Details (up to 250 characters)</label>
                    </div>
                    <div class="d-flex justify-content-end">
                        <input type="hidden" name="action" value="process.php">
                        <input type="submit" class="btn btn-danger">
                    </div>
                </form>
            </div>
            <div class="col-8 mt-4">
                <h2 class="text-center p-1 bg-danger "> Bug Thread </h2>
<?php                foreach(array_reverse($_SESSION['thread']) as $values){ 
?>                      <?= $values; ?>
<?php                   }
?> 
            </div>
        </div>
    </div>
</body>
</html>