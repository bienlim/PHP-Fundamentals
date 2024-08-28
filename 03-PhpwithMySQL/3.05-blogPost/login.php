<?php
session_start();

if(!isset($_SESSION['msg_login'])){
    $_SESSION['msg_login']=array();
}
//if(!isset($_SESSION['msg_login']){
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

    <title>The blog post</title>
</head>
<body>

    <nav class="navbar navbar-dark bg-dark main-nav">
        <div class="container-fluid bg-dark  justify-content-center">
            <h1 class="navbar-brand "><span class="text-danger"> THE BLOG </span> POST</h1>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="p-3 col-6 bg-light mt-4 offset-3">
                <form action="process.php" method="post">
                    <h2 class="text-center">The Blog Post</h2>
                    <ul class="list-unstyled">
<?php                   foreach($_SESSION['msg_login'] as $values){ 
?>                      <li class="h6 text-danger text-center alert-warning "> <?= $values; ?>
                        </l1>
<?php                   } unset($_SESSION['msg_login']);
?>                  </ul>
                    <div class="form-floating mb-3">
                        <input type="text" name="email" class="form-control" id="floatingInput">
                        <label for="floatingInput">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control" id="floatingInput">
                        <label for="floatingInput">Password</label>
                    </div>
                    <div class="d-flex justify-content-end">
                        <input type="submit" class="btn btn-danger me-3" name="action" value="login">
                        <input type="submit" class="btn btn-danger" name="skip" value="Cancel" formaction="index.php">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
