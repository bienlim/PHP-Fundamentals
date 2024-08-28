<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>Product Dashboard</title>
</head>
<body>

    <nav class="navbar navbar-light border-bottom border-dark main-nav sticky-top bg-light">
        <div class="container-fluid"> 
            <div> 
                <h1 class="display-5">
                    <a href="<?=base_url()?>" class="text-decoration-none text-reset fw-semibold">
                    PRODUCT DASHI
                    </a>
                </h1>
                <figcaption class="blockquote-footer">
                    Your one stop shop <cite title="Source Title">to a stockful shop</cite>
                </figcaption>
            </div>
            <div class="d-flex">
                <a class="btn btn-light ms-12" href="<?=base_url('login')?>">Login</a>
                <a class="btn btn-light ms-12" href="<?=base_url('signup')?>">Sign Up</a>
               <!--  <form action="" method="POST" class="">
                    <input type="hidden" name="action" value="logout">
                    <input type="submit" class="btn btn-ligh ms-12" href="login.php" value="Sign up">
                </form> -->
            </div>
        </div>
    </nav>

<!----------------------------------------------CUT HEADER BLOCK FOR DYNAMIC CONTENT  --------------------------------------->
    <div class="container">
        <div class="row">

