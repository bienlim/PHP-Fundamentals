<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">


</head>
<body>

    <nav class="navbar navbar-dark bg-dark main-nav">
        <div class="container-fluid bg-dark">
            <h1 class="navbar-brand pe-30"><span class="text-danger"> Sports </span> Sports</h1>
            <div class="d-flex">
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
            <div class=" col-3 bg-light mt-4 p-3 ">
                <form action="<?= base_url('sports/search')?>" method="post">
                <h2>Search Players</h2>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="name">
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" Value="Male">
                    <label class="form-check-label">
                        Male   
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" Value="Female">
                    <label class="form-check-label">
                        Female
                    </label>
                </div>
                <div class="mb-3">
                    <label class="form-label">Sports</label>
                </div>
<?php              foreach($sportnames as $sportname){
?>      
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="<?=$sportname['name_sport'] ?>" value="TRUE">
                    <label class="form-check-label" for="flexCheckDefault"><?=$sportname['name_sport'] ?></label>
                </div>
<?php   }
?>

                <div class="d-flex flex-row-reverse">
                        <input type="submit" class="btn btn-dark" value="Search">
                </div>
                </form>
            </div>
            <div class=" col-8 bg-light mt-2 p-4 align-top">
<?php foreach($athletes as $athlete){
?>
                    <div class="card d-inline-block m-2 align-top" style="width: 11rem; height: 16rem">
                        <img
                            src="<?=$athlete['url'] ?>"
                            class="card-img-top"
                            alt="Waterfall"
                        />
                        <div class="card-body">
                            <h5 class="card-title"><?=$athlete['name'] ?></h5>
                            <p class="card-text">
                                <?=$athlete['gender'] ?>
<?php                               foreach($sports AS $sport) { if($athlete['id'] == $sport['athlete_id']){
?>                                  <?= $sport['sport'];?>
<?php                           }}
?>                            </p>

                        </div>
                    </div>
<?php }
?>       

            </div>
        </div>
    </div>
</body>
</html>
</body>
</html>