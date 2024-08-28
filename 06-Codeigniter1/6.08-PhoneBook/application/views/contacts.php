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
                <h2 class="text-center p-1 bg-danger "> Entries </h2>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>Name</th>
                            <th>Contact Number</th>
                            <th>Action</th>
                        </tr>
                    </thead>
<?php            foreach($results as $values){ ;
 ?>                        <tr><form action="<?=base_url('contacts/')?>" method="post">
                            <td><?= $values['name']?></td>
                            <td><?= $values['contact']?></td> 
                            <td>
                                <input type="hidden" name="id" value="<?= $values['id']?>" >
                                <input type="hidden" name="name" value="<?= $values['name']?>" >
                                <input type="hidden" name="contact" value="<?= $values['contact']?>" >
                                <input type="submit" value="Show" formaction="<?=base_url('contacts/show')?>">
                                <input type="submit" value="Edit" formaction="<?=base_url('contacts/edit')?>">
                                <input type="submit" value="Remove" formaction="<?=base_url('contacts/remove')?>">
                            </form>
                        </tr>
<?php                    }
?>
                </table>
                <div class="d-flex justify-content-start mt-4">
                        <a class="btn btn-danger" href="<?=base_url('contacts/new')?>">Add <a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>