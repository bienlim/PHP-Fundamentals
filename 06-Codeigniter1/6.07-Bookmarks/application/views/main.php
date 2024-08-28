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
            <div class="p-3 col-4 bg-light mt-4">
                <form action=" <?=base_url('bookmark/add')?>" method="post">
                    <h2 class="text-center">Book Mark</h2>
                    <ul class="list-unstyled">
<?php                   foreach($errors as $values){ 
?>                      <li class="h6 text-danger text-center alert-warning "> <?= $values; ?>
                        </l1>
<?php                   } 
?>                  </ul>
                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control" id="floatingInput" maxlength="45">
                        <label for="floatingInput">Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="url" name="url" class="form-control" id="floatingInput">
                        <label for="floatingInput">URL</label>
                    </div>
                    <select class="form-select" aria-label="Default select example" name="folder">
                        <option selected>Folder</option>
                        <option value="Favorites">Favorites</option>
                        <option value="Others">Others</option>
                        <option value="Hidden">Hidden</option>
                    </select>

                    <div class="d-flex justify-content-end mt-4">
                        <input type="hidden" name="action" value="New">
                        <input type="submit" class="btn btn-danger" value="Add">
                    </div>
                </form>
            </div>
            <div class="col-8 mt-4">
                <h2 class="text-center p-1 bg-danger "> Entries </h2>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>Folder</th>
                            <th>Name</th>
                            <th>URL</th>
                            <th>Action</th>
                        </tr>
                    </thead>
<?php            foreach($results as $values){ ;
 ?>                        <tr><form action="<?=base_url('bookmark/delete')?>" method="post">
                            <td><?= $values['name']?></td>
                            <td name='url'><?= $values['url']?></td> 
                            <td name='folder'><?= $values['folder']?></td> 
                            <td>
                                <input type="hidden" name="id" value="<?= $values['id']?>" >
                                <input type="hidden" name="name" value="<?= $values['name']?>" >
                                <input type="hidden" name="url" value="<?= $values['url']?>" >
                                <input type="hidden" name="folder" value="<?= $values['folder']?>" >
                                <input type="submit" value="Delete"></td> 
                            </form>
                        </tr>
<?php                    }
?>

                </table>
            </div>
        </div>
    </div>

</body>
</html>