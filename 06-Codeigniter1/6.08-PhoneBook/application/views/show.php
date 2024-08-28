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
            <h1 class="navbar-brand "><span class="text-danger"> Phone </span> Book</h1>
        </div>
    </nav>
    <div class="container">
        <div class="row">

            <div class="col-8 mt-4 offset-2">
                <form method="post" action="">
                <div class="d-flex justify-content-start mt-4">
                        <input type="submit" class="btn btn-danger m-2" value="Go back" formaction="<?=base_url('/')?>">
                                <input type="hidden" name="id" value="<?= $id?>" >
                                <input type="hidden" name="name" value="<?= $name?>" >
                                <input type="hidden" name="contact" value="<?= $contact?>" >
                        <input type="submit" class="btn btn-danger m-2" value="Edit" formaction="<?=base_url('contacts/edit')?>">
                </div>
            
                <h1 class="text-center p-1 bg-danger "> Contact #<?= $id?> </h1>
                <h2>Name: <?= $name?></h2>
                <h2>Contact Number: <?= $contact?></h2>
                </form>
            </div>
        </div>
    </div>

</body>
</html>