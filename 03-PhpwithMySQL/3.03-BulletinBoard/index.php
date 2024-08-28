<?php
session_start();
$today = date("Y-m-d", time());

if(!isset($_SESSION['errors'])){
    $_SESSION['errors']=array();
}
//if(!isset($_SESSION['errors']){
//    echo 'is not set';}

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
        <div class="container-fluid bg-dark  justify-content-center">
            <h1 class="navbar-brand "><span class="text-danger"> Raffle </span> Entry</h1>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="p-3 col-6 bg-light mt-4 offset-3">
                <form action="process.php" method="post">
                    <h2 class="text-center">Bulletin Board Entry</h2>
                    <ul class="list-unstyled">
<?php                   foreach($_SESSION['errors'] as $values){ 
?>                      <li class="h6 text-danger text-center alert-warning "> <?= $values; ?>
                        </l1>
<?php                   } unset($_SESSION['errors']);
?>                  </ul>
                    <div class="form-floating mb-3">
                        <input type="text" name="title" class="form-control" id="floatingInput" maxlength="11">
                        <label for="floatingInput">Subject</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea name="detail" class="form-control" id="floatingTextarea2" style="height: 120px"></textarea>
                        <label for="floatingTextarea2">Details</label>
                    </div>
                    <div class="d-flex justify-content-end">
                        <input type="hidden" name="date" value="<?=$today?>">
                        <input type="submit" class="btn btn-danger me-3" name="submit" value="Submit">
                        <input type="submit" class="btn btn-danger" name="skip" value="Skip" formaction="main.php">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
