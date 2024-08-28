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
            <h1 class="navbar-brand "><span class="text-danger"> Book </span> Mark</h1>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-8 mt-4 offset-2">
                <h2 class="text-center p-1 bg-danger "> Delete </h2>
                <p> Would you like to delete? </p>
                <p>    <?= $name.' '.$url.' '.$folder?>                   </p>

                <div class="d-flex justify-content-end mt-4">

                <form action="http://localhost/6-Codeigniter1/6.7-Bookmarks/bookmark/confirm_delete" method="post">
                    <input type="hidden" name="id" value="<?= $id?>" >
                    <input type="submit" class="btn btn-danger me-4" value="Cancel" actionpost="">
                    <input type="submit" class="btn btn-danger" value="Delete">
                <form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>